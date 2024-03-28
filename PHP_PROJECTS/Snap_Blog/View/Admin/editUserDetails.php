<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../Class/connection.php');
    require_once('../../Class/User.php');
    $user = new User();

    $userData = $user->userDetails($_SESSION['user_id']);

    if($userData[0]['role'] != 'admin'){
        header('location: ../logout.php?logoutsuccess=false');
    }

        $user_id = $_GET['user_id'];

        $userDetailsArray = $user->userDetails($user_id);

        $first_name = $userDetailsArray[0]['first_name']; 
        $last_name = $userDetailsArray[0]['last_name'];
        $age = $userDetailsArray[0]['age'];
        $gender = $userDetailsArray[0]['gender'];
        $email = $userDetailsArray[0]['email']; 
        $mobile = $userDetailsArray[0]['mobile'];  
        $username = $userDetailsArray[0]['username'];

        if($userDetailsArray[0]['deleted_at'])
            $userstatus = 'InActive';
        else{
            $userstatus = 'Active';
        } 

        $first_nameErr = $last_nameErr = $ageErr = $genderErr = $emailErr = $mobileErr = $usernameErr = '';

        if(isset($_POST['update'])){

            $first_name = $_POST['first_name'];

            if(preg_match("/^[a-zA-Z]+$/" , $first_name))
                $first_nameErr = '';
            else
                $first_nameErr = 'Please enter valid first name!';

            $last_name = $_POST['last_name'];

            if(preg_match("/^[a-zA-Z]+$/" , $last_name))
                $last_nameErr = '';
            else
                $last_nameErr = 'Please enter valid last name!';

            $age = $_POST['age'];

            if($age >= 15 && $age <= 100 )
                $ageErr = '';
            else 
                $ageErr = 'Enter valid age b/w 15 to 100 ONLY!';

            $gender = $_POST['gender'];

            if($gender == 'male' || $gender == 'female' || $gender == 'other')
                $genderErr = '';
            else    
                $genderErr = 'please choose Correct gender!';

            $email = $_POST['email'];

            if(preg_match("/^[a-zA-Z]+[.\_\-]*[\w]*@gmail.com$/" , $email))
                $emailErr = '';
            else
                $emailErr = 'Please enter valid email like .....@gmail.com!';

            $mobile = (string)$_POST['mobile'];

            if(preg_match("/^[6-9]{1}[0-9]{9}$/" , $mobile))
                $mobileErr = '';
            else
                $mobileErr = 'Please enter valid mobile containing 10 digit';

            
            $username = $_POST['username'];

            if(preg_match("/^[a-zA-Z]+[\w]{8}$/" , $username))
                $usernameErr = '';
            else
                $usernameErr = 'Please enter valid username abcd1234 of 8 characters';

            $status = $_POST['status'];

            if($status == 'Active' || $status == 'InActive'){
                
                $statusErr = '';

                if($status == 'Active')
                    $status = 1 ;
                else
                    $status = 0 ;   
            }
            else    
                $statusErr = 'please choose Correct status!';

            $user_id = $_POST['update'];

            if($first_nameErr == '' && $last_nameErr == '' && $ageErr == '' && $genderErr == '' && $emailErr == '' && $mobileErr == '' && $usernameErr == '' && $statusErr == ''){

                if($status){
                    $userdetails = compact('first_name' , 'last_name' , 'age' , 'gender' , 'email' , 'mobile' , 'username' );

                    $result = $user->updateUserDetails($user_id , null , $userdetails);
                    
                    if($result){
                        $_SESSION['useraddsuccess'] = true;
                        header('location: allUserDetails.php');
                    }
                    else
                        header('location: allUserDetails.php');
                }
                else
                    header("location: deleteUser.php?user_id=$user_id");
            }
        }
}
else{
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
    <?php require_once('adminnavbar.php') ?>

    <form onsubmit="return confirm('Do you want to update user details') " action="<?php echo $_SERVER['PHP_SELF']."?user_id=$user_id"; ?>" method="post" >

        <div class="container mt-5 p-5 shadow-lg mb-5 bg-white rounded" style="width:45%">
            <div class="text-center">
                <p >
                    <img src="../../upload/snapchat.png" alt="logo" style="width:10%">
                    <span style="font-size:x-large">ɮʟօɢ</span>
                </p>
                <h4 class="mt-1 mb-5 pb-1">Edit User Info</h4>
            </div>
            <hr>
            <div class="form-outline mb-4">
                <label class="form-label">Firstname <span style="color:red;"></span><?php echo $first_nameErr ?></span></label>
                <input class="form-control" type="text" name="first_name" value="<?php echo $first_name; ?>" >
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">Lastname: <span style="color:red;"><?php echo $last_nameErr ?></span></label>
                <input class="form-control" type="text" name="last_name" value="<?php echo $last_name; ?>" >
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">Gender: <span style="color:red;"><?php echo $genderErr ?></span></label><br>
                <input type="radio" name="gender" value="male" checked> Male<br>
                <input type="radio" name="gender" value="female"> Female<br>
                <input type="radio" name="gender" value="other"> Other<br><br>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">Age : <span style="color:red;"><?php echo $ageErr ?></span></label>
                <input class="form-control" type="number" name="age" value="<?php echo $age; ?>" size="3" ><br><br>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">Mobile : <span style="color:red;"><?php echo $mobileErr ?></span></label>
                <input class="form-control" type="text" name="mobile" value="<?php echo $mobile; ?>" size="10"><br><br>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email: <span style="color:red;"><?php echo $emailErr ?></span></label>
                <input class="form-control" type="text" id="email" value="<?php echo $email; ?>" name="email"><br><br>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="username">UserName :  <span style="color:red;"><?php echo $usernameErr ?></span></label>
                <input class="form-control" type="text" id="username" value="<?php echo $username; ?>" name="username"><br><br>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">User Status:</label><br>
                <input type="radio" name="status" value="Active" checked>User Activate<br>
                <input type="radio" name="status" value="InActive">User DeActivate<br>
            <div class="form-outline mb-4">
            </div>
            <div class="form-outline mb-4">
                <button class="btn btn-primary" style="width:100%" type="submit" name="update" value='<?php echo $_GET['user_id'] ?>'  class="registerbtn" >Submit</button>
            </div>
        </div>
    </form>


</body>
</html>
