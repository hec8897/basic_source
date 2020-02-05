<?php
//Ajax Update 요청
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

$UpdateName = UpdateQuery(0,$reqName,$columArray);
$UpdatePhone = UpdateQuery(1,$reqPhone,$columArray);
$UpdateStandard = UpdateQuery(2,$reqStandard,$columArray);
$UpdateTit = UpdateQuery(3,$reqTit,$columArray);
$UpdateConsult = UpdateQuery(4,$reqConsult,$columArray);
$UpdateAddress = UpdateQuery(5,$reqAddress,$columArray);
$UpdateMemo = UpdateQuery(6,$reqMemo,$columArray);
$UpdateOption1 = UpdateQuery(7,$reqOption1,$columArray);
$UpdateOption2 = UpdateQuery(8,$reqOption2,$columArray);
$UpdateOption3 = UpdateQuery(9,$reqOption3,$columArray);

$UpdateColums = $UpdateName.",".$UpdatePhone.",".$UpdateStandard.",".$UpdateTit.","
.$UpdateConsult.",".$UpdateAddress.",".$UpdateMemo.",".$UpdateOption1.",".$UpdateOption2.","
.$UpdateOption3.",`inserttime` = '$time'";

$sql = "UPDATE `user_tb` SET $UpdateColums WHERE `idx` = '$key'";
$query = mysqli_query($conn,$sql);
$phpResult = isset($query)?"ok":"no";

$json =  json_encode(
    array(
        "phpResult"=>$phpResult,
        "test"=>$sql
)); 

echo urldecode($json);


@Header('Content-Type: application/json');
@Header('Content-Type: text/html; charset=utf-8');


?>