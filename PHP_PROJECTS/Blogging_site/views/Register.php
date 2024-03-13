<?php 
session_start();

if(isset($_SESSION['user_id'])){
    session_unset();
    session_destroy();
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

    if(preg_match("/^[a-zA-Z]+[\w]*@gmail.com$/" , $email))
        $emailErr = '';
    else
        $emailErr = 'Please enter valid email like .....@gmail.com!';

    $mobile = (string)$_POST['mobile'];

    if(preg_match("/^[0-9]{10}$/" , $mobile))
        $mobileErr = '';
    else
        $mobileErr = 'Please enter valid mobile containing 10 digit';

    $username = $_POST['username'];

    if(preg_match("/^[a-zA-Z]+[\w]{8}$/" , $username))
        $usernameErr = '';
    else
        $usernameErr = 'Please enter valid username abcd1234 of 8 characters';


    $userpassword = $_POST['password'];

    if(preg_match("/^[a-zA-Z0-9]{6,15}$/" , $userpassword)){
        $passwordErr = '';
        $userpassword = md5($userpassword);
    }
    else
        $passwordErr = 'password should contains only alphabets and number and of 8 in size';



    if($first_nameErr == '' && $last_nameErr == '' && $ageErr == '' && $genderErr == '' && $emailErr == '' && $mobileErr == '' && $usernameErr == '' && $passwordErr == '' ){
        
        require_once('../database/connection.php');

        $role = 'user';
        $resultarr = [$first_name , $last_name , $age , $gender , $email , $mobile , $username , $userpassword , $role];
        
        $resultstr = json_encode($resultarr);
        $resultstr = substr($resultstr , 1 , -1);
        
        $role = $first_name = $last_name = $age = $gender = $email = $mobile = $username = $userpassword = ''; 

        $sql = "INSERT INTO users
                    (first_name , last_name , age , gender , email , mobile , username , password , role)
                VALUES($resultstr)";

        $result = mysqli_query($conn , $sql);
        
        if($result)
            echo "user data saved successfully <BR>";
        else
            echo "ERROR : " . mysqli_error($conn);

        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../public/css/register.css">
    
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >

        <div class="container">

            <center><h1>User Registration Form</h1></center>

            <hr>

            <label>Firstname <span style="color:red;"></span><?php echo $first_nameErr ?></span></label>
            <input type="text" name="first_name" value="<?php echo $first_name; ?>" >
            
            <label>Lastname: <span style="color:red;"><?php echo $last_nameErr ?></span></label>
            <input type="text" name="last_name" value="<?php echo $last_name; ?>" >
            
            <label>Gender: <span style="color:red;"><?php echo $genderErr ?></span></label><br>
            <input type="radio" name="gender" value="male"> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="radio" name="gender" value="other"> Other<br><br>
            
            <label>Age : <span style="color:red;"><?php echo $ageErr ?></span></label>
            <input type="number" name="age" value="<?php echo $age; ?>" size="3" ><br><br>
            
            <label>Mobile : <span style="color:red;"><?php echo $mobileErr ?></span></label>
            <input type="text" name="mobile" value="<?php echo $mobile; ?>" size="10"><br><br>
            
            <label for="email">Email: <span style="color:red;"><?php echo $emailErr ?></span></label>
            <input type="text" id="email" value="<?php echo $email; ?>" name="email"><br><br>
            
            <label for="username">UserName :  <span style="color:red;"><?php echo $usernameErr ?></span></label>
            <input type="text" id="username" value="<?php echo $username; ?>" name="username"><br><br>
            
            <label for="pass">Password:  <span style="color:red;"><?php echo $passwordErr ?></span></label>
            <input type="text" id="pass" value="<?php echo $userpassword; ?>" name="password"><br><br>
            
            <input type="submit" name="submit"  class="registerbtn" />

        </div>

        <div class="container signin">
            <span ><a href="home.php" style="text-decoration: none;">Home</a></span>  
            <span style="float:right;">Already have an account? <a href="Login.php" style="text-decoration: none;">Sign in</a>.</span>
        </div>

    </form>
</body>
</html>



<?php 

        // $sql = "INSERT INTO users
        //             (first_name , last_name , age , gender , email , mobile , username , password , role)
        //         VALUES
        //             ('$first_name' , '$last_name' , '$age' , '$gender' , '$email' , '$mobile' , '$username' , '$password' , '$role')";
?>
