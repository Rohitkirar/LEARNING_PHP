<?php 
//Traits can also define constants, as of PHP 8.2.0;

trait ConstantTrait{
    public const FLAG_MUTABLE = 1 ; 
}
class ConstantExample{
    use ConstantTrait;
}
$example = new ConstantExample;
echo $example :: FLAG_MUTABLE;
echo "<br>";


?>