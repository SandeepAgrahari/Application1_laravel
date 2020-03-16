@extends('layouts.backend')

@section('content')
<h1 class="content-heading"></h1>
<div class="block"> 
    <div class="block-header block-header-default">
            <h3 class="block-title">Create User</h3>
    </div> 
    <div class="block-content">
        {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store', 'files'=>true]) !!}
            <div class="row">
                <div class="form-group col col-sm-6 {{ $errors->has('name') ? 'has-error is-invalid' : ''}}">
                    <div class="form-material">
                            {!! Form::text('name', null, ['class' =>'form-control', 'placeholder'=> 'Enter a name..', 'id'=>'name']) !!}
                            {!! $errors->first('name', '<p class="help-block invalid-feedback">:message</p>') !!}
                            {!! Html::decode(Form::label('name', 'Name <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                    </div>
                </div>
                <div class="form-group col col-sm-6 {{ $errors->has('email') ? 'has-error is-invalid' : ''}}">
                    <div class="form-material">
                            {!! Form::email('email', null, ['class' =>'form-control', 'placeholder'=> 'Enter a email..', 'id'=>'email']) !!}
                            {!! $errors->first('email', '<p class="help-block invalid-feedback">:message</p>') !!}
                            {!! Html::decode(Form::label('email', 'Email <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="form-group col col-sm-6 {{ $errors->has('role_id') ? 'has-error is-invalid' : ''}}">
                            <div class="form-material">
                                {!! Form::select('role_id', [''=>'Select Role'] + $roles, null , ['class'=>'form-control', 'id'=>'role_id']) !!}
                                {!! $errors->first('role_id', '<p class="help-block invalid-feedback">:message</p>') !!}
                                {!! Html::decode(Form::label('role_id', 'Role <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                            </div>
                    </div>
                    <div class="form-group col col-sm-6 {{ $errors->has('status') ? 'has-error is-invalid' : ''}}">
                            <div class="form-material">
                                {!! Form::select('status', ['1'=>'Active','0'=>'Not Active'], 0 , ['class'=>'form-control', 'id'=>'status']) !!}
                                {!! $errors->first('status', '<p class="help-block invalid-feedback">:message</p>') !!}
                                {!! Html::decode(Form::label('status', 'Status <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                            </div>
                    </div>
            </div>
            <div class="row">
                <div class="form-group col col-sm-6 {{ $errors->has('password') ? 'has-error is-invalid' : ''}}">
                        <div class="form-material">
                            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=> 'Enter a password..', 'id'=>'password']) !!}
                            {!! $errors->first('password', '<p class="help-block invalid-feedback">:message</p>') !!}
                            {!! Html::decode(Form::label('password', 'Password <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                        </div>
                </div>
                <div class="form-group col col-sm-6 {{ $errors->has('password_confirmation') ? 'has-error is-invalid' : ''}}">
                    <div class="form-material">
                        {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=> 'Enter a confirm password..', 'id'=>'password_confirmation']) !!}
                        {!! $errors->first('password_confirmation', '<p class="help-block invalid-feedback">:message</p>') !!}
                        {!! Html::decode(Form::label('password_confirmation', 'Confirm Password <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col col-sm-6 {{ $errors->has('photo_id') ? 'has-error is-invalid' : ''}}">
                    <div class="form-material">
                        {!! Form::file('photo_id', ['class'=>'form-control remove-box-shadow', 'id'=>'photo_id']) !!}
                        {!! $errors->first('photo_id', '<p class="help-block invalid-feedback">:message</p>') !!}
                        {!! Html::decode(Form::label('photo_id', 'Profile Picture ', ['class'=>'col-form-label'])) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col col-sm-6">
                        {!! Form::submit('Create User', ['class'=>'btn btn-alt-primary']) !!}
                </div> 
            </div>
        {!! Form::close() !!}
    </div> 
</div>       

{{-- @if(count($errors) >0)

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors as $error)
                    <li>{{$error->message}}</li>
                @endforeach
            <ul>
        </div>

@endif --}}
@endsection
