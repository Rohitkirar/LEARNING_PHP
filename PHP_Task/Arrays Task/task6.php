<?php 
/*Q6.
(i) Short the array marks column to descending order
(ii) Short the Array according to there total of marks column 
*/

$student = array (

    array(
        'firstname' => 'john',
        'lastname'=> "deo",
        'mark' => 
            array(
            'english' => 100,
            'gujrati' => 220,
            'hindi' => 30
            )
    ),

    array(
        'firstname' => 'David',
        'lastname'=> "Miller",
        'mark' =>
            array(
            'english' => 120,
            'gujrati' => 310,
            'hindi' => 20
            )
    ),

    array(
        'firstname' => 'Thomas',
        'lastname'=> "wilson",
        'mark' =>
            array(
            'english' => 200,
            'gujrati' => 110,
            'hindi' => 70
            )
    ),


    array(
        'firstname' => 'James',
        'lastname'=> "Brown",
        'mark' =>
            array(
            'english' => 240,
            'gujrati' => 310,
            'hindi' => 10
            )
    
            )
);

foreach($student as $key=>$values){

    foreach($values as $k => $v){
    if($k!="mark")
        continue;   
    else
        arsort($v);
        $student[$key][$k] = $v;
        $student[$key]["totalmarks"] = array_sum($v);
    }
    
}

function compareValues($array1 , $array2) {
    foreach($array1 as $key => $value){
        if($key=="totalmarks"){
            $a = $array1["totalmarks"];
        }
    }
    foreach($array2 as $key => $value){
        if($key=="totalmarks"){
            $b = $array2["totalmarks"];
        }
    }
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

uasort($student , "compareValues");

foreach($student as $key => $values){
    Echo "Student $key <BR>\n";
    foreach($values as $k => $v){
        if($k == 'mark'){
            foreach($v as $i=>$j){
                echo("$i : $j <br>\n");
            }
        }
        else
            echo ("$k : $v <br>\n");
    }
}

echo "METHOD 2 : <BR>\n"; 

//METHOD 2 

$student = array (

    array(
        'firstname' => 'john',
        'lastname'=> "deo",
        'mark' => 
            array(
            'english' => 100,
            'gujrati' => 220,
            'hindi' => 30
            )
    ),

    array(
        'firstname' => 'David',
        'lastname'=> "Miller",
        'mark' =>
            array(
            'english' => 120,
            'gujrati' => 310,
            'hindi' => 20
            )
    ),

    array(
        'firstname' => 'Thomas',
        'lastname'=> "wilson",
        'mark' =>
            array(
            'english' => 200,
            'gujrati' => 110,
            'hindi' => 70
            )
    ),


    array(
        'firstname' => 'James',
        'lastname'=> "Brown",
        'mark' =>
            array(
            'english' => 240,
            'gujrati' => 310,
            'hindi' => 10
            )
    
            )
);

for($i=0 ; $i<count($student) ; $i++){
    arsort($student[$i]['mark']);
    $student[$i]['totalmark'] = array_sum($student[$i]['mark']);
}
uasort($student , "sortfunction");

print_r($student);
function sortfunction($value1 , $value2){
    return $value1["totalmark"] > $value2["totalmark"] ? 1 : -1 ;
}

?>