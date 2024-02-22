<?php 

trait getUserDetails{

    public function getUserDetails(){
        $result = [$this->bankName , $this->bankAccountNumber , $this->userName ,  $this->password , $this->balance] ; 
        return $result ;
    }

}

?>