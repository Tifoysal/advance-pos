@extends('admin.master')

@section('content')
    <form action="{{route('create.role')}}" method='POST'>
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name <span style="color:red">*</span> : </label>
            <input name="name" required type="text" class="form-control" id="role_name" aria-describedby="emailHelp" placeholder="Enter Role Name">
        </div>

        <!-- <div class="form-group">
            <div class="form-group">
                <label for="email">Status<span style="color:red">*</span>:</label>
                <input required type="text" class="form-control" id="role_status" placeholder="Enter Role Status">
            </div>
        </div> -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
