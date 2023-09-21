<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allow sales</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<body>


    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Different Styles</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h4>Allow Sale</h4>
            <div class="form-group">
                <label for="exampleSelectRounded0"></label>
                <select class="custom-select rounded-0" id="toggle">
                    <option>Select</option>
                    <option value="1">Allow</option>
                    <option value="0">Disallow</option>
                </select>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-block btn-success btn-lg" id="submit">Toggle</button>
            </div>
        </div>
    </div>
</body>

</html>
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="./plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>

<script>
    $(document).ready(function() {
        $("#submit").click(() => {
            let value = $("#toggle").val()
        
            $.ajax({
                url: "onoff.php",
                method: "post",
                type: "text",
                data: {
                    value: value
                },
                success: function(data) {
                    if(value=="1"){
                        alert("Success in allowing form sales")
                    }else{
                        alert("Success in disabling form sales")
                    }
                    
                }
            })
        })

    })
</script>