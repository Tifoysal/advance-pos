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
            <td>{{$user->image}}</td>
            <td>{{$user->role_id}}</td>
            <td>{{$user->status}}</td>
            <td></td>
        </tr>
        @endforeach

        </tbody>
    </table>

@endsection

