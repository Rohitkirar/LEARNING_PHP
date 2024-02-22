<?php 
// 5) create form with name, username, email, password. email or password is static. if it is correct then set username and name store in session and print in new page.	
session_start();
$name = $username = $email = $password = "";
$nameErr = $usernameErr = $emailErr = $passwordErr = "";

if(isset($_POST['submit'])){

    $name = test_data($_POST['name']);
    if(preg_match("/^[a-zA-z]+ ?[a-zA-Z]+$/" , $name) ){
        $nameErr = "" ;
    }
    else{
        $nameErr = "Invalid name" ;
    }

    $username = test_data($_POST['username']);
    if(preg_match("/^[a-zA-Z]+\w{6,10}$/",$username)){
        $usernameErr = "" ;
    }
    else{
        $usernameErr = "Invalid Username!" ;
    }

    $email = test_data($_POST['email']);
    if(preg_match("/^[a-zA-Z]+\w{5,15}@(gmail|yahoo|outlook).(com|in)$/" ,$email)){
        $emailErr = "" ;
    }
    else{
        $emailErr = "Invalid Email!" ;
    }

    $password = test_data($_POST['password']);
    if(preg_match("/^[a-zA-Z]+\w{6,10}$/" , $password)){
        $passwordErr = "" ;
    }
    else{
        $passwordErr = "Invalid Password!" ;
    }

    if($nameErr=="" && $usernameErr== "" && $passwordErr== "" && $emailErr==""){

        echo "form validated successfully";
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $name;
    }
    else{
        echo "form not submitted";
    }
}


function test_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data ; 
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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <label for="name">Name </label>
    <span style="color:red;">* <?php echo $nameErr ; ?></span>
    <br>
    <input type="text" name="name" id="name">
    <br>
    <label for="username">UserName</label>
    <span style="color:red;">* <?php echo $usernameErr ; ?></span>
    <br>
    <input type="text" name="username" id="username">
    <br>
    <label for="email">Email</label>
    <span style="color:red;">* <?php echo $emailErr ; ?></span>
    <br>
    <input type="email" name="email" id="email">
    <br>
    <label for="password">Password</label>
    <span style="color:red;">* <?php echo $passwordErr ; ?></span>
    <br>
    <input type="text" name="password" id="password">
    <br>
    <input type="submit" name='submit' value="submit">
    <input type="reset" name='reset' value="reset">
    </form>
</body>
</html>