<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
    
    require_once('../common/userDetailsVerify.php');

    $userData = userVerification($_SESSION['user_id'] , $conn);

    if($userData['role'] == 'admin'){

        $category_id  = $category_title = '' ;
        $flag = false;

        if(isset($_POST['submit'])){

            $category_title = $_POST['category_title'];

            if(file_exists($_FILES['addimage']['tmp_name'])){
                
                $file = $_FILES['addimage'];

                $file_name = $file['name'];
                $file_size = $file['size'];
                $file_error = $file['error'];
                $tmp_name = $file['tmp_name'];
                
                if(!$file_error){

                    $fileDestination = '../../uploads/'.$file_name;

                    move_uploaded_file($tmp_name , $fileDestination);

                    $sql = "INSERT INTO storycategory (title , image) 
                    VALUES ('$category_title' , '$file_name')";

                    $result = mysqli_query($conn , $sql);

                    if($result){
                        $flag = true;
                    }
                    else{
                        echo "ERROR " . mysqli_error($conn);
                        $flag = false;
                    }          
                }
                else{
                    echo "error in file";
                }
            }    
        }
    }
    else{
        session_unset();
        session_destroy();
        header('location: ../common/logout.php');
    }
    
    if($flag){
        header('location: categoryDetails.php');
    }
}
else{
    session_unset();
    session_destroy();
    header('location: ../common/logout.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Story Form</title>
    <link rel="stylesheet" href="../../public/css/addstoryform.css">
    <link rel="stylesheet" href="../../public/css/admin1.css">
    <link rel="stylesheet" href="../../public/css/style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- navbar file -->
    <?php require_once('adminnavbar.php') ?>
    
    <br><br>

    <div class="container" style="width: 50%; height:30%">
        <h1>Add Category Details</h1>
        
        <hr>

        <form onsubmit="return confirm('Do you really want to submit the form');" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <br>
            <label for="title">Category Title: <span style="color:red">* </span></label>
            <input type='text' id="title" maxlength="20" name='category_title'  required>
            <br>    
            <label >Add Image<span style="color:red">* </span></label>
            <input type="file" class="image" name="addimage"  required/>
            <br><br>
            <hr>
            <div class="card" style="border:none; background-color:transparent">
                <button type="submit" name='submit'>Submit</button>
            </div>

        </form>
    </div>
</body>
</html>
 