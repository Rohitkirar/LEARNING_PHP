<?php

//Selection sort 
    $numbers = [45 ,12 , 57, 34 ,64 , 72 ,19];

    for($i=0 ; $i<count($numbers); $i++){
        $mindex = $i;
        for($j = $i ; $j<count($numbers) ; $j++ ){
            if($numbers[$j] < $numbers[$mindex]){
                $mindex = $j;
            }
        }
        $temp = $numbers[$i];
        $numbers[$i] = $numbers[$mindex];
        $numbers[$mindex] = $temp;
    }
    print_r($numbers);
?>