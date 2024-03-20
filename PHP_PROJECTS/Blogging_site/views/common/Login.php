<?php 
session_start();

if(isset($_SESSION['user_id'])){
    session_unset();
    session_destroy();
}

$username = $userpassword = ''; 
$Error = ''; 

if(isset($_POST['submit'])){

    require_once('../../database/connection.php');

    $username = $_POST['username'];

    $userpassword = $_POST['password'];

    if(isset($username) && isset($userpassword)){

        $sql = "SELECT id , username , password , role FROM users WHERE username = '$username' ";

        $validResult = mysqli_query($conn , $sql);

        if(mysqli_num_rows($validResult)>0){
            $validResultArray = mysqli_fetch_assoc($validResult);
            $Error = '';
            if(md5($userpassword) == $validResultArray['password']){

                $_SESSION['user_id'] = $validResultArray['id']; 
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $validResultArray['role'];
                
                $username = $userpassword = ''; 
                mysqli_close($conn);
                
                if($_SESSION['role'] == 'user')
                    header('location: ../user/user.php');
                else
                    header('location: ../admin/admin.php');

            } 
            else{
                $Error = "Incorrect Username/Password!";
            }
        }
        else{
            $Error = "Incorrect Username/Password!";
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../../public/css/login1.css">
    <link rel="stylesheet" href="../../public/css/home1.css">
    <!-- <link rel="stylesheet" href="../../public/css/style1.css"> -->
    <link rel="stylesheet" href="../../public/css/style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body >

  
    <!-- adding navbar file -->
    <?php require_once('navbar.php') ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="shadow-lg p-3 mb-5 bg-white rounded" method="post">
        <div class="imgcontainer">
            <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
            <h2>USER LOGIN</h2>
        </div>
        <hr>
        <div class="container">
            <h6 class='text-center'><b style="color:red"><?php echo $Error ?></b></h6>
            <label for="uname"><b>Username</b></label>
            <input type="text" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password"  name="password" required>

            <button type="submit" value="submit" name="submit" >Login</button>

        </div>

        <div class="container" >

            <span style="text-decoration: none;" ><a href="home.php" style="text-decoration: none;">Home</a></span>   
            <span class="psw">New User <a href="Register.php" style="text-decoration: none;">Register Here!</a></span>
            
        </div>
    </form>

    <div class='air air1'></div>
    <div class='air air2'></div>
    <div class='air air3'></div>
    <div class='air air4'></div>

    <!-- adding footer file -->
    <?php 
        require_once('footer.php') ;

        if(isset($_GET['RegisterSuccess']) && $_GET['RegisterSuccess'] == true){
            unset($_GET['RegisterSuccess']) ;
            echo '<script> alert("user Registered Successfully , Please Login"); </script>';
        }
    ?>
    
</section>
</body>
</html>