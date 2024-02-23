<?php 
//IMPORTANT : If a trait defines a property then a class can not define a property with the same name unless it is compatible (same visibility and type, readonly modifier, and initial value), otherwise a fatal error is issued.
trait PropertiesTrait{
    public $same = true;
    public $different1 = false;
    public bool $different2;
    public int $value ;
}
class PropertiesExample{
    use PropertiesTrait;
    public $same = true;

    // public $different1 = true; // fatal error cannot we different from trait;

    public $different1 = false; 
    public bool $different2;

    // public float $value;//fatal error cannot declare different form trait
    public int $value;
    
    const name = "rohit kirar";
    function printdata(){
        $this->different2 = false;
        $this->value = 100;
        echo "Same variable : $this->same <BR>" ;
        echo "different1 variable : $this->different1 <BR>";
        echo "different2 variable : $this->different2 <br>";
        echo "value variable : $this->value<br>";
        echo "name variable : " . self::name;
    }
}
$propertiesexample = new PropertiesExample();
$propertiesexample->printdata();
?>