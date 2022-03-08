@extends('admin.master')
@section('content')

<h4 style="font-weight: bold;    margin-left: 24rem;">Category Details</h4><br>


    <div  style="margin-top:6rem;margin-left: -12rem;">
<p>Category_Name: {{$categories->name}}</p>

<p>Category_Details: {{$categories->details}}</p>

</div>




@endsection