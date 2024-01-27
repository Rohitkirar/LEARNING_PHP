<?php 
/* 
Sometimes we want to store values with more than one key. for this , we have multidimensional arrays.

Multidimensional Arrays
A multidimensional Array is an array containing one or more arrays.
Php supports multidimensional arrays that are two, three, four, five or more levels deep. However, arrays more than three levels deep are hard to manage for most people

*/
//2D array
$cars = [
    ["Volvo" , 22 , 18 ],
    ["BMW" , 15 , 13] , 
    ["Saab" , 5 , 2 ] ,
    ["Land Rover" , 17 , 15]
];

//Now the two-dimensional $cars array contains four arrays, and it has two indices: row and column.

//To get access to the elements of the $cars array we must point to the two indices (row and column):

echo( $cars[0][0] . ": In stock : " . $cars[0][1] . ", sold : " . $cars[0][2] . ".<br>\n");
echo( $cars[1][0] . ": In stock : " . $cars[1][1] . ", sold : " . $cars[1][2] . ".<br>\n");
echo( $cars[2][0] . ": In stock : " . $cars[2][1] . ", sold : " . $cars[2][2] .".<br>\n");
echo( $cars[3][0] .": In stock : " . $cars[3][1] . ", sold: " . $cars[3][2] . ".<br>\n");

// we can also print for loop inside another for loop

for($row = 0 ; $row < count($cars) ; $row++){
    echo("Row number : " . $row . "<br>\n");
    for($col = 0 ; $col < count($cars[$row]) ; $col++){
        echo($cars[$row][$col] .".<br>\n");
    }
}
?>