<?php 
session_start();
echo session_id();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <?php 
        echo session_id();

        session_start(); // warning generated session already started;

        echo session_id();
        ?>
    </div>
</body>
</html>