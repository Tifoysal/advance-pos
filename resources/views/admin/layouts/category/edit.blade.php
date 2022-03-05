@extends('admin.master')
@section('content')
  

    
    
    <form action="{{route('category.update', $categories->id)}}" method="POST">
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

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category Name </label>
            <input name="name" placeholder="Enter update category name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$categories->name}}" >
    
        </div>
    
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category details</label>
            <input name="details" placeholder="Enter update category details"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$categories->details}}">
        </div>
       
        <button type="submit" class="btn btn-success">Save</button>
    </form>


@endsection