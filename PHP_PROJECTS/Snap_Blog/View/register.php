<?php 
session_start();
session_unset();
session_destroy();


$ERROR = "";

$role = $first_name = $last_name = $age = $gender = $email = $mobile = $username = $userpassword = ''; 
$first_nameErr = $last_nameErr = $ageErr = $genderErr = $emailErr = $mobileErr = $usernameErr = $passwordErr = ''; 

if(isset($_POST['submit'])){

    $first_name = $_POST['first_name'];

    if(preg_match("/^[A-Za-z]+$/" , $first_name))
        $first_nameErr = '';
    else
        $first_nameErr = 'Please enter valid first name!';

    $last_name = $_POST['last_name'];

    if(preg_match("/^[A-Za-z]+$/" , $last_name))
        $last_nameErr = '';
    else
        $last_nameErr = 'Please enter valid last name!';

    $age = $_POST['age'];

    if($age >= 10 && $age <= 150 )
        $ageErr = '';
    else 
        $ageErr = 'Enter valid age b/w 10 to 150 ONLY!';

    $gender = $_POST['gender'];

    if($gender == 'male' || $gender == 'female' || $gender == 'other')
        $genderErr = '';
    else    
        $genderErr = 'please choose Correct gender!';

    $email = $_POST['email'];

    if(preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/" , $email))
        $emailErr = '';
    else
        $emailErr = 'Please enter valid email';

    $mobile = (string)$_POST['mobile'];

    if(preg_match("/^(\\+\\d{1,3}[- ]?)?\\d{10}$/" , $mobile))
        $mobileErr = '';
    else
        $mobileErr = 'Please enter valid mobile containing 10 digit';

    $username = $_POST['username'];

    if(preg_match("/^[A-Za-z]\\w{5,29}$/" , $username))
        $usernameErr = '';
    else
        $usernameErr = 'Please enter valid username min 5 char';


    $password = $_POST['password'];

    if(preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,16}$/" , $password)){
        $passwordErr = '';
        if($password == $username){
            $passwordErr = "username and password should not be same!";
        }else{
            $password = md5($password);
        }
    }
    else
        $passwordErr = 'Minimum 8 characters, at least one letter, one number, and one special character';

    if($first_nameErr == '' && $last_nameErr == '' && $ageErr == '' && $genderErr == '' && $emailErr == '' && $mobileErr == '' && $usernameErr == '' && $passwordErr == '' ){
        
        require_once('../Class/Connection.php');
        require_once('../Class/User.php');

        $user = new USER();

        if($user->userRegister($_POST)){
            $ERROR = "";
            header('location: login.php?RegisterSuccess=true');
        }
        else{
            $ERROR = 'Failed to Register, Try Again!';
        }

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
            <div class="card rounded-3 text-black" style="width:55%">

                <div class="card-body p-md-5 mx-md-4">

                    <div class="text-center">
                        <p >
                            <img src="../upload/snapchat.png" alt="logo" style="width:10%">
                            <span style="font-size:x-large">ɮʟօɢ</span>
                        </p>
                        <h4 class="mt-1 mb-5 pb-1">Welcome To Snap Blog</h4>

                        <center><p>Create Your Account</p></center>
                    </div>
                    


                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>"   method="post" >

                        <div class="form-outline mb-3">
                            <label class="form-label" for="first_name">Firstname <span style="color:red;"><?php echo '* ' . $first_nameErr ?></span></label>
                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $first_name; ?>"  required />   
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label">Lastname: <span style="color:red;"><?php echo '* ' . $last_nameErr ?></span></label>
                            <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>" >
                        </div>

                        <div class="form-outline mb-2 ">
                            <label class="form-label" >Gender: <span style="color:red;"><?php echo '* ' . $genderErr ?></span></label>
                            <div class="d-flex " style="align-items:center; justify-content:space-around">
                                <p><input type="radio" name="gender" value="male" checked> Male</p>
                                <p><input type="radio" name="gender" value="female"> Female</p>
                                <p><input type="radio" name="gender" value="other"> Other</p>
                            </div>
                        </div>
                        <div class="form-outline mb-2">
                            <label>Age : <span style="color:red;"><?php echo '* ' . $ageErr ?></span></label>
                            <input type="number" class="form-control" name="age" value="<?php echo $age; ?>" size="3" ><br><br>
                        </div>

                        <div class="form-outline mb-1 ">
                            <label>Mobile : <span style="color:red;"><?php echo '* ' . $mobileErr ?></span></label>
                            <input type="Number" class="form-control" name="mobile" maxlength="10" value="<?php echo $mobile; ?>" size="10"><br><br>
                        </div>

                        <div class="form-outline mb-1 ">
                            <label for="email">Email: <span style="color:red;"><?php echo '* ' . $emailErr ?></span></label>
                            <input type="text" class="form-control" id="email" value="<?php echo $email; ?>" name="email"><br><br>
                        </div>
                        <div class="form-outline mb-2 ">
                            <label for="username">UserName :  <span style="color:red;"><?php echo '* ' . $usernameErr ?></span></label>
                            <input type="text" class="form-control" id="username" maxlength="25" value="<?php echo $username; ?>" name="username"><br><br>
                        </div>
                        <div class="form-outline mb-3 ">
                            <label for="pass">Password:  <span style="color:red;"><?php echo '* ' . $passwordErr ?></span></label>
                            <input type="password" class="form-control" id="pass" maxlength="15"  name="password">
                        </div>
                        
                        <div class="text-center pt-1 mb-5 pb-1">
                            <button type="submit" class="btn btn-primary mb-3" name="submit" style="width: 100%;" >Register</button>
                        </div>

                        <div class="container signin">
                            <span ><a href="index.php" style="text-decoration: none;">Home</a></span>  
                            <span style="float:right;">Already have an account? <a href="Login.php" style="text-decoration: none;">Sign in</a>.</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php 
    require_once('footer.php');
?>
</body>

</html>