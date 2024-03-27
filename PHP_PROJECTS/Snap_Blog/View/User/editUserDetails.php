<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../Class/Connection.php');
    require_once('../../Class/User.php');
            
    $user = new User();
    
    $role = $first_name = $last_name = $age = $gender = $email = $mobile  = $userpassword = ''; 
    $first_nameErr = $last_nameErr = $ageErr = $genderErr = $emailErr = $mobileErr  = $passwordErr = '';

    $userDetailsArray = $user->userDetails($_SESSION['user_id']);
    
    if($userDetailsArray){

        $first_name = $userDetailsArray[0]['first_name']; 
        $last_name = $userDetailsArray[0]['last_name'];
        $age = $userDetailsArray[0]['age'];
        $gender = $userDetailsArray[0]['gender'];
        $email = $userDetailsArray[0]['email']; 
        $mobile = $userDetailsArray[0]['mobile'];  
    }
    else{
        echo "Failed to retrieve data from db";
    }

    $ERROR = "";


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
    
        $password = $_POST['password'];
        $passwordErr = '';
    

        if($first_nameErr == '' && $last_nameErr == '' && $ageErr == '' && $genderErr == '' && $emailErr == '' && $mobileErr == '' && $passwordErr == '' ){

            $userdetails = [ 'first_name'=>$first_name , 'last_name'=>$last_name , 'age' => $age , 'mobile' => $mobile , 'email' => $email , 'gender'=>$gender ];
            
            if($user->updateUserDetails($_SESSION['user_id'] , $password , $userdetails)){
                $passwordErr = '';
                $_SESSION['update'] = true;
                header('location: user.php');
            }
            else
                $passwordErr = 'Invalid Password!';
            
        }
    }
}
else{
    session_unset();
    session_destroy();
    header('location: logout?success=false');
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
                            <img src="../../upload/snapchat.png" alt="logo" style="width:10%">
                            <span style="font-size:x-large">ɮʟօɢ</span>
                        </p>
                        <h4 class="mt-1 mb-5 pb-1">Welcome To Snap Blog</h4>

                        <center><p>Edit User Information</p></center>
                    </div>
                    


                    <form onsubmit="return confirm('your are updating personal details')" action="<?php echo $_SERVER['PHP_SELF'] ?>"   method="post" >

                        <div class="form-outline mb-3">
                            <label class="form-label" for="first_name">Firstname <span style="color:red;"><?php echo '* '. $first_nameErr ?></span></span></label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>" required>
                            
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="last_name">Lastname: <span style="color:red;"><?php echo '* '. $last_nameErr ?></span></label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $last_name; ?>" required>
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
                            <label class="form-label" for="age">Age : <span style="color:red;"><?php echo '* ' . $ageErr ?></span></label>
                            <input type="number" class="form-control" name="age" id="age" value="<?php echo $age; ?>" maxlength="3" size="3"  required>
                        </div>

                        <div class="form-outline mb-1 ">
                            <label class="form-label" for="mobile">Mobile : <span style="color:red;"><?php echo '* ' . $mobileErr ?></span></label>
                            <input type="Number" class="form-control" id="mobile" name="mobile" maxlength="10" required value="<?php echo $mobile; ?>" size="10">
                        </div>

                        <div class="form-outline mb-1 ">
                            <label for="email">Email: <span style="color:red;"><?php echo '* '. $emailErr ?></span></label>
                            <input type="text" class="form-control" id="email" value="<?php echo $email; ?>" name="email" required>
                        </div>

                        <div class="form-outline mb-3 ">
                            <label for="pass">Confirm Password:  <span style="color:red;"><?php echo '* '. $passwordErr; ?></span></label>
                            <input class="form-control" type="password" id="pass" name="password" required>
                        </div>
                        
                        <div class="text-center pt-1 mb-5 pb-1">
                            <button type="submit" class="btn btn-primary mb-3" name="submit" style="width: 100%;" >Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>