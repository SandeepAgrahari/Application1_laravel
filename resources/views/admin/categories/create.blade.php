@extends('layouts.backend')

@section('content')
<h1 class="content-heading"></h1>
<div class="block"> 
    <div class="block-header block-header-default">
            <h3 class="block-title">Create Category</h3>
    </div> 
    <div class="block-content">
        {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}
            <div class="row">
                <div class="form-group col col-sm-12 {{ $errors->has('name') ? 'has-error is-invalid' : ''}}">
                    <div class="form-material">
                            {!! Form::text('name', null, ['class' =>'form-control', 'placeholder'=> 'Enter the name..', 'id'=>'name']) !!}
                            {!! $errors->first('name', '<p class="help-block invalid-feedback">:message</p>') !!}
                            {!! Html::decode(Form::label('name', 'Name <span class="text-danger">*</span>', ['class'=>'col-form-label'])) !!}
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col col-sm-6">
                        {!! Form::submit('Create Category', ['class'=>'btn btn-alt-primary']) !!}
                </div> 
            </div>
        {!! Form::close() !!}
    </div> 
</div>
@endsection
