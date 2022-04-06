@extends('admin.master')

@section('content')


    <p>
        <a href="{{route('role.create')}}" class="btn btn-success">Create New Role</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($role as $roles)
        <tr>
            <th scope="row">1</th>
            <td>{{$roles->name}}</td>
            <td>{{$roles->status}}</td>
            <td><a href="{{route('view.role',$roles->id)}}" class="btn btn-secondary">View</a>
                <a href="{{route('role.edit',$roles->id)}}" class="btn btn-info">Edit</a>
                <a href="{{route('delete.role',$roles->id)}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

@endsection

