<?php 
session_start();

$depositErr = $serviceErr  = $amountErr = "" ;
$balance = $deposit =  $userName = $amount = "" ;

if(isset($_SESSION['username'])){

    $userName = $_SESSION['username'] ;
    $balance = $_SESSION['balance'] ;

    if(isset($_POST['submit'])){
        if($_POST['service'] == "exit"){
            header("location: logout.php");
        }
        else{
            $amount = $_POST['amount'];
            if($amount <= 0 || $amount > 100000){
                $amountErr = "Amount should be in between 0 to 100000 only";
            }
            else{
                $amountErr = "";
                $service = $_POST['service'];
                switch($service){
                    case 'deposit':
                        $balance += $amount;
                        if($amountErr == ""){
                        $_SESSION['balance'] = $balance ;
                        header("location: success.php");
                        }
                        break ;
                    case 'withdraw':
                        if($balance < $amount){
                            $amountErr = "Not Enough Amount to withdraw";
                        }
                        else if($amountErr == ""){
                        $balance -= $amount;
                        $_SESSION['balance'] = $balance ;
                        header('location: success.php');
                        }
                        break ;
                    default:
                        $serviceErr = "Please select a Service!" ;
                }
            }
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
    <title>Transaction</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="main">
        <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
            <div>
                <h2>Bank Money Transaction</h2>
            </div>
            <div>
                <h2>Hello, <?php echo $userName ?></h2>
            </div>
            <div>
                <label for="service">Service : </label>
                <span style="color:red;">*<?php echo $serviceErr ; ?></span>
                <select name="service" id="bankname">
                    <option value="select">choose one</option>
                    <option value="deposit">deposit</option>
                    <option value="withdraw">withdrawal</option>
                    <option value="exit">exit</option>
                </select>
                <label for="amount">Amount : </label>
                <span style="color:red;">*<?php echo $amountErr ; ?></span>
                <input type="number" name="amount" id="amount">
            </div>
            <div>
                <input type="submit" value="submit" name="submit">
                <input type="reset">
            </div>
        </form>
    </div>
</body>
</html>