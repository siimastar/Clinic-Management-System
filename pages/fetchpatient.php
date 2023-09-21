<?php
require_once("../includes/conn.php");
// if(isset($_POST['status']) && !empty($_POST['status'])){
if (isset($_POST['pnumber']) && !empty($_POST['pnumber'])) {
    $output = "";
    $pnumber = $_POST['pnumber'];

    $sql = "SELECT * FROM inpatient WHERE regno LIKE '%$pnumber%'";
    $query = $mysqli->query($sql);

    if ($query) {

        if ($query->num_rows > 0) {
            $row = $query->fetch_assoc();
            $output .= "<div class='container'>
            <div class='form-group row'>
            <label for='inputName' class='col-sm-1-12 col-form-label'>Patient Number</label>
            <div class='col-sm-1-12'>
                <input type='text' class='form-control' name='inputName' id='inputName' placeholder='' value='" . $row['regno'] . "' disabled>
            </div>
        </div>
        <fieldset class='form-group row'>
            <legend class='col-form-legend col-sm-1-12'>Full Name</legend>
            <div class='col-sm-1-12'>
            <input type='text' class='form-control' name='inputName' id='inputName' placeholder='' value='" . $row['name'] . "' disabled>
            </div>
        </fieldset>
        <fieldset class='form-group row'>
        <legend class='col-form-legend col-sm-1-12'>Gender</legend>
        <div class='col-sm-1-12'>
        <input type='text' class='form-control' name='inputName' id='inputName' placeholder='' value='" . $row['gender'] . "' disabled>
        </div>
    </fieldset>
    <fieldset class='form-group row'>
    <legend class='col-form-legend col-sm-1-12'>DOB</legend>
    <div class='col-sm-1-12'>
    <input type='text' class='form-control' name='inputName' id='inputName' placeholder='' value='" . $row['age'] . "' disabled>
    </div>
</fieldset>
<fieldset class='form-group row'>
<legend class='col-form-legend col-sm-1-12'>Date of Reg</legend>
<div class='col-sm-1-12'>
<input type='text' class='form-control' name='inputName' id='inputName' placeholder='' value='" . $row['date'] . "' disabled>
</div>
</fieldset>
<fieldset class='form-group row'>
<legend class='col-form-legend col-sm-1-12'>Address</legend>
<div class='col-sm-1-12'>
<input type='text' class='form-control' name='inputName' id='inputName' placeholder='' value='" . $row['address'] . "' disabled>
</div>
</fieldset>
<div class='form-group row'>
<a href='./ussform.php?type=uss&regno=" . $row['regno'] . "' class='btn btn-success'>
USS FORM <span class='badge badge-primary'></span>
</a>
<a href='./opdcard.php?type=opd&regno=" . $row['regno'] . "' class='btn btn-info'>
OPD Card <span class='badge badge-primary'></span>
</a>
<a href='./labform.php?type=lab&regno=" . $row['regno'] . "' class='btn btn-secondary'>
Lab Form <span class='badge badge-primary'></span>
</a>
<a href='./getcard.php?type=labback&regno=" . $row['regno'] . "' class='btn btn-primary'>
Lab Back<span class='badge badge-primary'></span>
</a>
</div> 
         </div>
        ";
            echo $output;
        } else {
            echo "No Patient Details Found";
        }
    } else {
        echo $mysqli->error;
    }
}
