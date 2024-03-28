<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../Class/Connection.php');
    require_once('../../Class/User.php');
    
    $user = new User();

    $userData = $user->userDetails($_SESSION['user_id']);

    if($userData[0]['role'] != 'admin'){
        header('location: ../logout.php?LogoutSuccess=false');
    }

    $role = $first_name = $last_name = $age = $gender = $email = $mobile = $username = $userpassword = ''; 
    $first_nameErr = $last_nameErr = $ageErr = $genderErr = $emailErr = $mobileErr = $usernameErr = $passwordErr = ''; 

    if(isset($_POST['submit'])){

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
            $mobileErr = 'enter valid mobile starts with [5-9] containing 10 digit';

        $username = $_POST['username'];

        if(preg_match("/^[a-zA-Z]+[\w]{6,15}$/" , $username))
            $usernameErr = '';
        else
            $usernameErr = 'Please enter valid username abcd1234 of 8 characters';

        $userpassword = $_POST['password'];

        if(preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,16}$/"  , $userpassword)){
            $passwordErr = '';
            if($userpassword == $username){
                $passwordErr = "username and password should not be same!";
            }else{
                $userpassword = md5($userpassword);
            }
        }
        else
            $passwordErr = 'Minimum 8 characters, at least one letter, one number, and one special character';



        if($first_nameErr == '' && $last_nameErr == '' && $ageErr == '' && $genderErr == '' && $emailErr == '' && $mobileErr == '' && $usernameErr == '' && $passwordErr == '' ){

            $role = 'user';
            $password = $userpassword;
            $userdetails = compact('first_name' , 'last_name' , 'age' , 'gender' , 'email' , 'mobile' , 'username' , 'password' , 'role');

            $result = $user->userRegister($userdetails);
            
            if($result){
                $_SESSION['addusersuccess'] = true;
                header('location: allUserDetails.php');
            }
            else
                header('location: allUserDetails.php');

        }
    }
}
else{
    header('location: ../logout.php?LogoutSuccess=false');
}
?>
<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="stylesheet" href="../../public/css/style1.css"> -->
    <!-- <link rel="stylesheet" href="../../public/css/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
</head>
<body>
    <!-- adding navbar file -->
    <?php require_once('adminnavbar.php') ?>
    
    <form onsubmit="return confirm('Do you want to add this user!') " action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post" >

        <div class="container p-5 shadow-lg p-3 mt-4 rounded" style="width:40%">
            <div class="text-center">
                <p >
                    <img src="../../upload/snapchat.png" alt="logo" style="width:10%">
                    <span style="font-size:x-large">ɮʟօɢ</span>
                </p>
                <h4 class="mt-1 mb-5 pb-1">Add New User</h4>
            </div>

            <hr>

            <div class="form-outline mb-4">
                <label class="form-label" >Firstname <span style="color:red;"><?php echo '* ' . $first_nameErr ?></span></label>
                <input class="form-control" type="text" name="first_name" value="<?php echo $first_name; ?>" >
            </div>

            <div class="form-outline mb-4">
                <label class="form-label">Lastname: <span style="color:red;"><?php echo '* ' . $last_nameErr ?></span></label>
                <input class="form-control" type="text" name="last_name" value="<?php echo $last_name; ?>" >
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">Gender: <span style="color:red;"><?php echo '*  ' . $genderErr ?></span></label>
                <input type="radio" name="gender" value="male" checked> Male
                <input type="radio" name="gender" value="female"> Female
                <input type="radio" name="gender" value="other"> Other
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">Age : <span style="color:red;"><?php echo '* ' . $ageErr ?></span></label>
                <input class="form-control" type="number" name="age" value="<?php echo $age; ?>" size="3" >
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">Mobile : <span style="color:red;"><?php echo '* ' . $mobileErr ?></span></label>
                <input class="form-control" type="Number" name="mobile" maxlength="10" value="<?php echo $mobile; ?>" size="10">
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email: <span style="color:red;"><?php echo '* ' . $emailErr ?></span></label>
                <input class="form-control" type="text" id="email" value="<?php echo $email; ?>" name="email">
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="username">UserName :  <span style="color:red;"><?php echo '* ' . $usernameErr ?></span></label>
                <input class="form-control" type="text" id="username" maxlength="25" value="<?php echo $username; ?>" name="username">
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="pass">Password:  <span style="color:red;"><?php echo '* ' . $passwordErr ?></span></label>
                <input class="form-control" type="password" id="pass" maxlength="15"  name="password">
            </div>
            <div class="form-outline mb-4">
                <button class="btn btn-primary w-100" type="submit" name="submit"  class="registerbtn" >Add User</button>
            </div>
        </div>
    </form>

</body>
</html>
