@extends('layouts/backend')
@section('content')
@include('layouts/flash-message')
<h1 class="content-heading"></h1>
<div class="block"> 
    <div class="block-header block-header-default">
            <h3 class="block-title">Users</h3>
    </div> 
    <div class="block-content">    
        <div class="table-responsive">
            <table class="table table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                        <th class="text-center">id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Active</th>
                        <th class="text-center">Joined</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users)
                        
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">
                                    @if ($user->photo)
                                        <img class="img-avatar img-avatar48" src="{{$user->photo->file}}" alt=""> 
                                    @else
                                        <img class="img-avatar img-avatar48" src="/media/avatars/avatar12.jpg" alt="">
                                    @endif
                                    
                                </td>
                                <td class="text-center">
                                       {{ $user->id}}
                                </td>
                                <td class="font-w600 text-center">{{$user->name}}</td>
                                <td class="text-center">{{$user->email}}</td>
                                <td class="text-center">
                                    {{$user->role->name}}
                                </td>
                                <td class="text-center">
                                
                                    {{$user->status == 1 ? 'Active' : 'Not Active'}}</td>
                                <td class="text-center">{{$user->created_at->diffForHumans()}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href ="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}    
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