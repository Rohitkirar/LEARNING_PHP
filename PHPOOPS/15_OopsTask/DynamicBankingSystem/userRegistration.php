
<?php 
    session_start();

    $bankAccountNumber = $bankName = $userName = $password = "" ;
    $bankAccountNumberErr = $bankNameErr = $userNameErr = $passwordErr = "" ;
  
    if(isset($_POST['submit'])){
       
        if(preg_match("/^[0-9]{8}$/" , $_POST['accountnumber'])){
            $bankAccountNumber = $_POST['accountnumber'] ;
            $bankAccountNumberErr = "";
        }
        else{
            $bankAccountNumberErr = "Invalid account number!";
        }

        if(preg_match("/^Canara Bank|State Bank Of India|Central Bank Of India$/" , $_POST['bankname'])){
            $bankName = $_POST['bankname'] ;
            $bankNameErr = "" ;
        }
        else{
            $bankNameErr = "Please select Bank Name!" ;
        }

        if(preg_match('/^[a-zA-z]+[a-zA-Z0-9]{6,10}$/' , $_POST['username'])){
            $userName = $_POST['username'] ;
            $userNameErr = "" ;
        }
        else{
            $userNameErr = "Invalid UserName!";
        }

        
        if(preg_match('/^[a-zA-Z0-9]{6,10}$/' , $_POST['password'])){
            $password = $_POST['password'] ;
            $passwordErr = "" ;
        }
        else{
            $passwordErr = "Invalid password";
        }
        
        if($passwordErr == "" && $bankAccountNumberErr == "" && $bankNameErr == "" && $userNameErr == ""){
            $_SESSION['bankaccountnumber'] = $bankAccountNumber ;
            $_SESSION['bankname'] = $bankName ;
            $_SESSION['password'] = $password ;
            $_SESSION['username'] = $userName ;
            $_SESSION['balance'] = 0 ;

            include 'storeTransaction.php' ;

            header('location: Services.php' );
        }
        
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="main">
        
        <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
            <div>
                <h2>UserRegistration Form</h2>
            </div>
            <div>
                <label for="accountnumber">Account Number : </label>
                <span style="color:red;">*<?php echo $bankAccountNumberErr ; ?></span>
                <input type="number" name="accountnumber" id="accountnumber">
            </div>

            <div>
                <label for="bankname">Bank Name : </label>
                <span style="color:red;">*<?php echo $bankNameErr ; ?></span>
                <select name="bankname" id="bankname">
                    <option value="select">select Bank</option>
                    <option value="Canara Bank">Canara Bank</option>
                    <option value="State Bank Of India">State Bank</option>
                    <option value="Central Bank Of India">Central Bank</option>
                </select>
            </div>

            <div>
                <label for="username">User Name : </label>
                <span style="color:red;">*<?php echo $userNameErr ; ?></span>
                <input type="text" name="username" id="username">
            </div>

            <div>
                <label for="password">Password : </label>
                <span style="color:red;">*<?php echo $passwordErr ; ?></span>
                <input type="text" name="password" id="pasword">
            </div>
            
            <div>
                <input type="submit" value="submit" name="submit">
                <input type="reset">
            </div>
        </form>
    </div>
</body>
</html>