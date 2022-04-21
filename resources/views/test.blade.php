<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<form>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Select Package</label>
                <select name="package" id="package" class="form-control">
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Select Term</label>
                <select name="package" id="term" class="form-control" onchange="changeTerm()">
                    <option value="">Select Term</option>
                    <option value="years">Years</option>
                    <option value="months">Months</option>
                    <option value="weeks">Weeks</option>
                    <option value="days">days</option>
                    <option value="hours">Hours</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Select time frame</label>
                <select name="package" id="investmentTimeFrame" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Insert value</label>
                <input type="text" class="form-control">
            </div>
        </div>
    </div>

</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            {{--url: '{{route('')}}',--}}
            context: document.body,
            success: function (response) {
                for (index in response) {
                    $("#package").append("<option>" + response[index].name + "</option>");
                }
            },
        });
    });

    function changeTerm() {
        $("#investmentTimeFrame").empty();
        var term = $('#term').val();

        term == 'years'?termsArray = ['Yearly', 'Monthly', 'Weekly', 'Daily', 'Hourly']:'';
        term == 'months'?termsArray = ['Monthly', 'Weekly', 'Daily', 'Hourly']:'';
        term == 'weeks'?termsArray = ['Weekly', 'Daily', 'Hourly']:'';
        term == 'days'?termsArray = ['Daily', 'Hourly']:'';
        term == 'hours'?termsArray = ['Hourly']:'';

        if(termsArray!='')
        {
            for (index in termsArray) {
                $("#investmentTimeFrame").append("<option>" + termsArray[index] + "</option>");
            }
        }

    }
</script>
</body>
</html>
