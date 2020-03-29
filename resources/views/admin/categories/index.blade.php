@extends('layouts/backend')
@section('content')
@include('layouts/flash-message')
<h1 class="content-heading"></h1>

<div class="block"> 
    <div class="block-header block-header-default">
            <h3 class="block-title">Category</h3>
    </div> 
    <div class="block-content">    
        <div class="table-responsive">
            <table class="table table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories)
                        
                        @foreach ($categories as $category)
                            <tr>
                                <td class="text-center">{{ $category->id}}</td>
                                <td class="font-w600 text-center">{{$category->name}}</td>
                                <td class="text-center">{{$category->created_at->diffForHumans()}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href ="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
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