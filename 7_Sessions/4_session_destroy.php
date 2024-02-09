<?php 
// To remove all global session variable and destroy the session use session_unset() and session_destroy()

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

    echo "Before session_destroy()  : <BR>" ;

    print_r($_SESSION) ; 

    echo "<bR>" ;
    
    // destroy the session and remove all the variable;/

    echo "After session_destroy() : <BR> " ;

    session_destroy();

    print_r($_SESSION) ; 

    echo "<bR>" ;
    ?>
</body>
</html>