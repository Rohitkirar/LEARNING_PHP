<?php 
trait saveMarks{

    function saveMarks(){
        if(count($this->studentMarks) != 0){
            $myfile = fopen('../Records/marks.txt', 'w') or die("Unable to open file");
            $text = json_encode($this->studentMarks) . "\n";
            fwrite($myfile , $text);
            fclose($myfile);

            echo "successfully save data in file<br>";
            print_r($this->studentMarks);
        }
        else{
            echo "No records Found!<BR>";
        }
    }
}
?>