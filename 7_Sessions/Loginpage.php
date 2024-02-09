<?php 
session_start();

$username = $password = "" ;
$usernameErr = $passwordErr = "" ;

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
}

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    if(preg_match("/^[a-zA-Z]+\w{6,10}$/" , $username)){
        $usernameErr = "" ;
    }
    else{
        $usernameErr = "invalid Username\nstarts with Alphabets\nusername may be alphanumeric";
    }

    $password = $_POST['password'] ;
    if(preg_match("/^[a-zA-Z]+@?[a-zA-Z0-9]+$/" , $password)){
        $passwordErr = "" ;
    }
    else{
        $passwordErr = "Invalid Password!\nPassword starts with Alphanumeric\nPassword may have special character[@]\npassword may be alphanumeric $password" ;

    }

    if($usernameErr=="" && $passwordErr == ""){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        
        header('location: homepage.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body{
        margin : 0;
        background-color: silver;
    }
    .main{
        margin: 5% 25% 25% 25%;
        padding: 3rem;
        border : none;
        background-color: whitesmoke;
    }
    </style>
</head>
<body>
    <div class="main">
        <h2>Login</h2>

    <form action=" <?php echo $_SERVER['PHP_SELF'] ;  ?> " method="post" >
        Username <input type="text" name="username" value="<?php echo $username;?>">
        <br>
        <p><?php echo $usernameErr ; ?></p>

        Password <input type="text" name="password" value="<?php echo $password;?>">
        <br>
        <p><?php echo $passwordErr ; ?></p>
        
        <input type="submit" name="submit">
        <input type="reset" name="reset">
    </form>
    </div>
</body>
</html>