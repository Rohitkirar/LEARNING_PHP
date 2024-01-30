<?php 
/*
array_unique() function removes duplicate values from an array. If two or more array values are the same , the first apperance will be kept and the other will be removed
NOTE : the returned array will keep the first array item's key type.
Syntax
array_unique(array, sorttype)
Parameter Values
Parameter	Description
array	Required. Specifying an array
sorttype	Optional. Specifies how to compare the array elements/items. Possible values:
SORT_STRING - Default. Compare items as strings
SORT_REGULAR - Compare items normally (don't change types)
SORT_NUMERIC - Compare items numerically
SORT_LOCALE_STRING - Compare items as strings, based on current locale

Return Value:	Returns the filtered array
*/

$a = ["a"=>"red" , "d"=>"red",  "b"=>"green" , "c"=>"red"];
print_r(array_unique($a));

?>