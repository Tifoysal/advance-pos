@extends('admin.master')
@section('content')



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
        @foreach($permissions as $key=>$permission)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$permission->name}}</td>
            <td>{{$permission->status}}</td>
            <td><a class="btn btn-primary" href=""><i class="fas fa-eye"></i></a></td>
            <td><a class="btn btn-warning" href=""><i class="fas fa-edit"></i></a></td>
        </tr>
        @endforeach

        </tbody>
    </table>

@endsection

