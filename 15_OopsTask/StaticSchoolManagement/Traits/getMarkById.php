<?php 

trait getMarkById{

    function getMarkById($studentId){

        if(array_key_exists($studentId , $this->studentMarks)){
            print_r($this->studentMarks[$studentId]);
        }
        else{
            echo "No Student Marks Found in Records!<br>";
        }

    }
}
?>