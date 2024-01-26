<?php 
//The foreach loop - Loops through a block of code for each element in an array or each property in an object.

$colors = array("Red" , "Saffron" , "Green" , "Yellow" , "Blue");

foreach($colors as $x){
    echo("$x ");
}
echo("<br>\n");

//key value array
$members = array("peter" => "35" , "Ben" => "23" , "Ash" => "54" , "tyson" => "43");

foreach($members as $x=>$y){
    echo("$x : $y <br>\n");
}

//break in foreach
$colors = array("Red" , "Saffron" , "Green" , "Yellow" , "Blue");
foreach($colors as $x){
    if($x == "Blue") break;
    echo("$x ");
}
echo("<br>\n");

//continue in foreach
$colors = array("Red" , "Saffron" , "Green" , "Yellow" , "Blue");
foreach($colors as $x){
    if($x == "Green") continue;
    echo("$x ");
}
echo("<br>\n");

//travering object using foreach
class Car{
    public $color;
    public $model;
    public function __construct($color , $model){
        $this->color = $color;
        $this->model = $model;
    }
}
$mycar = new Car("red" , "Volvo");
print_r($mycar);
foreach($mycar as $x=>$y){
    echo("$x : $y <br>\n");
}

//by changing variable in foreach loop will not affect to original array value;
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
  if ($x == "blue") $x = "pink";
}

var_dump($colors);

//alternative syntax
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) :
  echo "$x <br>";
endforeach;
?>