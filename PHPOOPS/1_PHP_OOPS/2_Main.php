<?php 
// class is a template for an objects and objects is an instance of class

//Example 1 class structure

class Main{
    public $id = 1 ; 
    public $name = "ROHIT KIRAR" ;
    public $designation = "PHP Developer" ;
    public $city = "Bhopal" ;

    function printDetails(){
        echo "$this->id | $this->name | $this->designation | $this->city <BR>";
    }
}

$obj = new Main() ;

$obj->printDetails();


echo "<HR>" ;

?>