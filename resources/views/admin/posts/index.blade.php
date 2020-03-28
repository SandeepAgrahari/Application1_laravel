@extends('layouts/backend')
@section('content')
@include('layouts/flash-message')
<h1 class="content-heading"></h1>
<div class="block"> 
    <div class="block-header block-header-default">
            <h3 class="block-title">Posts</h3>
    </div> 
    <div class="block-content">    
        <div class="table-responsive">
            <table class="table table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">Photo</th>
                        <th class="text-center">Created By</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Summary</th>
                        <th class="text-center">Create At</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($posts)
                        
                        @foreach ($posts as $post)
                            <tr>
                                <td class="text-center">
                                        @if ($post->photo)
                                            <img class="img-avatar img-avatar48" src="{{$post->photo->file}}" alt=""> 
                                        @else
                                            <img class="img-avatar img-avatar48" src="/media/avatars/avatar12.jpg" alt="">
                                        @endif
                                        
                                </td>
                                <td class="text-center">{{$post->user->name}}</td>
                                <td class="text-center">{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                                <td class="text-center">{{$post->title}}</td>
                                <td class="text-center">{{\Illuminate\Support\Str::limit($post->body,30)}}</td>
                                <td class="text-center">{{$post->created_at->diffForHumans()}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href ="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}    
                                    {{-- <a href ="{{route('users.destroy', $user->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-times"></i>
                                        </a> --}}
                                    {!! Form::button('<i class="fa fa-times"></i>', ['type' =>'submit','class'=>'btn btn-sm btn-danger']) !!}    
                                    {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach    
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection