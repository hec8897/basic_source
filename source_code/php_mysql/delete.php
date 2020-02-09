<?php
include("inc/conn.php");
mysqli_set_charset($conn,"utf-8"); 
$data = json_decode(file_get_contents("php://input"),true);
$targetTb = `insert_tb`;

$sql = "DELETE FROM `$targetTb` WHERE 'idx'='$key'";
$query = mysqli_query($conn,$sql);

$phpResult = isset($query)?"ok":"no";

$json =  json_encode(
    array(
        "phpResult"=>$phpResult
)); 
echo urldecode($json);

@Header('Content-Type: application/json');
@Header('Content-Type: text/html; charset=utf-8');
?>