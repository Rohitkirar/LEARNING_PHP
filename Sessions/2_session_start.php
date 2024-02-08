<?php 
//start the session first
//Note: The session_start() function must be the very first thing in your document. Before any HTML tags.

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>
<body>
    <?php
    echo "Session id : " . session_id() . "<BR>" ;

    $_SESSION["favcolor"] = "Saffron" ;
    $_SESSION["favanimal"] = "dog" ;

    echo "Session variable are set<br>" ; 
    echo "favcolor : " . $_SESSION['favcolor'] ."<br>" ;
    echo "favanimal : " . $_SESSION['favanimal'] . "<br>" ; 



    ?>


</body>
</html>