<?php

trait addRecords{
    
    function addRecords($studentId , $studentName , $mobile ){

        if(!array_key_exists($studentId , $this->studentRecords)){
            
            $this->studentRecords[$studentId]  = [$studentId , $studentName , $mobile ];

            echo "Student Added Successfully!<br>" ;

        }
        else{
            echo "Student Already Exist in Records!<br>";
        }
        
    }
}

?>