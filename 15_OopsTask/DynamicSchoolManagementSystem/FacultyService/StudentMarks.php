<?php 
$studentMarks = [] ;

class StudentMarks{
    
    private $studentId , $marks = [] ;

    public function __construct($studentId , $marks){
        $this->studentId = $studentId ;
        $this->marks = $marks;
    }
    public function addMarks(){
        $studentmarksarray[$this->studentId] = $this->marks;
        if(!array_key_exists($this->studentId , $GLOBALS['studentMarks'])){
            $GLOBALS['studentMarks'] = $studentmarksarray;
        }
        else {
            return false;
        }
        return true;
    }
}
$student1 = new StudentMarks($studentId , $marks);
$flag = $student1->addMarks();

if($flag){
    $data = json_encode($GLOBALS['studentMarks']) . "\n";

    $myfile = fopen("Records/marks.txt" , "a") or die ("unable to open file") ;
    fwrite($myfile , $data);
    fclose($myfile);
    echo "Successfully added data!";
}
else{
    echo "Failed to add data";
}

?>