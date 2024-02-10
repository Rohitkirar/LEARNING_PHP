<?php 
//Example INDEXOUTOFBOUND exception
$arr  = [1 , 2 , 3 , 4 , 5 , 6 , 7 , 8 , 9 ];

try{
    for($i=0 ; $i<=10 ; $i++){
        if($i >= count($arr)){
            throw new Exception("INDEX OUT OF BOUND EXCEPTION");
        }
        echo $arr[$i] . " " ;
    }
    echo "program successfully executed without any error<br>" ;
}
catch(Exception $e){
    echo "<BR>" . $e->getMessage() . "<BR>";
    echo "program successfully executed by handling error<br>";
}
?>