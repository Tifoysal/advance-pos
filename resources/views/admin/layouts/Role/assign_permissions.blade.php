@extends('admin.master')

@section('content')
    <form action="{{route('permission.assign.store')}}" method='POST'>
        @csrf
        <input type="hidden" name="role_id" value="{{$role_id}}">
        @foreach($modules as $module)
        <div class="form-group">

            <label for="exampleInputEmail1">{{$module->name}}</label>
            @foreach($module->permissions as $permission)
            <div class="form-check">
                <input name="permissions[]" class="form-check-input" type="checkbox" value="{{$permission->id}}" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                   {{ucfirst(str_replace('.',' ',$permission->name))}}
                </label>
            </div>
            @endforeach
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
