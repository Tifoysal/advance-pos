@extends('admin.master')

@section('content')


    <p>
        <a href="{{route('users.create')}}" class="btn btn-success">Create New User</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        
        <tr>
            <th scope="row">1</th>
            <td>{{$user->name}}</td>
            <td>
                <img style="width:100px;" src="{{url('/uploads/User/'.$user->image)}}" alt="image">
            </td>
            <td>{{$user->role->id}}</td>
            <td>{{$user->status}}</td>
           
            <td>
                <div style="display: flex;">
                 <div style="padding-right: 10px;"><a class="btn btn-light" style="color: rgb(228, 11, 11)" href="{{route('users.destroy',$user->id)}}">Delete</a></div>
                <div style="padding-right: 10px;"><a class="btn btn-light" style="color: rgb(32, 77, 51)" href="{{route('users.show',$user->id)}}">view</a></div>
                <div style="padding-right: 10px;"><a class="btn btn-light" style="color: rgb(32, 77, 51)" href="{{route('users.edit',$user->id)}}">Edit</a></div>
                </div>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

@endsection

