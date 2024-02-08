<?php 
namespace Validation ;
$name = $email = $number = $designation = "" ;

if(isset($_POST['submit'])){

include("validatedata.php") ;

if(validatedata()){
    echo "data successfully saved!<br>";
}else{
    echo "failed to saved data!<br>";
}

include("uploaddata.php");

if(uploaddata()){
    echo "Image uploaded successfully<br>";
}
else{
    echo " failed to upload data!<br>" ;
}


if(multipleuploaddata()){
    echo "documents uploaded successfully<br>";
}
else{
    echo " failed to upload data!<br>" ;
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Registration</title>
<style>
    body{
        margin : 0;
        background-color: silver;
    }
    .main{
        margin: 5% 25% 25% 25%;
        padding: 3rem;
        border : none;
        background-color: whitesmoke;
    }
    .inputbox{
        display: flex;
        flex-direction: column;
        margin : 1rem;
        font-size : large;
    }

</style>
</head>
<body>
<div class="main">

<h2 style="text-align:center; margin-bottom:2rem;">User Registration Form</h2>

<form action=" <?php echo $_SERVER["PHP_SELF"] ; ?> " method="post" enctype="multipart/form-data">

<div class="inputbox">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required>
</div>

<div class="inputbox">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
</div>

<div class="inputbox">
    <label for="number">Mobile</label>
    <input type="number" name="number" id="number" required>
</div>

<div class="inputbox">
    <label for="designation">Designation</label>
    <input type="text" name="designation" id="designation">
</div>

<div class="inputbox">
    <label for="myfile">Profile Image</label>
    <input type="file" name="file" id="myfile">
</div>

<div class="inputbox">
    <label for="myfiles">Documents</label>
    <input type="file" name="files[]" multiple id="myfiles">
</div>

<div class="inputbox">
    <div>
    <input type="submit" name="submit">
    <input type="reset" name="reset">
    </div>
</div>

</form>

</div>

<img height="100px" width="100px" src="<?php echo (count($GLOBALS['files']) > 0) ? array_shift($GLOBALS['files']) : "" ;?>" alt="">
<br>
<img height="100px" width="100px" src="<?php echo (count($GLOBALS['files']) > 0) ? array_shift($GLOBALS['files']) : "" ;?>" alt="">
<br>
<img height="100px" width="100px" src="<?php echo (count($GLOBALS['files']) > 0) ? array_shift($GLOBALS['files']) : "";?>" alt="">
<br>
<img height="100px" width="100px" src="<?php echo (count($GLOBALS['files']) > 0) ? array_shift($GLOBALS['files']) : "" ;?>" alt="">
<br>
<img height="100px" width="100px" src="<?php echo (count($GLOBALS['files']) > 0) ? array_shift($GLOBALS['files']) : "" ;?>" alt="">
<br>
<img height="100px" width="100px" src="<?php echo (count($GLOBALS['files']) > 0) ? array_shift($GLOBALS['files']) : "";?>" alt="">
</body>
</html>

