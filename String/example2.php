<?php
//strtoupper() , strtolower() , ucfirst() , ucwords() , strrev() , str_replace() , trim();

$str = "This is a string which is having length greater than 30. This is a string which is having length greater than 30 dfj er reoda  erojawp alvfal woreio alfla0 woprjioed lvncla owe";

//strtoupper();
$strupper = strtoupper($str);
print("\nUpper case string  : \n" . $strupper );

echo("<br>\n");

//strtolower();
$strlower = strtolower($str);
print("\nLower Case sting  : \n" . $strlower);

"<br>";

echo("\n\n ucfirst() and ucwords() ");
$str1 = "the world heritage site : sanchi Stupa";
"<br>";

echo("\n $str1 \n");
//ucfirst()
$str1 = ucfirst($str1);
print("\n" . $str1);

//ucwords();
$str1 = ucwords($str1);
print("\n" . $str1);

echo("<br>\n");

?>