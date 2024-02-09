<?php 
//to unset session variable use session_unset() function this function removes the variable ;

session_start() ;
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
    
    echo "Session variable before : <br>" ;
    print_r($_SESSION); 
     
    echo "<br>" ; 

    echo ("SESSIOn variable after using session_unset() : <br>" );

    session_unset(); 

    //it remove all the variable that is set in this session. to remove variable by key we use 
    //unset($_SESSION['favcolor']);
    
    print_r($_SESSION);

    echo "<br>";

    echo "Session Id  : " .session_id();
    ?>

</body>
</html>