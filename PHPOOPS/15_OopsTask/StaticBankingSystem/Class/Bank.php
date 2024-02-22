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
require_once('../Traits/setNewUser.php');
require_once('../Traits/getUserDetails.php');
require_once('../Traits/saveRecords.php');


class Bank{

    private $bankName , $userName , $password , $bankAccountNumber ;
    private $balance ;

    use setNewUser , getUserDetails , saveRecords ;
    
}


?>