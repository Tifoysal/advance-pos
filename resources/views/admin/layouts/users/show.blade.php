@extends('admin.master')


@section('content')
    <h1>User Details</h1>
  <div>
    <p>
        <img style="border-radius:94px;" width="200px;"  src="{{url('/uploads/User/'.$userview->image)}}" alt="">
    </p>
    
        <p>User Name: {{$userview->name}} <br></p>
        <p>User Role: {{$userview->role->name}} <br></p>
        <p>User Email: {{$userview->email}}<br></p>
  </div>
   




@endsection