<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
     body{
         text-align: center;
         align-content: center; 
         background: linear-gradient(to left, #ccccff 45%, #ccffff 95%);
         border-radius: 2px 2px 2px;
     }
     
     .card{
         text-align: left;
         margin-left: 39%;
         font-size: 20px;
     }
    </style>

</head>

<body>
  
    <h1>Product Details</h1>

    <div class="card" style="width: 18rem;">
        <img src="{{url('uploads/'.$products->product_image)}}" width="300px" height="200px" class="card-img-top" alt="ProductImage" >
        <div class="card-body">
          <h5 class="card-title">Product Category: {{$products->category}}</h5>
          <p class="card-text">Product Name: {{$products->name}}</p>
          <p class="card-text">Product Price:<span style="color: rgb(0, 4, 255)">BDT {{$products->price}}</span></p>
          <p class="card-text">Product Details: {{$products->sellers_price}}</p>
          <p class="card-text">Product Details: {{$products->details}}</p>
 
        </div>
      </div>