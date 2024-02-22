<?php 
//Example 2 Now the abstract method has an argument ; 

abstract class ParentClass{
    
    abstract protected function prefixName($name);
}

class ChildClass extends ParentClass{
    public function prefixName($name){
        if($name == "John Doe"){
            $prefix = "Mr.";
        }
        elseif($name == "Jane Doe"){
            $prefix = "Mrs.";
        }
        else{
            $prefix = "";
        }
        return "{$prefix} {$name}" ;
    }
}

$class = new ChildClass();
echo $class->prefixName("John Doe")."<br>" ;
echo $class->prefixName("Jane Doe") . "<br>" ;
echo $class->prefixName("Doe") ."<br";

?>