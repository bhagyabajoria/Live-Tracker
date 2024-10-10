<?php
session_start();
$dba = $_SESSION['db'];
$conn = mysqli_connect("localhost","", "", "$dba");

if(mysqli_connect_error()){
    echo "Cannot Connect to database";
}

?>