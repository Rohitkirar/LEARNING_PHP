<?php 
namespace selfFile{
    class User{
        public $name = "Buddy Murphy" , $age = 32 ;
        function printDetails(){
            echo "Name : $this->name<br>Age : $this->age<br>";
        }
    }
}

//GENERATE ERROR THAT NO CODE IS WRITTEN OUTSIDE THE NAMESPACE

// include 'NamespaceExample.php' ;
// $user = new selfFile\User();
// $user->printDetails();
?>