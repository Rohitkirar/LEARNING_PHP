<?php 
class Student {
    function getResult($studentId ){
        global $StudentMarks;
        if(array_key_exists($studentId ,$StudentMarks)){
            return $StudentMarks[$studentId] ;
        }
        else{
            return "No result Found! <br>" ;
        }
    }
}
?>