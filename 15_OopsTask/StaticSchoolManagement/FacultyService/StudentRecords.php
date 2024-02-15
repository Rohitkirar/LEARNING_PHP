<?php

$studentRecords = [] ;  

class StudentRecords{
    private $studentId = "" , $studentName="" , $mobile=0 ;

    public function __construct($studentId , $studentName , $mobile ){
        $this->studentId = $studentId ; 
        $this->studentName = $studentName;
        $this->mobile = $mobile;
    }
    public function addRecords(){
        $studentArray = [$this->studentId , $this->studentName , $this->mobile];

        if(!array_key_exists($this->studentId , $GLOBALS['studentRecords'])){
            $GLOBALS['studentRecords'][$this->studentId] = $studentArray;
        }
        else{ // already exists
            return false;
        }
        return true;
    }
}
$student1 = new StudentRecords($studentId , $studentName , $mobile);
$flag = $student1->addRecords();

if($flag){
    $data = json_encode($GLOBALS['studentRecords']) . "\n";

    $myfile = fopen("Records/student.txt" , "a") or die ("unable to open file") ;
    fwrite($myfile , $data);
    fclose($myfile);
    echo "Successfully added data!";
}
else{
    echo "Failed to add data";
}

?>