<?php
 
trait getRecordAll{

    function getRecordAll(){
        if(count($this->studentRecords) != 0){
            print_r($this->studentRecords);
        }
        else{
            echo "NO RECORDS AVAILABLE<BR>";
        }

    }
}
?>