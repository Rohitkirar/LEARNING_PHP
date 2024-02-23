<?php 
$nameErr = $emailErr = $websiteErr = $commentErr = $genderErr = "";

$name = $email = $gender = $website = $comment = "" ;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty($_POST['name']))
        $nameErr = "Name is Required";
    else  
        $name = test_input($_POST['name']);
    if(empty($_POST['email']))
        $emailErr = "Email is Required";
    else  
        $email = test_input($_POST['email']);
    if(empty($_POST['gender']))
        $genderErr = "Gender is Required";
    else  
        $gender = test_input($_POST['gender']);
    if(empty($_POST['web']))
        $websiteErr = "";
    else  
        $website = test_input($_POST['web']);
    if(empty($_POST['comment']))
        $commentErr = "";
    else  
        $comment = test_input($_POST['comment']);
}

function test_input($data){
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
    <title>Form</title>
    <link rel="stylesheet" href="../Public/form.css">
</head>

<body>
    <div class="mainformdiv">

        <h1 style="text-align: center;">User Details</h1>

        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">

            <div class="insideformdiv">
                <label for="name"> Name </label>
                <span class="error" style="color: red;">* <?php echo $nameErr ; ?></span> 
                <br>
                <input type="text" name="name" id="name" value="<?php echo $name; ?>" >
            </div>

            <div class="insideformdiv">
                <label for="email"> Email </label>
                <span class="error" style="color: red;">*<?php echo $emailErr ; ?></span> 
                <br>
                <input type="email" name="email" id="email" value="<?php echo $email; ?>" >
            </div>

            <div class="insideformdiv">
                <label for="web"> Website </label> 
                <span class="error"><?php echo $websiteErr ; ?></span>
                <br>
                <input type="url" name="web" id="web"  value="<?php echo $website; ?>">
            </div>

            <div class="insideformdiv">
                <label for="comment"> Comment </label> 
                <span class="error"><?php echo $commentErr ; ?></span>
                <br>
                <textarea name="comment" id="comment" cols="52" rows="3" style="resize: none; " ><?php echo $comment; ?></textarea>
            </div>

            <div class="insideformdiv">
                <label for="gender"> Gender </label>
                <span class="error" style="color: red;">* <?php echo $genderErr ; ?></span> 
                <br>
                Male <input type="radio" name="gender" id="gender" value="male" >
                <br>
                Female <input type="radio" name="gender" id="gender" value="female" >
                <br>
                Other <input type="radio" name="gender" id="gender" value="other" >
                <br>
            </div>

            <div class="insideformdiv">
                <input type="submit" id="submit" value="submit" style="width: 12.5rem;">
                <input type="reset" id="reset" value="reset" style="width: 12.5rem;">
            </div>
        </form>
    </div>
</body>
</html>