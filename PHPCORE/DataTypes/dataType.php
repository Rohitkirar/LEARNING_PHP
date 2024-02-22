<?php
    echo(
        "Variable can store data of different datatype and different datatype can do different things.\n"  . 
        "There are 8 datatypes in php that are as follows : - \n" . 
        "1) Integer 2) String 3) Float 4) boolean 5) Array 6) object 7) NULL 8) Resource \n" . 
        ""
    );

    //use var_dump($var_name) to check the datatype of any variable
    echo(var_dump("string"));
    
    echo("\n");
    
    /*
    String dataType
    String is a sequence of characters like "HELlo World";
    a string is any text inside quotes('single quote' , " double quotes ");
    */
    $str = "STRING varible ";
    echo("Hello world!" . "\n");
    print("This is my first php program\n");
    var_dump($str);

    echo("\n");
    
    /* 
    Integer dataType 
    It store a non-decimal value 
    it stores both positive or negative value
    the range of integer variable is -2147000000 to 2147 000 000 approx;
    */
    $x = 10 ; $y = 145 ; $z;
    $z = $x + $y ;
    echo($z);
    echo("\n");
    var_dump($z);
    
    echo("\n");

    /* 
    Float datatype 
    It store a decimal number or the number in exponential form
    */
    $a = 15656.012345;
    print($a);
    echo("\n");
    var_dump($a);

    /* 
    Boolean datatype
    a boolean can represent two state TRUE or FALSE;
    */
    $bool1 = TRUE;
    $bool2 = FALSE;
    echo($bool1 . " " . $bool2 . "\n");
    var_dump($bool1);
    var_dump($bool2);

    /*
    Array Datatype
    An array can store multiple value in a single variable
    */
    $arr = array("my" , "name" , "is" , "rohit" , 45 , 2312.23, true , 'a');
    var_dump($arr);
    print_r($arr);

    /*
    Object datatype
    classes and object are two main aspects of OOPS programming
    Class is a template for an object and object is an instance of an class
    when an object is created it inherited all the properities from the class but each individual object have their own properties different from each other;
    */
    class Car {
      public $color;
      public $model;
      public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
      }
      public function message() {
        return "My car is a " . $this->color . " " . $this->model . "!";
      }
    }
    
    $myCar = new Car("red", "Volvo");
    var_dump($myCar);

  class Main{
      public $color ;
      public $type ;
      public function __construct($color , $type){
          $this->color = $color;
          $this->type  = $type;
      }
      public function print_details(){
          // echo("Pen :  " . $this->color . " " . $this->type . "\n");
          echo "Pen : color " .  $this->color . " type : " . $this->type . "\n";
      }
  }
  $pen1 = new Main("blue" , "gel");
  
  $pen1->print_details();


    /*
    NULL dataType 
    if a variable is created and no value is assing then it assign automaticall Null
    */
    $var ;
    var_dump($var);

    /*
    Type Casting 
    we can change the data type of any variable by putting the datatype infront of variable inside parenthesis; 
    (string)
    */
    $num = 100 ;
    $str1 = (string) $num;
    var_dump($num);
    var_dump($str1);
?> 