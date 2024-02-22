<?php 
/**
 PHP Namespaces 
 * Namespaces are qualifiers that solve two different problems: 
 * They allow for better organization by grouping classes that work together to perform a task
 * They allow the same name to be used for more than one class
 
 Declaring a Namespace
 * Namespaces are declared at the beginning of a file using the "namespace" keyword:
 
 TO Use Namespace
 * to use namespace first include that file where namespace declare with include or require keyword with file with path if present in any other directory.
 * then we can use the namespace if we want alias the name of namespace so we use "as" keyword to set a new name of namespace to use;
 
 Note: 
 * A namespace declaration must be the first thing in the PHP file. The following code would be invalid:
 */
//Syntax type 1

namespace namespace_Name ;
 //write code it is applicable in whole file;

//Syntax type 2

namespace namespace_Name{

    //write code inside it 
    
}

?>