<?php 
/*
extract() fn imports variables into the local symbol table from an array.
This fn uses array keys as variable names  and values as variable values. For each element it will create a variable in the current symbol table.
SYNTAX
extract(array, extract_rules, prefix)

Parameter Values
Parameter	Description
array	Required. Specifies the array to use
extract_rules	Optional. The extract() function checks for invalid variable names and collisions with existing variable names. This parameter specifies how invalid and colliding names are treated.
Possible values:

EXTR_OVERWRITE - Default. On collision, the existing variable is overwritten
EXTR_SKIP - On collision, the existing variable is not overwritten
EXTR_PREFIX_SAME - On collision, the variable name will be given a prefix
EXTR_PREFIX_ALL - All variable names will be given a prefix
EXTR_PREFIX_INVALID - Only invalid or numeric variable names will be given a prefix
EXTR_IF_EXISTS - Only overwrite existing variables in the current symbol table, otherwise do nothing
EXTR_PREFIX_IF_EXISTS - Only add prefix to variables if the same variable exists in the current symbol table
EXTR_REFS - Extracts variables as references. The imported variables are still referencing the values of the array parameter
prefix	Optional. If EXTR_PREFIX_SAME, EXTR_PREFIX_ALL, EXTR_PREFIX_INVALID or EXTR_PREFIX_IF_EXISTS are used in the extract_rules parameter, a specified prefix is required.

This parameter specifies the prefix. The prefix is automatically separated from the array key by an underscore character.

Return Value:	Returns  the number of variables extracted on success
*/
$a = "Original";
$arr = ["a" => "Cat" , "b" => "Dog" , "c" => "Horse" ];
extract($arr);
echo("\$a =$a ; \$b = $b ; \$c = $c");

echo("<br>\n");

$a = "Original" ;
$arr1 = array("a" => "cat" , "b" => "Dog" , "c" => "Horse" );
extract($arr1 , EXTR_PREFIX_SAME , "dup");

echo("\$a = $a ; \$b = $b; \$c = $c ; \$dup_a = $dup_a");
?>


