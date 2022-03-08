@extends('admin.master')
@section('content')
 {{-- <h1>Add Category</h1> <br> --}}

<form action="{{route('category.store')}}" method="POST">
    @csrf
    @if(session()->has ('success'))
    <p class="alert alert-success">
      {{session()->get ('success')}}
    </p>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="form-group">
        <label for="exampleInputEmail1">Name <span style="color:red">*</span> : </label>
        <input name="name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name">
    </div>
   
    <div class="form-group">
        <div class="form-group">
            <label for="email">Details:</label>
            <input  name="details" type="text" class="form-control" id="email" placeholder="Enter Category Details">
        </div>
    </div>

   
    <button type="submit" class="btn btn-success">Submit</button>
</form>




@endsection