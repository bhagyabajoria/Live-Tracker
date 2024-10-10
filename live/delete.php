<?php
session_start();
$dba = $_SESSION['db'];
$conn = mysqli_connect("localhost","", "","$dba");
$delete_id = $_POST['delete_id'];
$sql = "DELETE FROM live WHERE id = '".$delete_id."'";
mysqli_query($conn,$sql);
?>