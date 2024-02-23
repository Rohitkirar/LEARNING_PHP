<?php 
trait saveRecords{

    function saveRecords(){
        global $accountDetails;
        if(count($accountDetails) != 0){
            $myfile = fopen('../Records/accountdetails.txt', 'w') or die("Unable to open file");
            $text = json_encode($accountDetails) . "\n";
            fwrite($myfile , $text);
            fclose($myfile);
            echo "Successfully save Data in file!<br>";
        }
        else{
            echo "No records Found!<BR>";
        }
    }
}
?>