<?php 
// setrawcookie() fn set a cookie without url encoding and send the data in url 

setrawcookie("user" , "100" , time()+400 , "/");
//86400 = 1 day ; 

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
        echo "cookie set successfull";
    ?>
</body>
</html>