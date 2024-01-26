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
?>