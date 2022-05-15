@extends('admin.master')
@section('content')
<br>
<br>
<table class="table">
    <thead>
      <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Details</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

<h1> {{__('Category List')}}</h1>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Sl No</th>
        <th scope="col">Name</th>
        <th scope="col">Details</th>
        <th width="30px" scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key=>$category)

        <tr>
          <th scope="row">{{$key+1}}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->details}}</td>
            <td>{{$category->action}}</td>

            <td>
              <a href="{{route('category.view',$category->id)}}" class="btn btn-secondary">View</a>

            <td><a href="{{route('category.view',$category->id)}}" class="btn btn-secondary">View</a>

                <a href="{{route('category.edit',$category->id)}}" class="btn btn-info">Edit</a>
                <a href="{{route('delete.category',$category->id)}}" class="btn btn-danger">Delete</a></td>

          </tr>
          @endforeach
    </tbody>
  </table>
  <a href="{{route('category.add')}}" class="btn btn-primary">Add New Category</a>
@endsection
