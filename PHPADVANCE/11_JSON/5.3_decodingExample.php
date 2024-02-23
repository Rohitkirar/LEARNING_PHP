<?php 
//multidimension json ecoded object to decode it php object
echo "<pre>" ;
$encodedstudentData = '{
    "1":{"name":"Rohit","age":"20","city":"Sanchi"},
    "2":{"name":"Hariom","age":"21","city":"Raisen"},
    "3":{"name":"Mohit","age":"18","city":"Bhopal"},
    "4":{"name":"Randhir","age":"20","city":"Sanchi"},
    "5":{"name":"Himanshu","age":"21","city":"Raisen"},
    "6":{"name":"Aman","age":"18","city":"Bhopal"}
}' ;

echo "<h3>student Data in Json Format : </h3><br>" ;
print_r($encodedstudentData);

$decodedstudentData = json_decode($encodedstudentData);

echo "<h3>Student data in php Object</h3><br>" ;
print_r($decodedstudentData);

echo "<hR>";

echo "<h3>print student data one by one </h3><br>";
foreach($decodedstudentData as $key => $values){
    echo "id : $key<br>";
    foreach($values as $k=>$v){
        echo "$k : $v<br>" ;
    }
    echo "<hr>" ;
}
echo "</pre>" ;
?>