<?php 

// Example 1  Object to jsonEncode string

class Main{
    public $name = "Rohit" ;
    public $city = "Sanchi" ;
    public $designation = "PHP developer" ;

    function adddetails(){
        $GLOBALS['workingcity'] = "AhemdaBaad"; //this part is not encode in json format
    }
}

$obj = new Main();

var_dump($obj);

echo "<br>";

$encodedobj = json_encode($obj);
?>