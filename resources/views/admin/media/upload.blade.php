@extends('layouts/backend')
@section('css_after')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
@endsection
@section('content')
@include('layouts/flash-message')
<h1 class="content-heading"></h1>
<div class="block"> 
    <div class="block-header block-header-default">
            <h3 class="block-title">Upload Media</h3>
    </div> 
    <div class="block-content">    
        {!! Form::open(['method'=>'POST', 'action'=> 'AdminMediaController@store', 'class'=>'dropzone']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('js_after')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
@endsection