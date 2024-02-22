<?php 
class Student {
    function getResult($studentId ){
        global $StudentMarkRecords;
        if(array_key_exists($studentId ,$StudentMarkRecords)){
            return $StudentMarkRecords[$studentId] ;
        }
        else{
            return "No result Found! <br>" ;
        }
    }
}

?>