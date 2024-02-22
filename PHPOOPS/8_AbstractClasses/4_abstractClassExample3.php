<?php 
//Example 3 the child class may define optional arguments that are not in the parent's abstract method
abstract class ParentClass{
    abstract protected function prefixName($name);
}

class ChildClass extends ParentClass {
    public function prefixName($name , $separator="." , $greet = "Dear"){
        if($name == "john Doe"){
            $prefix = "Mr" ;
        }
        elseif($name == "jane Doe"){
            $prefix = "Mrs";
        }
        else{
            $prefix = "";
        }
        return "{$greet} {$prefix}{$separator} {$name}";
    }
}
$class = new ChildClass;
echo $class->prefixName("john Doe");
echo "<br>";
echo $class->prefixName("jane Doe");
?>