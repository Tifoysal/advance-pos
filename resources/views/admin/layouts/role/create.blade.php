@extends('admin.master')

@section('content')
<form action="{{route('role.store')}}" method="POST" >
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
            <div class="form-group">
                <label for="name">Name <span style="color:red">*</span>:</label>
                <input required type="text" class="form-control" id="name" placeholder="Enter Role Name">
            </div>
        </div>

       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
