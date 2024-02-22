<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
            text-align: center;
            max-height: 50rem;
            max-width: 20rem;
            border:1px solid black;
        }
        form{
            padding: 10px;
            text-align: left;
        }
        input{
            margin-top: 20px;

        }
    </style>
</head>
<body>
    <p>Creating php file to handle form <p>
    <div>
        <form action="formrequest.php" method="post">
            <label for="name">Name : </label>
            <input type="text" id="name" name="name">
            <br>
            <label for="city">City : </label>
            <input type="text" id="city" name="city">
            <br>
            <input type="submit" name="submit">
            <input type="reset" name="reset">
        </form>
    </div>
    
    <p>In this example we put html form and php code in same file</p>
    <div>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <label for="name">Name : </label>
            <input type="text" id="name" name="name">
            <br>
            <label for="city">City : </label>
            <input type="text" id="city" name="city">
            <br>
            <input type="submit" name="submit">
            <input type="reset" name="reset">
        </form>
    </div>
    <?php 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = htmlspecialchars($_REQUEST['name']);
        $city = htmlspecialchars($_REQUEST['city']);
        echo "Name : " . $name;
        echo "<br>";
        echo "City : " . $city;
    }
    ?>
</body>
</html>