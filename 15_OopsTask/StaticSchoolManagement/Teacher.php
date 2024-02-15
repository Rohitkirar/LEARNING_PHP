<?php 

class Teacher{
    function addStudentData($studentId , $studentName , $mobile){
        include_once("FacultyService/StudentRecords.php");
    }
    function addMarks($studentId , $marks){
        include_once("FacultyService/StudentRecords.php");
    }
}
$teacher = new Teacher();

$teacher->addStudentData(101 , "ROHIT KIRAR" , 12345678);

?>