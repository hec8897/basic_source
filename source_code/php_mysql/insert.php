<?php
//Ajax Create 요청
include("inc/conn.php");
include("inc/variable_define.php");

mysqli_set_charset($conn,"utf-8"); 
$data = json_decode(file_get_contents("php://input"),true);

$reqName = ValueReturn($data['reqName']);
$reqPhone = ValueReturn($data['reqPhone']);
$reqStandard = ValueReturn($data['reqStandard']);
$reqTit = ValueReturn($data['reqTit']);
$reqConsult = ValueReturn($data['reqConsult']);
$reqAddress = ValueReturn($data['reqAddress']);
$reqMemo = ValueReturn($data['reqMemo']);
$reqOption1 = ValueReturn($data['Option1']);
$reqOption2 = ValueReturn($data['Option2']);
$reqOption3 = ValueReturn($data['Option3']);

$value = "'$reqName', '$reqPhone', '$reqStandard', '$reqTit ','$reqConsult', '$reqAddress', '$reqMemo', '$reqOption1','$reqOption2', '$reqOption3', '$time'";

$option = "BasicInsert";
$colums = $columArray;//variable_define
$colum = InsertColumGet($option,$colums);

$sql = "INSERT INTO `insert_tb` ($colum) VALUES ($value)";
$query = mysqli_query($conn,$sql);

$phpResult = isset($query)?"ok":"no";

$json =  json_encode(
    array(
        "phpResult"=>$phpResult,
        "sql"=>$sql
)); 

echo urldecode($json);


@Header('Content-Type: application/json');
@Header('Content-Type: text/html; charset=utf-8');


?>