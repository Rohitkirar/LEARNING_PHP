<?php
    /*
    Object datatype
    classes and object are two main aspects of OOPS programming
    Class is a template for an object and object is an instance of an class
    when an object is created it inherited all the properities from the class but each individual object have their own properties different from each other;
    */
    // example 1 using Car class
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

    
    //example 2 using Main class
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


?>