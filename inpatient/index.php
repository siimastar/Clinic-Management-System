<?php
session_start();

if($_SESSION['loggedin']!==true){
    header("location:../");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Add new</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAME" id="name">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="AGE" id="age">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select id="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="OCCUPATION" id="occupation">
                            <!-- <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i> -->
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="ADDRESS" id="address">
                            <!-- <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i> -->
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="REGISTRATION CODE" name="res_code" disabled> <label>Will be generated automatically!</label>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
<script>
    $(document).ready(() => {
        $(document).on("click", "#submit", (e) => {
            e.preventDefault();
            let name = $("#name").val()
            let gender = $("#gender").val()
            let age = $("#age").val()
            let occupation = $("#occupation").val()
            let address = $("#address").val()

            if (name === "" || gender === "" || age === "" || occupation === "" || address === "") {
                alert("All fields are required")
                return false;
            } else {
                $.ajax({
                    url: "../functions/inpatient.php",
                    method: "POST",
                    type: "text",
                    data: {
                        name: name,
                        gender: gender,
                        age: age,
                        occupation: occupation,
                        address: address
                    },
                    beforeSend: function() {
                        $("#submit").html("Inserting ...")
                    },
                    success: function(data) {
                        // alert(data)
                        if (data == "not ok") {
                            alert("Error in Registering this record!")
                        } else if(data == "duplicate"){
                            alert("This record already exist")
                        }else{
                            alert("Record has been added succesfully");
                            window.location.href = "../pages/getcard.php?type=opd&regno=" + data
                        }
                        $("#submit").html("Submit");
                    }
                })
            }
        })
    })
</script>