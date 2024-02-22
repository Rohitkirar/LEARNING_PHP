<?php 
/*
filter_input() function gets an external variable (e.g. from form input) and optionally filters it.
This function is used to validate variables from insecure sources, such as user input.
Syntax
filter_input(type, variable, filter, options)

Parameter Values
Parameter	Description
type	Required. The input type to check for. Can be one of the following:
INPUT_GET , INPUT_POST , INPUT_COOKIE , INPUT_SERVER , INPUT_ENV

*/

if(isset($_GET['submit'])){
    if(filter_input(INPUT_GET , 'email' , FILTER_VALIDATE_EMAIL )){
            $email = $_GET['email'];
            echo "email is valid";
    }
    else {
        echo "Email invalid";
    }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET" >
        Email <input type="text" name="email" >
        <br>
        <input type="submit" name="submit"> ;
    </form>
</body>
</html>