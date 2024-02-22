<?php 
//file Exception are exception when we are trying to perform operation on file that doesn't exist or wrong operation we are performing;

try{
    $myfile = fopen("file.txt" , "r" ) ;
    if(!$myfile){
        throw new Exception("Unable to open file / File not Found<br>" );
    }
    echo fread($myfile , fileSize('file.txt'));
    fclose($myfile);
}
catch(Exception $e){
    echo "ERROR : " . $e->getMessage() ;
}
finally{
    echo "<br>Program succesfully executed ! <BR>" ;
}
?>