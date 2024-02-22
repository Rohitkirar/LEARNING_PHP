<?php 
session_start();

$messageErr = $serviceErr = "";
$message = $service = "" ;
if(isset($_SESSION['username'])){

    $message = "ThankYou your transaction is successfully Recorded" ;
    
    include 'storeTransaction.php' ;

    $userName = $_SESSION['username'] ;
    $balance = $_SESSION['balance'] ;

    if(isset($_POST['submit'])){
        $service = $_POST['service'];
        switch($service){
            case 'allservices':
                header("location: Services.php");
                break ;
            case 'exit':
                header('location: logout.php');
                break ;
            default:
                $serviceErr = "Please select a Service!" ;
        }
    }
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

        <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
            <div>
                <h2>Bank Services</h2>
            </div>
            <div>
                <h2>Hello, <?php echo $userName ?></h2>
            </div>
            <div>
                <h3>Current Account Balance : <?php echo $balance ?></h3>
            </div>
            <div>
                <label for="service">Service : </label>
                <span style="color:red;">*<?php echo $serviceErr ; ?></span>
                <select name="service" id="bankname">
                    <option value="select">choose one</option>
                    <option value="allservices">All service</option>
                    <option value="exit">exit</option>
                </select>
            </div>
            <div>
                <input type="submit" value="submit" name="submit">
                <input type="reset">
            </div>
        </form>
    </div>
</body>
</html>