<?php 
/*
A cookie is created with the setcookie() function
Syntax
setcookie(name, value, expire, path, domain, secure, httponly);

Note: The setcookie() function must appear BEFORE the <html> tag.

To modify a cookie, just set (again) the cookie using the setcookie() function:

Delete a Cookie
To delete a cookie, use the setcookie() function with an expiration date in the past:
*/
$cookie_name = "user" ; 
$cookie_value = "John Doe";
setcookie($cookie_name , $cookie_value , time() + (86400*30) , "/" );
print_r($_COOKIE);

echo "<BR>";

$cookie_name = "user" ; 
$cookie_value = "Alex Porter"  ;

setcookie($cookie_name , $cookie_value , time()+(86400*30) , "/");
print_r($_COOKIE);
echo "<br>" ;

echo "<BR>";

$cookie_name = "user1" ; 
$cookie_value = "francise Alex Porter"  ;

setcookie($cookie_name , $cookie_value , time()+(86400*30) , "/");
print_r($_COOKIE);
echo "<br>" ;


print_r($_COOKIE);
echo "<br>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!isset($_COOKIE[$cookie_name])){
        echo "Cookie named '" . $cookie_name . "' is not set!";
    }
    else{
        echo "Cookie '" . $cookie_name . "' is set!<br>" ;
        echo "Value is : " . $_COOKIE[$cookie_name] . "<br>";
    }


    if(count($_COOKIE)>0){
        echo "cookies are enabled. <br>";
    }
    else{
        echo "cookies are disabled.<br>";
    }

    echo "NO of cookie stored : " . count($_COOKIE);
    ?>
</body>
</html>