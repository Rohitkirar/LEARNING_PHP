<?php 
require_once('../Traits/Database.php') ;
class Teacher {
    use Database;
    private $schoolId = "101" , $schoolPassword = "central" ;
    
    public function __construct(){
        $this->fetchStudentMarks();
        $this->fetchStudentRecords();
    }
    
    public function verification($schoolId , $schoolPassword){
        if($this->schoolId == $schoolId && $schoolPassword == $this->schoolPassword){
            return true;
        }
        return false;
    }
    
    function addRecords($studentId , $studentName , $mobile ){
        global $studentRecords;
        if(!array_key_exists($studentId , $studentRecords)){
            $studentRecords[$studentId]  = [$studentId , $studentName , $mobile ];
            $this->saveRecords();
            echo "Student Added Successfully!<br>\n" ;
        }
        else{
            echo "Student Already Exist in Records!<br>\n";
        } 
    }
    function getRecordAll(){
        global $studentRecords;
        if(count($studentRecords) != 0){
            print_r($studentRecords);
        }
        else{
            echo "NO RECORDS AVAILABLE<BR>\n";
        }
    }
    function getRecordById($studentId){
        global $studentRecords;
        if(array_key_exists($studentId , $studentRecords)){
            print_r($studentRecords[$studentId]);
        }
        else{
            echo "No Student Found in Records!<br>\n";
        }
    }
    function addMarks($studentId ,$marks ){
        global $studentMarks , $studentRecords;
        if(array_key_exists($studentId , $studentRecords)){
            if(!array_key_exists($studentId , $studentMarks)){
                $studentMarks[$studentId]  =  $marks;
                $this->saveMarks();
                echo "Student Marks Added Successfully!<br>\n" ;
            }
            else{
                echo "Student Marks Already Exist in Records!<br>\n";
            }
        }else{
            echo "Student is not registered! Please Register student first<br>\n";
        }
    }
    
    function getMarksAll(){
        global $studentMarks;
        if(count($studentMarks)!=0){
            print_r($studentMarks);
        }
        else{
            echo "NO RECORDS AVAIlABLE<BR>\n";
        }
    }
    function getMarkById($studentId){
        global $studentMarks;
        if(array_key_exists($studentId , $studentMarks)){
            print_r($studentMarks[$studentId]);
        }
        else{
            echo "No Student Marks Found in Records!<br>\n";
        }
    }

}

?>