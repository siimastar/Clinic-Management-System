<?php
session_start();
if(isset($_POST['username'])){
    require_once('../includes/conn.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $query = $mysqli->query($sql);
    if($query){
        if ($query->num_rows > 0) {
            $row = $query->fetch_assoc();
            $_SESSION['loggedin'] =true;
            $_SESSION['user'] = $row['username'];
            echo $row['username'];
        } else {
            echo "not ok";
        }
    }else{
        echo $mysqli->error;
    }
}
?>