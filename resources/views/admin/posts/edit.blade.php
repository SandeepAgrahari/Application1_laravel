@extends('layouts.backend')

@section('content')
<h1 class="content-heading"></h1>
<div class="bg-image bg-image-bottom" style="background-image: url('{{$post->photo ? $post->photo->file : '/media/photos/photo13@2x.jpg'}}');">
    <div class="bg-primary-dark-op py-30">
        <div class="content content-full text-center"><!-- Personal -->
            <h1 class="h3 text-white font-w700 mb-10">
                {{$post->title}}
            </h1>
        </div>
    </div>
</div>
<div class="block"> 
    <div class="block-header block-header-default">
            <h3 class="block-title">Edit Post</h3>
    </div> 
    <div class="block-content">
        {!! Form::model($post, ['method'=>'PATCH','action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
            <div class="row">
                <div class="form-group col col-sm-6 {{ $errors->has('title') ? 'has-error is-invalid' : ''}}">
                    <div class="form-material">
                            {!! Form::text('title', null, ['class' =>'form-control', 'placeholder'=> 'Enter a title..', 'id'=>'title']) !!}
                            {!! $errors->first('title', '<p class="help-block invalid-feedback">:message</p>') !!}
                            {!! Html::decode(Form::label('title', 'Title <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                    </div>
                </div>
                <div class="form-group col col-sm-6 {{ $errors->has('category_id') ? 'has-error is-invalid' : ''}}">
                    <div class="form-material">
                        {!! Form::select('category_id', $categories, null , ['class'=>'form-control', 'id'=>'category_id']) !!}
                        {!! $errors->first('category_id', '<p class="help-block invalid-feedback">:message</p>') !!}
                        {!! Html::decode(Form::label('category_id', 'Category <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group col col-sm-6 {{ $errors->has('photo_id') ? 'has-error is-invalid' : ''}}">
                    <div class="form-material">
                        {!! Form::file('photo_id', ['class'=>'form-control remove-box-shadow', 'id'=>'photo_id']) !!}
                        {!! $errors->first('photo_id', '<p class="help-block invalid-feedback">:message</p>') !!}
                        {!! Html::decode(Form::label('photo_id', 'Post Picture <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col col-sm-12 {{ $errors->has('body') ? 'has-error is-invalid' : ''}}">
                    <div class="form-material">
                        {!! Form::textarea('body', null, ['class'=>'form-control', 'id'=>'body', 'placeholder'=>'Please add a description']) !!}
                        {!! $errors->first('body', '<p class="help-block invalid-feedback">:message</p>') !!}
                        {!! Html::decode(Form::label('body', 'Post Description <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col col-sm-6">
                        {!! Form::submit('Update Post', ['class'=>'btn btn-alt-primary']) !!}
                </div> 
            </div>
        {!! Form::close() !!}
    </div> 
</div>
@endsection
