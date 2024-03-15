<?php 
session_start();
if(isset($_SESSION['user_id'])){
    session_unset();
    session_destroy();
}

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

        require_once('../../database/connection.php');

        $userpassword = md5($userpassword);

        $sql = "SELECT id , role FROM users WHERE username = '$username' AND password = '$userpassword'"; 
        $result = mysqli_query($conn , $sql);
        $resultArray = mysqli_fetch_assoc($result);

        if($resultArray){

            $_SESSION['user_id'] = $resultArray['id']; 
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $resultArray['role'];
            
            if($_SESSION['role'] == 'user')
                header('location: ../user/user.php');
            else
                header('location: ../admin/admin.php');
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
    <link rel="stylesheet" href="../../public/css/login.css">
    <link rel="stylesheet" href="../../public/css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- adding navbar file -->
    <?php require_once('navbar.php') ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="imgcontainer">
            <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
            <h2>USER LOGIN</h2>
        </div>
        <hr>
        <div class="container">

            <label for="uname"><b>Username</b><b style="color:red"><?php echo $usernameErr ?></b></label>
            <input type="text" name="username" required>

            <label for="psw"><b>Password</b><b style="color:red"><?php echo $passwordErr ?></b></label>
            <input type="text"  name="password" required>

            <button type="submit" value="submit" name="submit" >Login</button>

        </div>

        <div class="container" >

            <span style="text-decoration: none;" ><a href="home.php" style="text-decoration: none;">Home</a></span>   
            <span class="psw">New User <a href="Register.php" style="text-decoration: none;">Register Here!</a></span>
            
        </div>
    </form>
    <!-- adding footer file -->
    <?php require_once('footer.php') ?>
</body>
</html>