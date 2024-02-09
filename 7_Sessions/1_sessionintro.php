<?php 
/*
A session is a way to store information (in variables) to be used across multiple pages.
Session variables hold information about one single user, and are available to all pages in one application.

imp note : It will be accessable to all pages in same domain url


Tip: If you need a permanent storage, you may want to store the data in a database.]

Start a PHP Session
A session is started with the session_start() function.
Session variables are set with the PHP global variable: $_SESSION.

How does it work? How does it know it's me?

Most sessions set a user-key on the user's computer that looks something like this: 765487cf34ert8dede5a562e4f3a7e12. Then, when a session is opened on another page, it scans the computer for a user-key. If there is a match, it accesses that session, if not, it starts a new session.
*/
session_start();
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
    echo "Session id : " . session_id() . "<BR>" ;
    
    echo "Favcolor : " . $_SESSION['favcolor'] . "<br>";
    echo "FavAnimal : " . $_SESSION['favanimal'] . "<br>" ;

    print_r($_SESSION);
    ?>
</body>
</html>