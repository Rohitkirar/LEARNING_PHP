<?php 
//include_once() is used to include the file only one time means that if we already add the file at top of our code and again we are trying to do so then it will not add it again while include add it again and again.
//mostly we use include_once();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>navbar printing using include_once()  function : </h2>
    <?php 
    include_once('menu.php');
    ?>
    
    <h2>Again we are trying to include same file  of navbar printing using include_once() function : </h2>

    <?php 
    include_once('menu.php');
    ?>
</body>
</html>