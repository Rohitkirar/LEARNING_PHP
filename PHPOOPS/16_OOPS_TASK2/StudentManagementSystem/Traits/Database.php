<?php 
trait Database{

    function fetchStudentMarks(){
        global $studentMarks;
        $myfile = fopen('../Records/marks.txt' , 'r') or die("Unable to open file") ;
        while(!feof($myfile)){
            $encoded_data = fgets($myfile);
            $decoded_data = json_decode($encoded_data , true) ;
            if(!is_null($decoded_data))
                $studentMarks = $decoded_data;
        }
    }

    function fetchStudentRecords(){
        global $studentRecords;
        $myfile = fopen('../Records/student.txt' , 'r') or die("Unable to open file") ;
        while(!feof($myfile)){
            $encoded_data = fgets($myfile);
            $decoded_data = json_decode($encoded_data , true) ;
            if(!is_null($decoded_data))
                $studentRecords = $decoded_data;
        }
    }
    function saveMarks(){
        global $studentMarks ;
        if(count($studentMarks) != 0){
            $myfile = fopen('../Records/marks.txt', 'w') or die("Unable to open file");
            $text = json_encode($studentMarks) . "\n";
            fwrite($myfile , $text);
            fclose($myfile);
            echo "successfully save data in file<br>\n";
            print_r($studentMarks);
        }
        else{
            echo "No records Found!<BR>\n";
        }
    }
    function saveRecords(){
        global $studentRecords;
        if(count($studentRecords) != 0){
            $myfile = fopen('../Records/student.txt', 'w') or die("Unable to open file");
            $text = json_encode($studentRecords) . "\n";
            fwrite($myfile , $text);
            fclose($myfile);
        }
        else{
            echo "No records Found!<BR>\n";
        }
    }
}
?>