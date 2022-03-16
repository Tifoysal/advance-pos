@extends('admin.master')

@section('content')



<div style="width: 100%">
    <table class="myTable" id="myTable">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

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

