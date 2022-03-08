@extends('admin.master')

@section('content')


    <p>
        <a href="{{route('product.category')}}" class="btn btn-success">Create New Product</a>
    </p>

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

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Seller Price</th>
            <th scope="col">Details</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($products as $key=>$product)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$product->name}}</td>
                <td>
                    <img width="100px" src="{{url('/uploads/'.$product->image)}}" alt="">
                  </td>
                  <td>{{$product->category->name}}</td>
                  <td>{{$product->price}}</td>
                  <td>{{$product->sellers_price}}</td>
                  <td>{{$product->details}}</td>
                  
                  <td>
                    <a href="{{route('product.details',$product->id)}}" class="btn btn-secondary">View</a>
                    <a href="{{route('delete.product',$product->id)}}" class="btn btn-danger">Delete</a>
                  </td>
            </tr>  
            @endforeach
        </tbody>
    </table>

@endsection

