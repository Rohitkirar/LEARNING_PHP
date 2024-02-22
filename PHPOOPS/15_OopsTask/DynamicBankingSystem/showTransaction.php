<?php 
session_start();

$messageErr = $serviceErr = $transactiondetails = "";

if(isset($_SESSION['username'])){
    
    $myfile = fopen("Transaction.txt" , "r") or die("Unable to open file");

    $transactiondetails = fread($myfile , filesize("Transaction.txt"));
    
    fclose($myfile);

    $userName = $_SESSION['username'] ;
    
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
    <title>Transaction</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="main">
            <div>
                <h2>Hello, <?php echo $userName ?></h2>
                <h2>Your Bank Account Transaction History</h2>
                <p><?php echo $transactiondetails . $messageErr ?></p>
            </div>
            <div>
                <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
                    <div>
                        <h2>Bank Services</h2>
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
    </div>
</body>
</html>