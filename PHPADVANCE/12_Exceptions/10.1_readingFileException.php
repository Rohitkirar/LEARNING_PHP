<?php 
try{
    $myfile =  fopen("myfile.txt" , "r");
    if(!$myfile){
        throw new Exception("Unable to open file<br>" );
    }
    $line  = fgets($myfile);
    if($line === false){
        throw new Exception("Unable to read file<br>") ;
    }

    echo $line ."<br>";
}
catch(Exception $e){
    echo "<HR>ERROR : " . $e->getMessage() ; 
}
finally{
    echo "<HR>program executed Successfully<BR>" ;
}
?>