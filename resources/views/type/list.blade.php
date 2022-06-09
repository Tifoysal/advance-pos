<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <div class="row">

        <div class="col-md-12" style="float: right; padding:20px ">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Create Type
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Type</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="javascript:void (0)" id="typeForm">
                            <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button id="submit" type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <button class="btn btn-danger" onclick="getData()" >load data</button>
        </div>

        <br>
        <br>
        <h1>Type List</h1>
        <table class="table" id="typeTable">

            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <tbody>
            </tbody>
        </table>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function (){
            getData();
        },5000)

    });

    $('#typeForm').submit(function (){
        $('#submit').html('Creating...');
        $('#submit').attr('disabled',true);
        setTimeout(function (){
            setData()
        },2000)
    });


    function setData()
    {
        var typeName=$('#name').val();
        var mobile=$('#mobile').val();

        $.ajax({
            url:'{{route('type.store')}}',
            method:'post',
            data:{
                _token:'{{csrf_token()}}',
                name:typeName,
                mobile:mobile
            },
            success:function (res){
                    $('#exampleModal').modal('hide');
                    setTimeout(function (){
                        alert(res.message)
                        $('#submit').html('Save Change');
                        $('#submit').attr('disabled',false);
                    },1000);
            }
        })

    }

    function getData() {
        $('#typeTable tbody').children().remove();
        $.ajax({
            url: '{{route('type.data')}}',
            method: 'get',
            success: function (response) {
                for (type of response.data) {
                    // $('#name').val(type.name);
                    $('#typeTable tbody').append($('<tr>'))
                        .append($('<td>',{text:type.id}))
                        .append($('<td>',{text:type.name}))
                        .append($('<td>',{text:type.status}));
                }
            }
        })
    }
</script>

</body>
</html>
