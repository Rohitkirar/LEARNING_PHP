<?php 
trait saveRecords{

    function saveRecords(){
        if(count($this->studentRecords) != 0){
            $myfile = fopen('../Records/student.txt', 'a') or die("Unable to open file");
            $text = json_encode($this->studentRecords) . "\n";
            fwrite($myfile , $text);
            fclose($myfile);
        }
        else{
            echo "No records Found!<BR>";
        }
    }
}
?>