@extends('admin.master')

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="form-group">
            <label for="exampleInputEmail1">Name <span style="color:red">*</span> : </label>
            <input name="name" required type="text" class="form-control"  placeholder="Enter User Name">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="textiput" class="form-label">Image:</label>
                <input name="image"  class="form-control" id="formFileLg" type="file" />
            </div>
            <div class="form-group">
                <label for="category">Category <span style="color:red">*</span></label>
                <select name="category"  type="text" class="form-control" required>  
                    <option>csdd</option> 
                </select>
                 </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price <span style="color:red">*</span> : </label>
                <input name="price" required type="number" class="form-control"  placeholder="Enter Product Price">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1"> Sellers Price <span style="color:red">*</span> : </label>
                <input name="sellers_price" required type="number" class="form-control"  placeholder="Enter Sellers Price">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Details <span style="color:red">*</span> : </label>
                <input name="details" required type="text" class="form-control"  placeholder="Enter Product Details">
            </div>
        
    <input type="submit" value="Submit">
    </form>
@endsection
