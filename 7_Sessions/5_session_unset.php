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
    print_r($_SESSION);
    ?>
</body>
</html>