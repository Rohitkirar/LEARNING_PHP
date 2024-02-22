<?php 

trait addMarks{ 
    
    function addMarks($studentId ,$marks ){

        if(!array_key_exists($studentId , $this->studentMarks)){
            
            $this->studentMarks[$studentId]  =  $marks;
            
            echo "Student Marks Added Successfully!<br>" ;

        }
        else{
            echo "Student Marks Already Exist in Records!<br>";
        }
    }
}
?>