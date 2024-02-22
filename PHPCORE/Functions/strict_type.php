<?php declare(strict_types=1);
/*
PHP is a Loosely Typed Language : PHP automatically associates a data type to the variable, depending on its value. 

Since the data types are not set in a strict sense, you can do things like adding a string to an integer without causing an error.

In PHP 7, type declarations were added. This gives us an option to specify the expected data type when declaring a function, and by adding the strict declaration, it will throw a "Fatal Error" if the data type mismatches.

To specify strict we need to set declare(strict_types=1);. This must be on the very first line of the PHP file.
*/

function name(string $name , string $name2):string{
    return "$name $name2";
}
echo(name("HELLO" , "WORLD"));

echo("<br>\n");
function addNumbers(float $a, float $b) : int {
    return (int)($a + $b);
  }
  echo addNumbers(1.2, 5.2);
?>