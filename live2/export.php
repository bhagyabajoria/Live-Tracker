<?php
session_start();
$dba = $_SESSION['db'];
$conn = mysqli_connect("localhost","", "","$dba");
$query = "SELECT * FROM `live2` order by sn";
$dat = mysqli_query($conn,$query);
$html='<table border="1"><tr><td>TEAM NAME</td><td>WIN</td><td>MATCHES PLAYED</td><td>FINISH POINT</td><td>PLACEMENT POINT</td><td>GROUP NAME</td><td>SLOT NUMBER</td></tr>';

while($row=mysqli_fetch_assoc($dat)){
    $html.='<tr><td>'.$row['teamname'].'</td><td>0</td><td>2</td><td>'.$row['finishes'].'</td><td></td><td>G1</td><td>'.$row['sn'].'</td></tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=pt.xls');
echo $html;
?>