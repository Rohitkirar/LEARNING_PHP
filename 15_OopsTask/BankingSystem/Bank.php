<?php 
/* Q. create a class Bank:
- register a user 
- check balance
- add amount 
- credit amount
- transactions history 
#user{
Name, Uid (unique), Mobile, Age, (assuming we have one bank)
}
#transaction{
time, Tid (unique) 
}
*/
class Bank{
    private $bankName = "STATE BANK OF INDIA" , $userName , $password , $bankAccountNumber ;

    public function setNewUser($bankAccountNumber , $userName , $password){
        $this->bankAccountNumber = $bankAccountNumber ;
        $this->userName = $userName ;
        $this->password = $password ;
    }
    public function getUserDetails(){
        return [$this->bankAccountNumber , $this->bankName , $this->userName ,  $this->password] ;
    }
}


?>