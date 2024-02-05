<?php 
/*
The require statement is also used to include a file into the PHP code.
PHP include vs require
=> However, there is one big difference between include and require; when a file is included with the include statement and PHP cannot find it, the script will continue to execute
=> If we do the same example using the require statement, the echo statement will not be executed because the script execution dies after the require statement returned a fatal error:
*/

/*
IMPORTANT POInts
** Use require when the file is required by the application.

** Use include when the file is not required and application should continue when file is not found.
*/
?>

<!DOCTYPE html>
<html lang="en">
<body>

    <div class="menu" >
        <?php require 'menu.php' ;?>
    </div>

    <h1>Welcome to my homepage !</h1>
    <p>Some Text</p>

    <?php 
    require 'vars.php' ;
    echo "I have $color $car";
    ?>
    <br>
    <!-- require unknown php file -->
    <?php 
    require 'noFileExists.php';
    echo "I have $color $car numbers $numeber";
    ?>

    <p>Some more text</p>
    
    <?php require 'footer.php'; ?>

</body>
</html>