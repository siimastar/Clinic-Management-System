<?php
// $val ="";
if(isset($_POST['name'])){
    require_once("../includes/conn.php");
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $occupation = $_POST['occupation'];
    $address = $_POST['address'];
    $sqlduplicate = "SELECT * FROM inpatient WHERE name='$name' AND age='$age'";

    $queryduplicate = $mysqli->query($sqlduplicate);
    if($queryduplicate){
        $num_rows = $queryduplicate->num_rows;
        if($num_rows>0){
            echo "duplicate";
        }else{
            $sql0 = "SELECT * FROM inpatient ORDER BY id DESC LIMIT 1";
            $que = $mysqli->query($sql0);
            if($que){
                $num_rows = $que->num_rows;
                if($num_rows>0){
                    $record = $que->fetch_assoc();
                    $val = $record['regno'];
                    // echo substr($val, strrpos("-"));
                    $newreg = substr($val,strrpos($val,"-")+1)+1;
                    // echo $newreg+1;
                }else{
                    $newreg = "100";
                }
            }

            // $regno = "ALMC-".substr(mt_rand(100, 100000),1,5)."-". substr(random_int(100000,200000),0, 3);
            $regno = "ALMC-".substr(mt_rand(100, 100000),1,5)."-".$newreg;
            
            $date = date("d-m-Y");

            $sql = "INSERT into inpatient VALUES('0','$name','$age','$gender','$address','$occupation','$regno','$date')";
            $query = $mysqli->query($sql);
            if($query){
                if ($mysqli->affected_rows >0) {
                    echo $regno;
                } else {
                    // die("error in adding record, please try again later");
                    echo "not ok";
                }
            }else{
                // echo $mysqli->error;
                echo "not ok";
            }

        }
    }

    

}
?>