<?php 
session_start();

$messageErr = $message = "" ;

if(isset($_SESSION['username'])){

    $message = "ThankYou for using our services<br>You have successfully Logout!" ;
    session_unset();
    session_destroy();

    // $username = $_SESSION['username'] ;
    // $balance = $_SESSION['balance'] ;

    // if(isset($_SESSION['submit'])){
    //     $service = $_SESSION['service'];
    //     switch($service){
    //         case 'allservices':
    //             header("location: Services.php");
    //             break ;
    //         case 'exit':
    //             header('location: logout.php');
    //             break ;
    //         default:
    //             $serviceErr = "Please select a Service!" ;
    //     }
    // }
}
else{
    session_unset();
    session_destroy();
    $messageErr = "<h2>Please Register Yourself First to enjoy our Banking Services!</h2>" ;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="main">

        <h2><?php echo $message . $messageErr ?></h2>

        <h4><a href="userRegistration.php">Register Here</a></h4>
        <!-- <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
            
            <div>
                <input type="submit" value="submit" name="submit">
                <input type="reset">
            </div>
        </form> -->
    </div>
</body>
</html>