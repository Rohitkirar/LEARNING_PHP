<?php 
//changing to array type using statement (array)$varname;
$a = 349  ;
$b = 34.342;
$c = "fdjifj ffgh" ;
$d = true;
$e = false ;
$f = NULL;

var_dump((array)$a);
var_dump((array)$b);
var_dump((array)$c);
var_dump((array)$d);
var_dump((array)$e);
var_dump((array)$f);

/*
object to array
Objects converts into associative arrays 
where the property names becomes the keys 
and the property values becomes the values:
*/

class Car{
    public $name ; 
    public $company ;
        public function __construct($name , $company){
            $this->name = $name ;
            $this->company = $company ;
        }
        public function print_details(){
            echo("name $this->name \nmodel $this->company\n");
        }
    }
$obj = new Car("Scorpio" , "Mahendra");
$obj->print_details();

print_r((array)$obj);
$obj_arr = (array)$obj;
echo($obj_arr["name"]);
?>