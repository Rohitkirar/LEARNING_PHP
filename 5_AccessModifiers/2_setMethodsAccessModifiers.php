<?php 
// we can also set the access modifier to the methods of a class also so the scope to call the method is decided

class Fruit{
    public $name , $color , $weight;

    function set_name($name){
        //a public function (default)
        $this->name = $name ; 
        $this->set_color('Yellow');
    }
    protected function set_color($color){
        //a protected function
        $this->color = $color;
        $this->set_weight("300");
    }
    private function set_weight($weight){
        $this->weight = $weight ;
        $this->print_details(); 
    }

    function print_details(){
        echo "Name : $this->name<br>
              Color : $this->color<br>
              Weight : $this->weight<hr>" ;
    }
}

$mango = new Fruit() ;

$mango->set_name('Mango');

// $mango->set_color('Yellow'); //error generating as we can't call protected method outside the class
// $mango->set_weight("300"); // error causing we can't call a private method outside a class and in derived class also;
?>