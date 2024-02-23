<?php  

//number_format(number , decimal , decpointsperator , thousanseparator);

$number = 1000000 ;

echo number_format($number, 3  , "/"  ,"/");

echo("<br>\n");

echo(number_format($number , 2));

echo("<br>\n");

echo(number_format($number , 1));

echo("<br>\n");

echo(number_format($number , 1));

echo("<br>\n");

?>
