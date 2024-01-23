<?php
//rand(low , high) function return random number b/w low and high index
$random = rand(0 , 100);

echo($random);

echo("<br>\n");
for($i=1 ; $i<=100 ; $i++){
    echo(rand(1 , 100) ."\t");
}

?>