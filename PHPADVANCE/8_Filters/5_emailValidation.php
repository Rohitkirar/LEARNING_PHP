<?php 
/* FILTER_VALIDATE_EMAIL
It checks the format of email like 

* should contain @
* should contain . 
*/
//Example 1 

$email = "rohtkirar@23gmail.com";
if(!filter_var($email , FILTER_VALIDATE_EMAIL) === false ){
    echo  "$email is valid email address<br>";
}
else{
    echo "$email is not a valid email address <br>" ;
}

//Example 2

$email = "roht//kirar@23gmail.com";
if(!filter_var($email , FILTER_VALIDATE_EMAIL) === false ){
    echo  "$email is valid email address<br>";
}
else{
    echo "$email is not a valid email address <br>" ;
}

//Example 3 

$email = "roht//kirar23gmail.com";
if(!filter_var($email , FILTER_VALIDATE_EMAIL) === false ){
    echo  "$email is valid email address<br>";
}
else{
    echo "$email is not a valid email address <br>" ;
}


?>