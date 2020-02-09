<?php
    $host = 'localhost';
    $id = 'root';
    $pw = '523852';
    $db = 'sys';
    
    $conn = mysqli_connect($host,$id,$pw,$db);//host,Id,pw,DB
    mysqli_set_charset($conn,"utf8");
?>