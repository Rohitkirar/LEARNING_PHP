<?php 
trait getRecordById{

    function getRecordById($studentId){

        if(array_key_exists($studentId , $this->studentRecords)){
            print_r($this->studentRecords[$studentId]);
        }
        else{
            echo "No Student Found in Records!<br>";
        }

    }
    
}
?>