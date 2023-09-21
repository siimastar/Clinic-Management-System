<?php
session_start();
require_once("../includes/conn.php");

function logTest($conn, $name)
        {
            $date = date("d-m-Y");
            $sql = "INSERT INTO tests VALUES('0','$name', '200','$date')";
            $query = $conn->query($sql);
            if ($query) {
                if ($conn->affected_rows > 0) {
                    echo "test logs been recorded";
                } else {
                    echo "no";
                }
            } else {
                echo $conn->error;
            }
        }
        if(isset($_POST['type'], $_POST['pfor'])){
            $name=$_POST['name'];
            $pname = $_POST['pfor'];
            $regno = $_POST['regno'];
            $type = $_POST['type'];
            $source = $_SESSION['user'];
            logTest($mysqli, $type." for ".$pname." (".$regno.") printed by ".$source);
            // $combined = array_combine($name, $amount); 
            // // print_r($combined);
            // foreach($combined as $com=>$co){
            //     logReports($mysqli, $com." for ".$pname." (".$regno.") printed by ".$source, $co);
            // }
        }

?>