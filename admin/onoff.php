<?php
require_once("../includes/conn.php");

function onoff($conn, $value)
{
    $sql = "UPDATE settings SET value='$value' WHERE name='form'";
    $query = $conn->query($sql);

    if ($query) {
        if ($conn->affected_rows> 0) {
            return "yes";
        } else {
            return "no";
        }
    } else {
        return false;
    }
}

if(isset($_POST['value'])){
    $value = $_POST['value'];
    echo onoff($mysqli, $value);
    // echo "sss";
}
