<?php
session_start();
require_once("../includes/conn.php");

function logReports($conn, $name, $amount)
        {
            $date = date("d-m-Y");
            $sql = "INSERT INTO tests VALUES('0','$name', '$amount','$date')";
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
        if(isset($_POST['name'], $_POST['amount'])){
            $name=$_POST['name'];
            $amount = $_POST['amount'];
            $pname = $_POST['pfor'];
            $regno = $_POST['regno'];
            $source = $_SESSION['user'];

            $combined = array_combine($name, $amount); 
            // print_r($combined);
            foreach($combined as $com=>$co){
                logReports($mysqli, $com." for ".$pname." (".$regno.") printed by ".$source, $co);
            }
        }

?>