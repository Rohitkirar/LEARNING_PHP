<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../Class/Connection.php');
    require_once('../../Class/User.php');
    $user = new User();

    $oldpasswordErr = $newpasswordErr = $retypepasswordErr = $ERROR = '';

    if(isset($_POST['updatepassword'])){

        $newpassword = $_POST['newpassword'];

        if(preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,16}$/" , $newpassword)){
            $newpasswordErr = '';
        }
        else
            $newpasswordErr = 'Minimum 8 characters, at least one letter, one number, and one special character';
    

        $retypepassword = $_POST['retypepassword'];

        if($retypepassword == $newpassword){
            $retypepasswordErr = '';
        }
        else{
            $retypepasswordErr = "password doesn't match with new password";
        }

        if($newpasswordErr == ''  && $retypepasswordErr == ''){
            $oldpassword = $_POST['oldpassword'];
            
            if($user->updatePassword($_SESSION['user_id'] , $oldpassword , $newpassword)){
                $_SESSION['successpassword']=true;
                header('location: user.php');
            }
            else{
                $oldpasswordErr = "Invalid Current Password";
            }
        }
    }
}
else{
    session_unset();
    session_destroy();
    header('location: ../logout.php?LogoutSuccess=true');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
</head>

<body>
    <!-- adding navbar file -->
    <?php require_once('navbar.php') ?>

    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100 d-flex justify-content-center ; align-items-center">
            <div class="card rounded-3 text-black" style="width:40%">

                <div class="card-body p-md-5 mx-md-4">

                    <div class="text-center">
                        <p>
                            <img src="../../upload/snapchat.png" alt="logo" style="width:15%" />
                            <span style="font-size:x-large">ɮʟօɢ</span>
                        </p>
                    </div>
                    <form onsubmit="return confirm('Do you want to update your password'); " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
                        <center><p>Update Password</p></center>

                        <center><p style="color:red"><?php echo $ERROR ?></p></center>

                        <div class="form-outline">
                            <label class="form-label" for="oldpassword">Current password : <span style="color:red;"><?php echo $oldpasswordErr ?></span></label>
                            <input class="form-control mb-3" type="password" id="oldpassword" name="oldpassword" maxlength="25" required />
                        </div>

                        <div class="form-outline">
                            <label class="form-label" for="newpassword">New password : <span style="color:red;"><?php echo $newpasswordErr ?></span></label>
                            <input class="form-control mb-3" type="password" id="newpassword" maxlength="25" name="newpassword" required />
                        </div>

                        <div class="form-outline">
                            <label class="form-label" for="retypepassword">Retype New password : <span style="color:red;"><?php echo $retypepasswordErr ?></span></label>
                            <input class="form-control mb-3" type="password" id="retypepassword" name="retypepassword" maxlength="25" required />
                        </div>

                        <div class="text-center pt-1 mb-5 pb-1">
                            <button type="submit" class="btn btn-primary mb-3" style="width: 100%;" name="updatepassword"  class="registerbtn" >Update password</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php 
        require_once('../footer.php');
    ?>
</body>
</html>
