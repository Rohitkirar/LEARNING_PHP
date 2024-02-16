<?php 
trait checkBalance{
    public function checkBalance(){
        if(isset($this->userName)){
            echo "Account Balance : " . $this->balance . "<BR>";
        }
        
    }
}
?>