<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../class/connection.php');
    require_once('../../Class/User.php');
    require_once('../../Class/StoryCategory.php');
    $user = new User();
    $categoryobj = new StoryCategory();

    $title = $Error = '';
    $flag = false;

    if(isset($_POST['submit'])){

        $title = $_POST['category_title'];

        if(file_exists($_FILES['addimage']['tmp_name'])){
            
            $file = $_FILES['addimage'];

            $image = $file['name'];
            $file_type = $file['type'];
            $file_type = substr($file_type , 0 , strpos($file_type , '/'));
            $file_size = $file['size'];
            $file_error = $file['error'];
            $tmp_name = $file['tmp_name'];
            
            if(!$file_error){
                if($file_type == 'image'){

                    $fileDestination = '../../upload/'.$image;

                    move_uploaded_file($tmp_name , $fileDestination);
                    
                    $categoryArray = compact('title' , 'image');

                    if($categoryobj->addcategory($categoryArray)){
                        $Error = '';
                        $flag = true;
                    }
                    else{
                        $Error = 'Error Please try Again!';
                        $flag = false;
                    }
                }
                else{
                    $Error = "Please upload only image file!";
                }          
            }
            else{
                $Error = 'Error in file, Try to upload again';
            }
        }    
    }
    if($flag){
        $_SESSION['addcategorysuccess'] = true;
        header('location: categoryDetails.php');
    }
}
else{
    header('location: ../logout.php?LogoutSuccess=false');
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
    <!-- <link rel="stylesheet" href="../../public/css/style1.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- navbar file -->
    <?php require_once('adminnavbar.php') ?>
    
    <br><br>

    <div class="container p-5 shadow-lg mb-5 bg-white rounded" style="width: 40%; min-height:25rem">
        <h1>Add Category Details</h1>
        
        <hr>
        <p class="text-center" style="color:red"><?php echo $Error ?><p>

        <form onsubmit="return confirm('Do you really want to submit the form');" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <label class="form-label" for="title">Category Title: <span style="color:red">* </span></label>
                <input class="form-control" type='text' id="title" maxlength="20" name='category_title' value="<?php echo $title ?>"  required>
            </div>    
            <div class="form-outline mb-4">    
                <label class="form-label" >Add Image<span style="color:red">* </span></label>
                <input class="form-control" type="file" class="image" name="addimage"  required/>
            </div>
            
            <div class="card form-outline mb-4" style="border:none; background-color:transparent">
                <button class="btn btn-primary" type="submit" name='submit'>Submit</button>
            </div>

        </form>
    </div>
    <?php 
        require_once('../common/footer.php');
    ?>
</body>
</html>
 