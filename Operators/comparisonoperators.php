<?php 
/*
php comparison operators are used to compare two values(number or string);
*/

//equal ==
var_dump(50=="50");

//identical ===
var_dump(50==="50");

//not equal != 
var_dump(50 != 40);

//not equal <> 
var_dump(50 <> "50");

//not identical  !==
var_dump(50!=="50");

//greater than >
var_dump(40>50);

//less than <
var_dump(50<30);

//Greater than or equal to >=
var_dump(40 >= 40);

//Less than or equal to <= 
var_dump(40<=79);

// spaceship <=> //returns integer
var_dump(40 <=> 50);
var_dump(40 <=> 30);
var_dump(30 <=> 30);

?>