<?php 
//Example to verify customer credentials

class User{
    private $username , $password;

    private function set_user(){
        $this->username = "arunprajapati123";
        $this->password = "Arun@123";
    }
    private function validate($username , $password){
        $this->set_user();
        if($username == $this->username){
            if($password == $this->password){
                return true;
            }
            else{
                return false; 
            }
        }
        else{
            return false;
        }
    }

    function inputDetails($name , $pass){
        return $this->validate($name , $pass) ;
    }
}
$userobj = new User();

$result = $userobj->inputDetails("arunprajapati123" , "Arun@123") ;

if($result){
    echo "user successfully validate!<br>";
}
else{
    echo "Invalid username/Password<br>";
}

?>