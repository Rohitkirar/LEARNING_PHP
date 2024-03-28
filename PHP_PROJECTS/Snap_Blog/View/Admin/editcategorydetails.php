<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../Class/Connection.php');
    require_once('../../Class/User.php');
    require_once('../../Class/StoryCategory.php');
    
    $user = new User();
    $categoryobj = new StoryCategory();

    $userData = $user->userDetails($_SESSION['user_id']);

    if($userData[0]['role'] != 'admin'){
        header('location: ../logout.php?logoutsuccess=false');
    }

    $id  = $title = '' ;
    $flag = false;

    if(isset($_POST['submit'])){

        $category_id  = $_POST['submit'];

        $title = $_POST['category_title'];

        if($_FILES['addimage']['error']){
            $image = $_POST['addimage2'];
        }
        else{
            $file = $_FILES['addimage'];

            $image = $file['name'];
            $file_size = $file['size'];
            $file_error = $file['error'];
            $tmp_name = $file['tmp_name'];
            
            $fileDestination = '../../upload/'.$image;

            move_uploaded_file($tmp_name , $fileDestination);
        }

        $categoryArray = compact( 'title' , 'image');

        $result = $categoryobj->updateCategory($category_id , $categoryArray);

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
    


    <div class="container p-5 shadow-lg p-3 mt-5 bg-white rounded" style="width:50%">
        <div class="text-center">
            <p >
                <img src="../../upload/snapchat.png" alt="logo" style="width:10%">
                <span style="font-size:x-large">ɮʟօɢ</span>
            </p>
            <h4 class="mt-1 mb-5 pb-1">Update Category Details</h4>
        </div>
        <hr>
        <form onsubmit="confirm('please confirm to update the details')" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

            <?php 
                if(isset($_GET['category_id']))
                    $category_id = $_GET['category_id'];
                else
                    $category_id='';
                
                $resultArray = $categoryobj->categoryDetails($category_id);
                
            ?>

            <div class="form-outline mb-4">
                <label class="form-label" for="title">Category Title:</label>
                <input class="form-control" type='text' id="title" maxlength="20" value="<?php echo $resultArray[0]['Title'] ?>" name='category_title' >
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" >Category Delete:</label>
                Yes <input  type='radio' class="status"  value="1" name='status' >
                No <input  type='radio' class="status"  value="0" name='status' checked>
            </div>

            <div class="mb-4 d-flex" style="width:50%; height:50%">
                <?php 
                    if(!empty($resultArray[0]['image'])){
                    echo "
                    <div class='card m-2'>
                        <img  src=\"../../upload/{$resultArray[0]['image']}\" alt='image Not uploaded'/>
                        <a href=\"deleteCategoryImage.php?category_id={$resultArray[0]['id']}\" class='btn btn-danger m-3'>Delete Image</a>
                    </div>";
                    }
                ?>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" >Add Image</label>
                <input class="form-control" type="file" class="image" name="addimage" />

                <input type="hidden" class="image" name="addimage2"  value="<?php echo $resultArray[0]['image']?>" />
            </div>

            <div class="form-outline mb-4">
                <button class="btn btn-primary" style="width: 100%;" type="submit" name='submit' value="<?php echo $resultArray[0]['id'] ?>">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>


