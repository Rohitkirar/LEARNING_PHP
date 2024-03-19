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

            $category_id  = $_POST['submit'];

            $category_title = $_POST['category_title'];


            print_r($_FILES['addimage']);

            if($_FILES['addimage']['error']){
                $file_name = $_POST['addimage'];
            }
            else{
                $file = $_FILES['addimage'];

                $file_name = $file['name'];
                $file_size = $file['size'];
                $file_error = $file['error'];
                $tmp_name = $file['tmp_name'];
                
                $fileDestination = '../../uploads/'.$file_name;

                move_uploaded_file($tmp_name , $fileDestination);
            }

            $sql = "UPDATE storycategory 
                    SET title = '$category_title' , image = '$file_name' , deleted_at=DEFAULT
                    WHERE id = $category_id ";

            $result = mysqli_query($conn , $sql);

            if($result){

                if($_POST['status'] == 0)
                    header("location: categoryDetails.php");

                elseif($_POST['status'])
                    header("location: deleteCategory.php?category_id=$category_id");

            }
            else
                echo "ERROR " . mysqli_error($conn);
                       
        }
    }
    else{
        session_unset();
        session_destroy();
        header('location: ../common/logout.php');
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
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- navbar file -->
    <?php require_once('adminnavbar.php') ?>
    
    <br><br>

    <div class="container p-5 shadow-lg p-3 mb-5 bg-white rounded">
        <h1>Update Category Details</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

            <?php 
                if(isset($_GET['category_id'])){
                    $category_id = $_GET['category_id'];
                }
                else{
                    $category_id='';
                }
                $sql = "SELECT id as category_id , Title , image 
                        FROM storycategory 
                        WHERE id = $category_id";
                
                $result = mysqli_query($conn , $sql);
                
                if(mysqli_num_rows($result) > 0){
                    $resultArray = mysqli_fetch_assoc($result);
                }
            ?>

            <label for="title">Category Title:</label>
            <input type='text' id="title" maxlength="20" value="<?php echo $resultArray['Title'] ?>" name='category_title' >
            
            <label >Category Delete:</label>
            <br>
            Yes <input type='radio' class="status"  value="1" name='status' >
            <br>
            No <input type='radio' class="status"  value="0" name='status' checked>

            <br><br>
            <?php 
                if(!empty($resultArray['image'])){
                echo "
                <div class='card m-2'>
                    <img src=\"../../uploads/{$resultArray['image']}\" alt='image Not uploaded'/>
                    <a href=\"deleteCategoryImage.php?category_id={$resultArray['category_id']}\" class='btn btn-danger m-3'>Delete Image</a>
                </div>";
                }
            ?>
            <label >Add Image</label>
            <input type="file" class="image" name="addimage"  value="" />

            <input type="hidden" class="image" name="addimage"  value="<?php echo $resultArray['image']?>" />

            <button type="submit" name='submit' value="<?php echo $resultArray['category_id'] ?>">Submit</button>
        </form>
    </div>
</body>
</html>


