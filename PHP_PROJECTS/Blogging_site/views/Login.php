<?php 
session_start();

$username = $userpassword = ''; 
$usernameErr = $passwordErr = ''; 

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    
    if(preg_match("/^[a-zA-Z]+[\w]{8}$/" , $username))
        $usernameErr = '';
    else
        $usernameErr = 'Please enter valid username ';


    $userpassword = $_POST['password'];

    if(preg_match("/^[\w]{8}$/" , $userpassword))
        $passwordErr = '';
    else
        $passwordErr = 'valid password!';


    if($usernameErr == '' && $passwordErr == '' ){

        require_once('../database/connection.php');

        $userpassword = md5($userpassword);

        $sql = "SELECT id , role FROM users WHERE username = '$username' AND password = '$userpassword'"; 
        $result = mysqli_query($conn , $sql);
        $resultArray = mysqli_fetch_assoc($result);

        if($resultArray){

            $_SESSION['user_id'] = $resultArray['id']; 
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $resultArray['role'];
            
            if($_SESSION['role'] == 'user')
                header('location: user.php');
            else
                header('location: admin.php');
        }
        else{
            echo "ERROR :  " . mysqli_error($conn);
        }
        
        $username = $userpassword = ''; 
        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../public/css/login.css">
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="imgcontainer">
            <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
            <h2>USER LOGIN</h2>
        </div>
        <div class="container">

            <label for="uname"><b>Username</b><b style="color:red"><?php echo $usernameErr ?></b></label>
            <input type="text" name="username" required>

            <label for="psw"><b>Password</b><b style="color:red"><?php echo $passwordErr ?></b></label>
            <input type="text"  name="password" required>

            <button type="submit" value="submit" name="submit" >Login</button>

        </div>

        <div class="container" style="background-color:#f1f1f1">
            <span class="psw">New User <a href="Register.php">Register Here!</a></span>
        </div>
    </form>

</body>
</html>