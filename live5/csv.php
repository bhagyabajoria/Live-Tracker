<?php
session_start();
$dba = $_SESSION['db'];
$connect = mysqli_connect("localhost","", "","$dba");
$output = '';
if(isset($_POST["export_csv"])){
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $sql = "SELECT * FROM `live5`";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result) > 0){
        $output .= '
            <table class="table">
            <tr>
                <th>TEAM NAME</th>
                <th>WIN</th>
                <th>MATCHES PLAYED</th>
                <th>FINISH POINT</th>
                <th>PLACEMENT POINT</th>
                <th>TOTAL POINT</th>
                <th>GROUP NAME</th>
                <th>SLOT NUMBER</th>
            </tr>
        ';
        while($row = mysqli_fetch_assoc($result)){
            $output .= '
            <tr>
                <td>'.$row["teamname"].'</td>
                <td>0</td>
                <td>0</td>
                <td>'.$row["finishes"].'</td>
                <td>0</td>
                <td>0</td>
                <td>G1</td>
                <td>Na</td>
            </tr>
        ';
        }
        $output .= '</table>';
        echo $output;
    }
}
?>