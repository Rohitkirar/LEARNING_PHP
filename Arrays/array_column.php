<?php 
/*
array_column() function returns the values from a single column in the input array

Syntax : array_column(array , column_key , index_key);

*/

$a = [
    [
        'id' => 5698,
        'first_name' => 'Peter',
        'last_name' => 'Griffin'
    ],
    [
        'id' => 4767,
        'first_name' => 'Ben',
        'last_name' => 'Smith'
    ],
    [
        'id' => 3809,
        'first_name' => 'Joe' , 
        'last_name' => 'Doe'
    ]
    ];
$last_names = array_column($a , 'last_name');
print_r($last_names);

$first_names = array_column($a , 'first_name' , 'id');
print_r($first_names);

// $numbers = [32,15,66,211, 564];  
// print_r(array_column($numbers ,1)); print an empty array

?>