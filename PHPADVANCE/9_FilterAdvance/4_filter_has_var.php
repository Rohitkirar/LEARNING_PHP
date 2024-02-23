<?php 
/*
Definition and Usage
The filter_has_var() function checks whether a variable of a specified input type exist.

This function checks the content received by the PHP page, so the variable must be sent to the page via e.g a querystring.

Syntax
filter_has_var(type, variable)

Return Value:	 TRUE on success, FALSE on failure

Parameter	Description
type	Required. The input type to check for. Can be one of the following:

INPUT_GET , INPUT_POST , INPUT_COOKIE , INPUT_SERVER , INPUT_ENV

variable	Required. The variable name to check
*/

if(isset($_GET['submit'])){
    if(filter_has_var(INPUT_GET , 'email')){
        if(filter_var($_GET['email'] , FILTER_VALIDATE_EMAIL)){
            $email = $_GET['email'];
            echo "email found and email is valid";
        }
        else {
            echo "email found and Email invalid";
        }
    }
    else {
        echo "Email not found";
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