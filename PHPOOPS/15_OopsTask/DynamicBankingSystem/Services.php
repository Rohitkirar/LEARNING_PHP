<?php 
session_start();

$serviceErr = "" ;
$service =  $userName = "" ;


if(isset($_SESSION['username'])){

    $userName = $_SESSION['username'] ;

    if(isset($_POST['submit'])){
        $service = $_POST['service'];
        switch($service){
            case 'balance':
                header("location: balance.php");
                break ;
            case 'deposit':
                header("location: transaction.php");
                break ;
            case 'withdrawal':
                header("location: transaction.php");
                break ;
            case 'history':
                header("location: showTransaction.php");
                break ;
            case 'exit':
                header("location: logout.php");
                break ;
            default:
                $serviceErr = "Please select a Service!" ;
        }
    }
}
else{
    session_unset();
    session_destroy();
    $serviceErr = "<h2>Please Register Yourself First to enjoy our Banking Services!</h2>" ;
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
        
        <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
            <div>
                <h2>Bank Services</h2>
            </div>
            <div>
                <h2>Hello, <?php echo $userName ?></h2>
            </div>
            <div>
                <label for="service">Service : </label>
                <span style="color:red;">*<?php echo $serviceErr ; ?></span>
                <select name="service" id="bankname">
                    <option value="select">choose one</option>
                    <option value="balance">Check Balance</option>
                    <option value="deposit">Deposit Money</option>
                    <option value="withdrawal">Withdrawal Money</option>
                    <option value="history">Transaction History</option>
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