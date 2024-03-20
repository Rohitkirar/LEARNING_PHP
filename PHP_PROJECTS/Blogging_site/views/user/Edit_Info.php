<?php 
session_start();


if(isset($_SESSION['user_id'])){

require_once('../../database/connection.php');
            
require_once('../common/userDetailsVerify.php');
    
$userData = userVerification($_SESSION['user_id'] , $conn);

$sql = "SELECT first_name , last_name , age , gender , email , mobile , password 
        FROM users 
        WHERE id = {$_SESSION['user_id']}";

$result = mysqli_query($conn , $sql);
$userDetailsArray = mysqli_fetch_assoc($result);


$first_name = $userDetailsArray['first_name']; 
$last_name = $userDetailsArray['last_name'];
$age = $userDetailsArray['age'];
$gender = $userDetailsArray['gender'];
$email = $userDetailsArray['email']; 
$mobile = $userDetailsArray['mobile'];  

$first_nameErr = $last_nameErr = $ageErr = $genderErr = $emailErr = $mobileErr  = $passwordErr = '';

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

        if(preg_match("/^[0-9]{10}$/" , $mobile))
            $mobileErr = '';
        else
            $mobileErr = 'Please enter valid mobile containing 10 digit';

        $userpassword = md5($_POST['userpassword']);

        if($userpassword == $userDetailsArray['password'])
            $passwordErr = '';
        else
            $passwordErr = "Password Not Matched!";
        

        if($first_nameErr == '' && $last_nameErr == '' && $ageErr == '' && $genderErr == '' && $emailErr == '' && $mobileErr == '' && $passwordErr == '' ){

            $sql = "UPDATE users
                    SET first_name = '$first_name' , 
                        last_name = '$last_name' , 
                        age = $age , 
                        gender = '$gender' , 
                        email = '$email' , 
                        mobile = '$mobile'
                    WHERE id = {$_SESSION['user_id']}";

            $result = mysqli_query($conn , $sql);
            
            if($result)
                header('location: user.php');
            else
                echo "ERROR : " . mysqli_error($conn);

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
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
</head>
<body>
    <!-- adding navbar file -->
    <?php require_once('navbar.php') ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >

        <div class="container p-5 shadow-lg p-3 mb-5 bg-white rounded">

            <center><h1>Edit User Info</h1></center>

            <hr>

            <label>Firstname <span style="color:red;"></span><?php echo $first_nameErr ?></span></label>
            <input type="text" name="first_name" value="<?php echo $first_name; ?>" >
            
            <label>Lastname: <span style="color:red;"><?php echo $last_nameErr ?></span></label>
            <input type="text" name="last_name" value="<?php echo $last_name; ?>" >
            
            <label>Gender: <span style="color:red;"><?php echo $genderErr ?></span></label><br>
            <input type="radio" name="gender" value="male" checked> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="radio" name="gender" value="other"> Other<br><br>
            
            <label>Age : <span style="color:red;"><?php echo $ageErr ?></span></label>
            <input type="number" name="age" value="<?php echo $age; ?>" size="3" ><br><br>
            
            <label>Mobile : <span style="color:red;"><?php echo $mobileErr ?></span></label>
            <input type="text" name="mobile" value="<?php echo $mobile; ?>" size="10"><br><br>
            
            <label for="email">Email: <span style="color:red;"><?php echo $emailErr ?></span></label>
            <input type="text" id="email" value="<?php echo $email; ?>" name="email"><br><br>
            
            <hr>

            <label for="pass">Confirm Password:  <span style="color:red;"><?php echo $passwordErr; ?></span></label>
            <input type="text" id="pass" name="userpassword"><br><br>
            
            <input type="submit" name="update"  class="registerbtn" />

        </div>
    </form>

</body>
</html>
