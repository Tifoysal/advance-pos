@extends('admin.master')

@section('content')


    <p>
        <a href="{{route('add.role')}}" class="btn btn-success">Create New Permission</a>
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
        @foreach($permissions as $permission)
        <tr>
            <th scope="row">1</th>
            <td>{{$permission->name}}</td>
            <td>{{$permission->status}}</td>
            <td><a class="btn btn-primary" href="{{route('view.role',$permission->id)}}"><i class="fas fa-eye"></i></a></td>
            <td><a class="btn btn-warning" href="{{route('edit.role',$permission->id)}}"><i class="fas fa-edit"></i></a></td>
        </tr>
        @endforeach

        </tbody>
    </table>

@endsection

