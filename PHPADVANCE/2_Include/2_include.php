<?php 
/*
It is possible to insert the content of one PHP file into another PHP file (before the server executes it), with the include or require statement.
(E_COMPILE_ERROR) and stop the script
include will only produce a warning (E_WARNING) and the script will continue
Syntax
include 'filename';
*/
?>
<!DOCTYPE html>
<html lang="en">
<body>

    <div class="menu" >
        <?php include 'menu.php' ;?>
    </div>

    <h1>Welcome to my homepage !</h1>
    <p>Some Text</p>

    <?php 
    include 'vars.php' ;
    echo "I have $color $car";
    ?>
    <br>
    <!-- includes unknown php file -->
    <?php 
    include 'noFileExists.php';
    echo "I have $color $car numbers $numeber";
    ?>

    <p>Some more text</p>
    
    <?php include 'footer.php'; ?>

</body>
</html>