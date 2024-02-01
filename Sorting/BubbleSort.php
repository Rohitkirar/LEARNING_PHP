<?php 
//BUBBLE SORT 
$numbers = [ 96 , 3 , 23 , 56 , 4 , 22 , 75 , 232 , 43 ];

for($i=0 ; $i<count($numbers) ; $i++){
    for($j=0 ; $j<count($numbers)-$i-1 ; $j++ ){
        if($numbers[$j] > $numbers[$j+1]){
            $temp = $numbers[$j];
            $numbers[$j] = $numbers[$j+1];
            $numbers[$j+1] = $temp;
        }
    }
}
print_r($numbers);
?>