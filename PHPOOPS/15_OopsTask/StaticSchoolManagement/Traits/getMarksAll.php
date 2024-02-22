<?php 
trait getMarksALl{
        function getMarksAll(){
        if(count($this->studentMarks)!=0){
            print_r($this->studentMarks);
        }
        else{
            echo "NO RECORDS AVAIlABLE<BR>";
        }
    }
}
?>