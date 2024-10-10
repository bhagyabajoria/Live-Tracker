<?php
session_start();
$dba = $_SESSION['db'];
$conn = mysqli_connect("localhost","", "","$dba");
if(isset($_POST['checking_add'])){
    $teamname = $_POST['teamname'];
    $sn = $_POST['sn'];
    $query = "INSERT INTO `live4`(`sn`, `teamname`) VALUES ('$sn', '$teamname')";
    $query_run = mysqli_query($conn, $query);
    
}
?>