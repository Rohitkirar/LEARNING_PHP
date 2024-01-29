<?php 
/*
The in_array() fn searches an array for a specific value;
Note: If the search parameter is a string and the type parameter is set to TRUE, the search is case-sensitive.

Syntax
in_array(search, array, type)
Return Value:	Returns TRUE if the value is found in the array, or FALSE otherwise
*/
$people = ["Peter" , "Joe" , "Glenn" , "CleveLand"];
if(in_array("Glenn" , $people))
    echo "Match found<Br>\n";
else 
    echo "match not found<br>\n";

    

$people = ["Peter" , "Joe" , "Glenn" , "CleveLand" , 23] ;
if(in_array("23" , $people , True))
    echo("Match Found" . "<br>\n");
else 
    echo("Match not found <br>\n");
if(in_array("Glenn" , $people , True))
    echo("Match Found" . "<br>\n");
else 
    echo("match not found" . "<br>\n");
if(in_array(23 , $people , True))
    echo("Match Found <br>\n");
else 
    echo("Match not found <br>\n");
?>