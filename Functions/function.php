<?php 

//single argument function
function familyName($fname){
    echo("$fname Refsnes.<br>\n");
}
familyName("Jani");
familyName("Hege");
FamilyNaMe("Stale"); // caseInsenstive property 
familyName("Kai Jim");
familyName("Borge");

//double argument function
function familyDetails($fname , $year){
    echo("$fname Refsnes. Born in $year<br>\n");
}
familyDetails("Hege" , "1975");
familyDetails("Stale" , "1978");
familyDetails("Kai JIm" , 1983);

//Default Argument value : shows how to use a default parameter. If we call the function setHeight() without arguments it takes the default value as argument

function setHeight($minheight = 50){
    echo("The height is : $minheight<br>\n");
}
setHeight(350);
setHeight();

//function - returning values
function sum($x , $y){
    $z = $x + $y;
    return "$z";
}
echo("5 + 10 = " . sum(5,10) . "<br>\n");
echo("7 + 13 = " . sum(7,13) . "<br>\n");


?>