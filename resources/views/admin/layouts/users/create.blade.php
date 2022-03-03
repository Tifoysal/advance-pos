@extends('admin.master')

@section('content')
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Name <span style="color:red">*</span> : </label>
            <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter User Name">
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
                <input required type="email" class="form-control" id="email" placeholder="Enter User Email">
            </div>
        </div>

        <div class="form-group">
            <div class="form-group">
                <label for="password">Password <span style="color:red">*</span>:</label>
                <input required type="password" class="form-control" id="password" placeholder="Enter User password">
            </div>
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="email">Image:</label>
                <input required type="file" class="form-control" id="email">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
