<?php 

//Example 1 of fruit class;
class Fruit{
    public $fruitname="" ;
    public $fruitcolor="" ;
    public $fruitprice="" ;

    function setDetails($fruitname, $fruitcolor , $fruitprice){
        $this->fruitname = $fruitname;
        $this->fruitcolor = $fruitcolor;
        $this->fruitprice = $fruitprice;
    }

    function getDetails(){
        echo "$this->fruitname | $this->fruitcolor | $this->fruitprice<br>";
    }
}

$object1 = new Fruit();

$object3 = new Fruit() ; 

$object1->setDetails("Apple" , "Red" ,100 )  ;

$object2 = new Fruit() ;

$object2->setDetails("Mango" , "Yellow" , 80) ;

$object3->setDetails("Grapes" ,"Green" , 120) ;

//print the data of objects 
$object1->getDetails();
$object2->getDetails();
$object3->getDetails();
?>