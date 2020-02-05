<?php
$columArray = array(
    "`reqname`", 
    "`reqphone`", 
    "`standard`", 
    "`title`", 
    "`reqconsult`", 
    "`reqaddress`", 
    "`reqmemo`", 
    "`option1`", 
    "`option2`", 
    "`option3`",
    "`inserttime`"
);


function ValueReturn($Value){
    $retrunData = isset($Value) || $Value != null || $Value != ""?$Value:"no";
    return $retrunData;
}

function UpdateQuery($Value, $Query,$Colums){
    $columArray = array(
        "`reqname`", 
        "`reqphone`", 
        "`standard`", 
        "`title`", 
        "`reqconsult`", 
        "`reqaddress`", 
        "`reqmemo`", 
        "`option1`", 
        "`option2`", 
        "`option3`",
        "`inserttime`"
    );
    
    $UpdateColum = $columArray[$Value];
    $UpdateQuery = "$UpdateColum = '$Query'";
    return $UpdateQuery;
}    

function InsertColumGet($option,$colums){
    //BasicInsert = allcolums
    if($option == "BasicInsert"){
        $Colum="";
        for($Count = 0; $Count<count($colums); $Count++){
            $Colum.= ",".$colums[$Count];
        }
    }
    return substr($Colum,1);
}


?>