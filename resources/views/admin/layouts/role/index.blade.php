@extends('admin.master')

@section('content')


    <p>
        <a href="{{route('add.role')}}" class="btn btn-success">Create New Role</a>
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
        @foreach($role as $rol)
        <tr>
            <th scope="row">1</th>
            <td>{{$rol->name}}</td>
            <td>{{$rol->status}}</td>
            <td><a class="btn btn-primary" href="{{route('view.role',$rol->id)}}"><i class="fas fa-eye"></i></a></td>
            <td><a class="btn btn-warning" href="{{route('edit.role',$rol->id)}}"><i class="fas fa-edit"></i></a></td></td>
        </tr>
        @endforeach

        </tbody>
    </table>

@endsection

