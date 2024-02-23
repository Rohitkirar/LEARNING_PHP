<?php 
//$this keyword refers to the current object and is only available inside methods

//Example : If we have to change the value of the class property the we can do by adding a set method and using this keyword 

class Car{
    public $name , $model , $price ; 
    function set_name($name , $model , $price){
        $this->name = $name;
        $this->model = $model;
        $this->price = $price;
    }

    function get_details(){
        echo "Name : $this->name | Model : $this->model | Price : $this->price <BR>";
    }
}

$volvo = new Car();
$volvo->set_name("VOLVO" , "2010" , "1000000") ;

echo $volvo->name . "<BR>" ;
echo $volvo->model . "<br>" ;
echo $volvo->price . "<br>" ;

echo "<hr>" ;

$volvo->get_details();

?>
