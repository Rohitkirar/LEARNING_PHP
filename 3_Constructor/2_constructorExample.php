<?php 
class Car{
    public $name , $color , $model , $price ;
    public $resultarray = [] ;

    function __construct($name , $color , $model , $price){
        $this->name = $name;
        $this->color = $color;
        $this->model = $model;
        $this->price = $price;
    }

    function get_details(){
        return [$this->name , $this->model , $this->color , $this->price];
    }
}

$volvo = new Car("Volvo" , "Silver", 2019 , 1200000);
$thar = new Car("Thar" , "Black" , 2020 , 2500000);
$scorpio = new Car("Scorpio" , "White" , 2023 , 1600000) ;
$fortuner = new Car("Fortuner" , "White" , 2018 , 4500000) ;

$array = [] ;

array_push($array , $volvo->get_details());
array_push($array , $thar->get_details());
array_push($array , $scorpio->get_details());
array_push($array , $fortuner->get_details()) ;

echo "<pre>" ;
print_r($array);
echo "</pre>";

?>