<?php 
// __construct and __destruct helps us to reduce the code size 
// destructor always  called automatically at the end of the script of the termination of the program;

class Main{
    public $name = "ROHIT" ;
    public $id = "101" ; 
    public $city = "Ahemdabaad" ;
    function printDetails(){
        echo "Name : $this->name ,  Id : $this->id , City : $this->city<hr>";
    }
    function __destruct(){
        echo "ClassName : " . __CLASS__ . "<BR>" ;
        echo "FileName : " . __FILE__ . "<BR>" ;
    }
}
$mainobj = new Main();
$mainobj->printDetails();


echo "HELLO WORLD !<BR>";
echo "HELLO WORLD !<BR>";
echo "<hr>" ;

$mainobj1 = new Main();
$mainobj1->printDetails();

?>