@extends('admin.master')
@section('content')
  

    
    
    <form action="{{route('role.update', $roles->id)}}" method="POST">
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
            <label for="exampleInputEmail1" class="form-label">Role Name </label>
            <input name="name" placeholder="Enter update role name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$roles->name}}" >
    
        </div>
    
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Role details</label>
            <input name="details" placeholder="Enter update role details"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$roles->details}}">
        </div>
       
        <button type="submit" class="btn btn-success">Save</button>
    </form>


@endsection