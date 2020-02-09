<?php
//정규 표현식   
function PhoneNumberRegure($parm){
    //전화번호 하이픈('-')뺴고 정규표현식
    $reg = preg_match("/^01[0-9]{8,9}$/", $parm);
return $reg;
}
// $result = PhoneNumberRegure($ph);
?>