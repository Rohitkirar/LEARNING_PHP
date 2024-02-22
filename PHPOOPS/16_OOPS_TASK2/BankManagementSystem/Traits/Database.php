<?php 
trait Database{

    function fetchData(){
        $myfile = fopen('../Records/accountdetails.txt', 'r') or die("Unable to open file");
        while(!feof($myfile)){
            $encoded_data = fgets($myfile);
            $decoded_data = json_decode($encoded_data , true);
            return $decoded_data;
        }
    }

    private function saveRecords(){
        global $accountDetails;
        if(count($accountDetails) != 0){
            $myfile = fopen('../Records/accountdetails.txt', 'w') or die("Unable to open file");
            $text = json_encode($accountDetails) . "\n";
            fwrite($myfile , $text);
            fclose($myfile);
            echo "Successfully save Data in file!<br>\n";
        }
        else{
            echo "No records Found!<BR>\n";
        }
    }   

    //private function to save the transaction perform by user/bank
    private function saveTransactionDetails($transactionDetails){
        if(count($transactionDetails) != 0){
            $myfile = fopen('../Records/'.$this->bankAccountNumber.".txt", 'a') or die("Unable to open file");
            $text = json_encode($transactionDetails) . "\n";
            fwrite($myfile , $text);
            fclose($myfile);
            echo "Successfully save Transaction in file!<br>\n";
        }
        else{
            echo "Transaction Empty Found!<BR>\n";
        }
    }
}
?>