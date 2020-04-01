@extends('layouts/backend')
@section('content')
@include('layouts/flash-message')
<h1 class="content-heading"></h1>
<div class="block"> 
    <div class="block-header block-header-default">
            <h3 class="block-title">Media</h3>
    </div> 
    <div class="block-content">    
        <div class="table-responsive">
            <table class="table table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">id</th>
                        <th class="text-center">Photo</th>
                        <th class="text-center">Uploaded At</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($photos)
                        
                        @foreach ($photos as $photo)
                            <tr>
                                <td class="text-center">
                                       {{ $photo->id}}
                                </td>
                                <td class="text-center"><img class="img-avatar img-avatar48" src="{{$photo->file ? $photo->file : '/media/avatars/avatar12.jpg'}}" alt=""></td>
                                <td class="text-center">{{$photo->created_at->diffForHumans()}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}
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