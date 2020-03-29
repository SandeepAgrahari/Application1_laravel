<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $input =  $request->all();
        $user = Auth::user();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=> $name]);
            $input['photo_id'] = $photo->id;
        }
        $user->posts()->create($input);
        return redirect('/admin/posts')->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::pluck('name', 'id')->all();
        $post = Post::findOrFail($id);
        return view('/admin.posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $input = $request->all();     
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            if($post->photo){
                unlink(public_path() . $post->photo->file);
                $file->move('images', $name);
                $photo = Photo::findOrFail($post->photo->id);
                $photo->update(['file'=>$name]);
                $input['photo_id'] = $photo->id;
            }else{
                $file->move('images', $name);
                $photo = Photo::create(['file'=> $name]);
                $input['photo_id'] = $photo->id;
            }
        }
        $post->update($input);
        return redirect('/admin/posts')->with('success','Post Updated Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        unlink(public_path() . $user->photo->file);

        $user->delete();

        return redirect('/admin/posts')->with('success', 'Post Has been deleted successfully!');
    }
}
