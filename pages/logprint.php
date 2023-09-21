<?php
require_once("../includes/conn.php");
 function logEvents($conn, $event)
 {
     $sql = "INSERT INTO logs VALUES('0','$event')";
     $query = $conn->query($sql);
     if ($query) {
         if ($conn->affected_rows > 0) {
            echo "logs been recorded";
         } else {
             echo "s";
         }
     } else {
         echo $conn->error;
     }
 }
 if(isset($_POST['regno'])){
    $name = $_POST['name'];
    $regno =$_POST['regno'];
    $type = $_POST['type'];
    $source = $_POST['source'];
    $date = date("d-m-Y");
    $text = $type." Form for ".$name."(".$regno.") has been printed on ".$date." by ".$source;

    logEvents($mysqli, $text);
 }
?>