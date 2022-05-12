@extends('admin.master')

@section('content')



<p class="btn btn-primary">{{$msg}}</p>


<a class="btn btn-success" href="{{route('customer.create')}}">Create New Customer</a>

<div style="margin-left: 100px;">
    <a href="{{route('backup.db')}}" class="btn btn-info">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
        Export DB</a>
</div>
<div style="width: 100%">
    <table class="myTable" id="myTable">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>

            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $data)
        <tr>
            <td>1</td>
            <td>{{$data->name}}</td>
            <td>{{$data->role->name}}</td>
            <td>
                <form action="{{route('users.destroy',$data->id)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>

</div>

@endsection

@push('more_script')


    <script type="text/javascript">
        $(function () {
            var table = $('.myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.allData') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'image', name: 'image'},
                    {data: 'role_id', name: 'role_id'},

                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endpush

