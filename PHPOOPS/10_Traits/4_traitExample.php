<?php 
trait UserDetails{
    protected $name , $age , $city , $state = "Gujrat";
    abstract function set_details($name , $age , $city);

    function get_details(){
        echo "Name : $this->name<br>Age : $this->age<br>City : $this->city<br>State : $this->state<hr>" ;
    }
}

class User {
    use UserDetails;
    function set_details($name, $age ,$city ){
        $this->name = $name;
        $this->age = $age;
        $this->city = $city;
    }
}

$user = new User;
$user->set_details("Arun" , 34 , "ahemdabaad");
$user->get_details();
?>