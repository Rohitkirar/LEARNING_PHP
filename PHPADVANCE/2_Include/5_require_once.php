<?php 
//require_once() fn is used to add a php file in curr working php only one time, if the file include already then it will ignore it or if file not present it will generate fatal error and terminate the program;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>adding menu file using require_once() : </h1>
    <?php 
        require_once('menu.php');
    ?>
    <hr>
    <h1>Again, adding menu file using require_once() : </h1>
    <?php 
        require_once('menu.php');
    ?>
</body>
</html>