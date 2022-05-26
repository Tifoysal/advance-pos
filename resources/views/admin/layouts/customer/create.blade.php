@extends('admin.master')
@section('content')
 {{-- <h1>Add Category</h1> <br> --}}

 <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
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
        <input name="name" required type="text" class="form-control" placeholder="Enter  Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email <span style="color:red">*</span> : </label>
        <input name="email" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
    </div>
    <div class="form-group">
        <label for="">Password <span style="color:red">*</span> : </label>
        <input name="password" required type="password" class="form-control"  placeholder="Enter Password">
    </div>

    <div class="form-group">
        <div class="form-group">
            <label for="mobile">Mobile <span style="color:red">*</span>:</label>
            <input  name="mobile" required type="text" class="form-control" id="mobile" placeholder="Enter User mobile">
        </div>
    </div>



    <button type="submit" class="btn btn-success">Submit</button>
</form>




@endsection
