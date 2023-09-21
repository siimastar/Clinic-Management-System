<?php
// require_once("../includes/conn.php");

function printStatus($conn){
    $sql = "SELECT * FROM settings";
    $query = $conn->query($sql);

    if($query){
        if($query->num_rows>0){
            $row = $query->fetch_assoc();
            return $row;
        }else{
            return "no records found";
        }
    }else{
        return $conn->error;
    }
}

function getTotal($conn){
    $sql = "SELECT count(id) AS a FROM inpatient";
    $query = $conn->query($sql);

    if($query){
        if($query->num_rows>0){
            $row = $query->fetch_assoc();
            return $row;
        }else{
            return "no records found";
        }
    }else{
        return $conn->error;
    }
}

function getDaily($conn){
    $today = date("d-m-Y");
    $sql = "SELECT count(id) AS a FROM inpatient WHERE date='$today'";
    $query = $conn->query($sql);

    if($query){
        if($query->num_rows>0){
            $row = $query->fetch_assoc();
            return $row;
        }else{
            return "no records found";
        }
    }else{
        return $conn->error;
    }
}

function recentRegister($conn){
    $sql = "SELECT * FROM inpatient ORDER BY id DESC LIMIT 10 ";
    $query = $conn->query($sql);

    if($query){
        if($query->num_rows>0){
            $row = $query->fetch_all();
            return $row;
        }else{
            return "no records found";
        }
    }else{
        return $conn->error;
    }
}
?>