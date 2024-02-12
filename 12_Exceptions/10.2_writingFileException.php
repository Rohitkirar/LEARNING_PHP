<?php 
try{
    $myfile = fopen("myfile1.txt" , "w+");
    if(!$myfile){
        throw new Exception("Unable to open file<BR>");
    }

    $write = fwrite($myfile , "This<br>\nis<br>\na<br>\nmultiline<br>\nfile<br>");

    if($write === false){
        throw new Exception("Failed to write in file");
    }
    fseek($myfile , 0);
    while(!feof($myfile)){
        $line = fgets($myfile);
        if($line === false){
            throw new Exception("unable to read the filed data<BR>") ;
        }
        echo $line;
    }
}
catch(Exception $e){
    echo "<Hr>ERROR : " . $e->getMessage() ;
}
?>