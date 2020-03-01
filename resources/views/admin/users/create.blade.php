@extends('layouts.backend')

@section('content')
<h1 class="content-heading"></h1>
<div class="block"> 
    <div class="block-header block-header-default">
            <h3 class="block-title">Create User</h3>
    </div> 
    <div class="block-content">
        {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store']) !!}
            <div class="row">
                <div class="form-group col col-sm-6">
                    <div class="form-material">
                            {!! Form::text('name', null, ['class' =>'form-control', 'placeholder'=> 'Enter a name..', 'id'=>'name']) !!}
                            {!! Html::decode(Form::label('name', 'Name <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                    </div>
                </div>
                <div class="form-group col col-sm-6">
                    <div class="form-material">
                            {!! Form::email('email', null, ['class' =>'form-control', 'placeholder'=> 'Enter a email..', 'id'=>'email']) !!}
                            {!! Html::decode(Form::label('email', 'Email <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="form-group col col-sm-6">
                            <div class="form-material">
                                {!! Form::select('role_id', [''=>'Select Role'] + $roles, null , ['class'=>'form-control', 'id'=>'role_id']) !!}
                                {!! Html::decode(Form::label('role_id', 'Role <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                            </div>
                    </div>
                    <div class="form-group col col-sm-6">
                            <div class="form-material">
                                {!! Form::select('status', ['1'=>'Active','0'=>'Not Active'], 0 , ['class'=>'form-control', 'id'=>'status']) !!}
                                {!! Html::decode(Form::label('status', 'Status <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                            </div>
                    </div>
            </div>
            <div class="row">
                <div class="form-group col col-sm-6">
                        <div class="form-material">
                            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=> 'Enter a password..', 'id'=>'password']) !!}
                            {!! Html::decode(Form::label('password', 'Password <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
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
    
@endsection
