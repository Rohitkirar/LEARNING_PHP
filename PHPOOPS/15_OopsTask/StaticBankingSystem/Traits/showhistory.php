<?php 
trait showhistory{
    function showhistory(){
        $historyarray = [];
        $myfile = fopen('../Records/'.$this->bankAccountNumber.".txt" , "r") or die("Unable to open file");
        $x = 0 ;
        while(!feof($myfile)){
            $encoded_data = fgets($myfile);
            $decoded_data = json_decode($encoded_data , true);
            if(!is_null($decoded_data))
                $historyarray[$x++] = $decoded_data;
        }
        echo "<pre> <br> TRANSACTION HISTORY <BR>";
        print_r($historyarray);
        echo "</pre>" ;
    }
}
?>