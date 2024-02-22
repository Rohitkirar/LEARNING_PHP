<?php 
/*
Delete a Cookie
To delete a cookie, use the setcookie() function with an expiration date in the past:
*/
setcookie("user" , "" , time()-(86400*40) , '/');
setcookie("user1" , "" , time()-(86400*40) , '/');
?>