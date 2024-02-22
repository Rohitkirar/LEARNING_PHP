<?php
/*
similar_text(string , string , $percent(option)) check the similarity between two string
it checks character and return no of similar character count, return percent also
*/

echo(similar_text("Hello is World" , "Hii is World"));

similar_text("Hello is World" , "Hii is World" , $percent);

echo nl2br("\n");

echo("The similarity percentage b/w two string is " . $percent);
?>