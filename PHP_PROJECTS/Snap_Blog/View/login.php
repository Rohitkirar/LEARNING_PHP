<?php 
session_start();

if(isset($_SESSION['user']) || isset($_SESSION['admin'])){
    session_unset();
    session_destroy();
}

$ERROR = "";
if(isset($_POST['submit'])){
    require_once('../Class/Connection.php');
    $conn = new Connection();
    $conn = $conn->createConnection();
    
    if($conn){
        require_once('../Class/User.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new USER($conn);

        if($user->userLogin($conn , $username , $password)){
            $ERROR = "";
            $result = $user->userDetails($conn);

            if($result['role'] == 'admin'){
                unset($user);
                require_once('../Class/Admin.php');
                $admin = new Admin($conn , $userResult['id']);
                $_SESSION['admin'] = $admin;
                unset($admin);
                header('location: admin.php');
            }
            else{
                $_SESSION['user'] = $user;

                unset($user);
                var_dump($_SESSION['user']);
                header('location: user.php');
            }
        }
        else{
            $ERROR = "Invalid Credentials!";
        }
    }
    else{
        $ERROR = 'connection lost!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <title>Sign In</title>
</head>
<body>

    <?php require_once('navbar.php') ?>

    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100 d-flex justify-content-center align-items-center">
            <div class="card rounded-3 text-black" style="width:45%">

                <div class="card-body p-md-5 mx-md-4">

                    <div class="text-center">
                        <p >
                            <img src="../upload/snapchat.png" alt="logo" style="width:15%">
                            <span style="font-size:x-large">ɮʟօɢ</span>
                        </p>
                        <h4 class="mt-1 mb-5 pb-1">Welcome To Snap Blog</h4>
                    </div>
                    
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <center><p>Please login to your account</p></center>

                        <center><p style="color:red"><?php echo $ERROR ?></p></center>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example11">Username</label>
                            <input type="text" name="username" maxlength="25" id="form2Example11" class="form-control"
                            placeholder="username" required/>    
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example22">Password</label>
                            <input type="password" name="password" maxlength="15" id="form2Example22" class="form-control" placeholder="********"  required/>
                        </div>

                        <div class="text-center pt-1 mb-5 pb-1">
                            <button type="submit" class="btn btn-primary mb-3" name="submit" style="width: 100%;" >Log in</button>
                        </div>

                        <div class="container align-items-center pb-4">
                            <span class="float-left"><a href="index.php" style="text-decoration: none;">Home</a></span>
                            <span class="mb-0 me-2">
                                Don't have an account?
                                <a href="register.php" class="btn btn-outline-success">Create new</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php 
        if(isset($_GET['RegisterSuccess']) && $_GET['RegisterSuccess'] == true){
            echo "<script> alert('User Successfully Register, Please Login to Continue!') </script>";
            unset($_GET['RegisterSuccess']);
        }
    ?>
</body>
</html>