<?php 

$nameErr = $dobErr = $emailErr = $numberErr = $genderErr = "" ;
$name = $email = $dob = $number = $gender = $address = $state = $city = $skills =  "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    if(empty($_POST['name']))
        $nameErr = "Name is Required!";
    else{
        $name = test_data($_POST['name']);
        $pattern = "/^[A-Za-z-' ]*$/";
        if(preg_match($pattern , $name))
            $nameErr = "" ;
        else
            $nameErr = "Onlt letters and whitespace allowed";
    }

    if(empty($_POST['email']))
        $emailErr = "Email is Required!";
    else{
        $email = test_data($_POST['email']);

        if(filter_var($email , FILTER_VALIDATE_EMAIL))
            $emailErr = "";
        else{
            $emailErr = "Invalid Email Format!";
        }
    }    

    if(empty($_POST['number']))
        $numberErr = "Number is Required!";
    else{
        $number = test_data($_POST['number']);
        $pattern = "/^\+91[6-9]?[0-9]{9}$/";
        if(preg_match($pattern , $number))
            $numberErr = "";
        else{
            $numberErr = "Invalid Number";
        }
    }
    if(empty($_POST['gender']))
        $genderErr = "Gender is Required!";
    else{
        $gender = test_data($_POST['gender']);
        $genderErr = "";
    }
    if(empty($_POST['dob']))
        $dobErr = "Date Of Birth is Required!";
    else{
        $dob = test_data($_POST['dob']);
        $pattern = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3[01])$/";
        if(preg_match($pattern , $dob))
            $dobErr = "";
        else
            $dobErr = "Invalid Date";
    }
    $address = test_data($_POST['address']);

    $state = test_data($_POST['state']);

    $city = test_data($_POST['city']);

    if(empty($_POST['skills']))
        $skills = "";
    else
        $skills = $_POST['skills'];
}
$userdetails = compact("name" , "email" , "number" , "dob" , "gender" , "state" , "city" , "address");


function test_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: grey;
        }
        .main{
            margin:5% 25% 0 25%;
            padding: 1rem 1rem 2rem 1rem;
            background-color: whitesmoke;
            /* height: 15rem; */
            width: 30rem;
            
        }
        form{
            margin-left:2rem;
        }
        form div{
            /* text-align: center; */
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="main">
        <h2>Form Validation Using PHP</h2>
        <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"])  ?> " method="post" >
            <div>
                <label for="name">Name </label>
                <span class="error" style="color:red ;">* <?php echo $nameErr ?></span>
                <input type="text" name="name" id="name" value="<?php echo $name ?>" >
            </div>
            <div>
                <label for="dob">Date Of Birth </label>
                <span class="error" style="color:red ;">* <?php echo $dobErr ?></span>
                <input type="text" name="dob" id="dob" value="<?php echo $dob ?>">
            </div>
            <div>
                <label for="gender">Gender </label>
                <span class="error" style="color:red ;">* <?php echo $genderErr ?></span>
                Male<input type="radio" name="gender" id="gender" value="male" <?php if(isset($gender) && $gender=="male") echo "Checked" ; ?> >
                | Female<input type="radio" name="gender" id="gender" value="female" <?php if(isset($gender) && $gender=="female") echo "checked" ; ?> >
                | Others<input type="radio" name="gender" id="gender" value="other" <?php if(isset($gender) && $gender=="other" ) echo "checked";?> >
            </div>
            <div>
                <label for="email">Email </label>
                <span class="error" style="color:red ;">* <?php echo $emailErr ?></span>
                <input type="text" name="email" id="email" value="<?php echo $email ?>">
            </div>
            <div>
                <label for="number">Contact No. </label>
                <span class="error" style="color:red ;">* <?php echo $numberErr ?></span>
                <input type="text" name="number" id="number" value="<?php echo $number ?>" >
            </div>
            <div>
                <label for="state">State </label>
                <select name="state" id="state">
                    <option value="">Choose</option>
                    <option value="kashmir">Kashmir</option>
                    <option value="uttar pradesh">Uttar Pradesh</option>
                    <option value="madhya pradesh">Madhya Pradesh</option>
                    <option value="andhra pradesh">Andhra Pradesh</option>
                    <option value="Arunacahl pradesh">Arunachal Pradesh</option>
                    <option value="gujrat">Gujrat</option>
                    <option value="haryana">Haryana</option>
                </select>
            </div>
            <div>
                <label for="city">City </label>
                <select name="city" id="city" >
                    <option value="">Choose</option>
                    <option value="ahemdabaad">Ahemdabaad</option>
                    <option value="gandhinagar">Gandhinagar</option>
                    <option value="rajkot">Rajkot</option>
                </select>    
            </div>
            <div>
                <label for="address">Address </label>
                <input type="text" name="address" id="address" >
            </div>
            <div>
                <label for="skills">Skills </label>
                Java <input type="checkbox" name="skills[]" value="Java">
                Python <input type="checkbox" name="skills[]" value="Python">
                C++ <input type="checkbox" name="skills[]" value="C++">
                Kotlin <input type="checkbox" name="skills[]" value="Kotlin">
                Javascript <input type="checkbox" name="skills[]" id="skills" value="Javascript">
            </div>
            <div >
                <input type="submit" >
                <input type="reset" name='reset' >
            </div>
            
        </form>

    </div>

    <div class="main" style="background-color:white;">
        <?php 

        if(($nameErr && $emailErr && $numberErr && $dobErr && $genderErr) == "" && $name != "" ){
            echo "<h2>" . "User Data Successfully Validated" . "</h2>" ;
            echo "Name : $name<br>";
            echo "Date Of Birth : $dob<br>";
            echo "gender : $gender<br>";
            echo "email : $email<br>";
            echo "contact number : $number<br>";
            echo "state : $state<br>";
            echo "city : $city<br>";
            echo "address : $city<br>";
            print_r($skills);
        }
        ?>
    </div>

</body>
</html>
