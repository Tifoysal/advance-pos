@extends('admin.master')

@section('content')
    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name <span style="color:red">*</span> : </label>
            <input name="username" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter User Name">
        </div>
        <div class="form-group">
            <label for="role">Select Role <span style="color:red">*</span></label>
            <select name="role" id="role" class="form-control" required>
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
            </select>
             </div>


        <div class="form-group">
            <div class="form-group">
                <label for="email">Email <span style="color:red">*</span>:</label>
                <input  name="email" required type="email" class="form-control" id="email" placeholder="Enter User Email">
            </div>
        </div>

        <div class="form-group">
            <div class="form-group">
                <label for="mobile">Mobile <span style="color:red">*</span>:</label>
                <input  name="mobile" required type="text" class="form-control" id="mobile" placeholder="Enter User mobile">
            </div>
        </div>

        <div class="form-group">
            <div class="form-group">
                <label for="password">Password <span style="color:red">*</span>:</label>
                <input name="password" required type="password" class="form-control" id="password" placeholder="Enter User password">
            </div>
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="textiput" class="form-label">Image:</label>
                <input name="Imagefile" type="file" class="form-control" id="fileInput">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
