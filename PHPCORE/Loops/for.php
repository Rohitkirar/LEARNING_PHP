<?php 
for($x=0 ; $x <= 10 ; ++$x){
    echo("$x ");
}
echo("<br>\n");

//break statement

for($x=10 ; $x>0 ; $x--){
    if($x ==5 ) break;
    echo("$x ");
}
echo("<br>\n");

//continue statement

for($x = 0 ; $x <= 10 ; $x++){
    if($x == 6 ) continue;
    echo("$x ");
}
echo("<br>\n");

for($x = 0 ; $x <= 100 ; $x+=10 ){
    echo("$x ");
}
echo("<br>\n");

//Example : 
$wrestler_details = [
    ["4201" , "Brock" , "Beast" ],
    ["5202" , "Roman" , "Head of the Table"],
    ["2203" , "John" , "Cenation"],
    ["9204" , "AJ" , "Phenomenal One"],
    ["7205" , "Randy" , "The viper"]
];

for($i = 0 ; $i < count($wrestler_details) ; $i++){
    $j = 0 ;
    
    echo("ID : " .$wrestler_details[$i][$j++] . " NAME : " . $wrestler_details[$i][$j++] . " TITLE : " . $wrestler_details[$i][$j++] . " <br>\n");
}

?>