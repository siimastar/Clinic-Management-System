<?php
$mysqli = new mysqli("localhost","root","","almukhtar");

if($mysqli->error){
    echo $mysqli->error;
}
