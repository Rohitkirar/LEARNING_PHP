<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
    
    require_once('../common/userDetailsVerify.php');

    $userData = userVerification($_SESSION['user_id'] , $conn);

    $oldpasswordErr = $newpasswordErr = $retypepasswordErr = '';

    if(isset($_POST['updatepassword'])){

        $newpassword = $_POST['newpassword'];

        if(preg_match("/^[a-zA-Z0-9]{6,15}$/" , $newpassword)){
            $newpasswordErr = '';
        }
        else
            $newpasswordErr = 'contains only characters, number and range(6,15) length!';
    

        $retypepassword = $_POST['retypepassword'];

        if($retypepassword == $newpassword){
            $retypepasswordErr = '';
        }
        else{
            $retypepasswordErr = "password doesn't match with new password";
        }

        if($newpasswordErr == ''  && $retypepasswordErr == ''){
            $oldpassword = md5($_POST['oldpassword']);
            $sql = "SELECT password FROM users WHERE id = {$_SESSION['user_id']}"; 
            $result = mysqli_query($conn , $sql);
            $userpassword = mysqli_fetch_assoc($result);
            $userpassword = $userpassword['password'];

            if($userpassword == $oldpassword){
                $newpassword = md5($newpassword);
                if($oldpassword != $newpassword){
                    $oldpasswordErr = '';
                }else{
                    $oldpasswordErr = 'Old and New password should not be same!';
                }
            }
            else{
                $oldpasswordErr = 'Wrong Password !';
            }
        }


        if($oldpasswordErr == '' && $newpasswordErr == '' && $retypepasswordErr == ''){

            $sql = "UPDATE users
                    Set password = '$newpassword'
                    WHERE id = {$_SESSION['user_id']}";

            $result = mysqli_query($conn , $sql);
            
            if($result){
                $_SESSION['successpassword']=true;
                header('location: user.php');
            }
            else{
                $_SESSION['successpassword']=false;
                header('location: updatepassword.php');
            }
        }
    }
}
else{
    session_unset();
    session_destroy();
    header('location: ../common/logout.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../public/css/register1.css">
    <link rel="stylesheet" href="../../public/css/user.css">
    <link rel="stylesheet" href="../../public/css/style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
</head>
<body>
    <!-- adding navbar file -->
    <?php require_once('navbar.php') ?>

    <form onsubmit="return confirm('Do you want to update your password'); " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >

        <div class="container p-5 shadow-lg p-3 mb-5 bg-white rounded">

            <center><h1>Update Password</h1></center>

            <hr>

            <label for="oldpassword">Current password : <span style="color:red;"><?php echo $oldpasswordErr ?></span></label>
            <input type="password" id="oldpassword" name="oldpassword"><br>

            <label for="newpassword">New password : <span style="color:red;"><?php echo $newpasswordErr ?></span></label>
            <input type="password" id="newpassword" name="newpassword"><br>

            <label for="retypepassword">Retype New password : <span style="color:red;"><?php echo $retypepasswordErr ?></span></label>
            <input type="password" id="retypepassword" name="retypepassword"><br>
            
            <button type="submit" name="updatepassword"  class="registerbtn" >Update password</button>

        </div>
    </form>
    <?php 
        if(isset($_SESSION['successpassword']) && $_SESSION['successpassword'] == false){
            unset($_SESSION['successpassword']);
            echo '<script>alert("Failed Password Updated!")</script>';
        } 
    ?>
</body>
</html>
