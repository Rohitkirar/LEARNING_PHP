<?php 
//filter_id() return the id of filters passed in this function we can also use filter_list() to see all the filters and their id;
//SYNTAX : filter_id(filter_name)

var_dump(filter_id("validate_email"));

echo "<BR>" ;
foreach(filter_list() as $id => $filter){
    echo "<tr><td>$id</td>  <td>$filter</td>  <td> " .filter_id($filter) . "</td></tr><br>";
}
?>