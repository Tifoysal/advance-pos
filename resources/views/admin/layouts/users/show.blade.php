@extends('admin.master')


@section('content')
    <h1>User Details</h1>
  <div>
    <p>
        <img style="border-radius: 4px;" width="200px;"  src="{{url('/uploads/'.$userview->image)}}" alt="">
    </p>
    
        <p>User Name: {{$userview->name}} <br></p>
        <p>User Role: {{$userview->role_id}} <br></p>
        <p>User Email: {{$userview->email}}<br></p>
  </div>
   




@endsection