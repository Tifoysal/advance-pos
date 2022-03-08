@extends('admin.master')
@section('content')

<h4 style="font-weight: bold;    margin-left: 24rem;">Role Details</h4><br>


    <div  style="margin-top:6rem;margin-left: -12rem;">
<p>Role_Name: {{$roles->name}}</p>

<p>Role_Details: {{$roles->details}}</p>

</div>




@endsection