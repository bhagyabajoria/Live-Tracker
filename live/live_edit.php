<?php
include_once("db_connect.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
$update_field='';
if(isset($input['sn'])) {
$update_field.= "sn='".$input['sn']."'";
}else if(isset($input['teamname'])) {
$update_field.= "teamname='".$input['teamname']."'";
} else if(isset($input['finishes'])) {
$update_field.= "finishes='".$input['finishes']."'";
} else if(isset($input['status'])) {
$update_field.= "status='".$input['status']."'";
}
if($update_field && $input['id']) {
$sql_query = "UPDATE live SET $update_field WHERE id='" . $input['id'] . "'";
mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
}
}
?>