<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
    
    require_once('../common/userDetailsVerify.php');

    $userData = userVerification($_SESSION['user_id'] , $conn);

    if($userData['role'] == 'admin'){
        
        $user_id = $category_id = $content = $story_title = '' ;
        $flag = false;

        $sql = 'SELECT * FROM storycategory';
        $result = mysqli_query($conn , $sql);
        $categoryArray = mysqli_fetch_all($result , MYSQLI_ASSOC);


        if(isset($_POST['submit'])){

            $category_id  = $_POST['category_id'];
            $story_title = addslashes($_POST['story_title']);
            $content = addslashes($_POST['content']);

            $user_id = $_SESSION['user_id'];
            $story_id = $_POST['submit'];

            $sql = "UPDATE story 
                    SET category_id = $category_id , title = '$story_title' , content = '$content' 
                    WHERE story.id = $story_id AND user_id = $user_id" ;

            $result = mysqli_query($conn , $sql);

            if($result){
                echo "successfully updated story data";
                $flag = true;
            }
            else{
                echo "ERROR " . mysqli_error($conn);
                $flag = false;
            }

            if(file_exists($_FILES['addimage']['tmp_name'][0])){

                $file = $_FILES['addimage'];

                if(is_array($file['name'])){
                
                    for($i=0 ; $i< count($file['name']) ;$i++){

                        $file_name = $file['name'][$i];
                        $file_size = $file['size'][$i];
                        $file_error = $file['error'][$i];
                        $tmp_name = $file['tmp_name'][$i];

                        if($file_error == 0){
                            $fileDestination = '../../uploads/'.$file_name;
                            move_uploaded_file($tmp_name , $fileDestination);

                            $sql = "INSERT INTO storyimages (story_id , image)
                                    VALUES ($story_id , '$file_name')"; 

                            $result = mysqli_query($conn , $sql);

                            if($result){
                                echo "successfully inserted data";
                                $flag = true;
                            }
                            else{
                                echo "ERROR " . mysqli_error($conn);
                                $flag = false;
                            }
                        }
                        else{
                            echo "error in file ;";
                            $flag = false;
                        }
                    }
                }
                else{
                    $file_name = $file['name'];
                    $file_size = $file['size'];
                    $file_error = $file['error'];
                    $tmp_name = $file['tmp_name'];

                    if($file_error == 0){
                        $fileDestination = '../../uploads/'.$file_name;
                        move_uploaded_file($tmp_name , $fileDestination);

                        $sql = "INSERT INTO storyimages (story_id , image)
                        VALUES ($story_id , '$file_name')";

                        $result = mysqli_query($conn , $sql);

                        if($result){
                            echo "successfully image inserted data";
                            $flag = true;
                        }
                        else{
                            echo "ERROR " . mysqli_error($conn);
                            $flag = false;
                        }
                    }
                    else{
                        echo "error in file ;";
                        $flag = false;
                    }
                }
            }
        }
        if($flag){
            header("location: adminStoryView.php?story_id=$story_id");
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
        <h1>Update Story</h1>
        <form onsubmit="return confirm('Do you really want to update the story')" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >

            <?php 
                $story_id = $_GET['story_id'];
                
                $sql = "SELECT id as story_id , Title , content 
                        FROM story 
                        WHERE story.id = $story_id";
                
                $result = mysqli_query($conn , $sql);
                $resultArray = mysqli_fetch_assoc($result); 
            ?>

            <label for="title">Category Title:</label>
            <select id="title" name='category_id' >
                <?php 
                    foreach($categoryArray as $key=>$values){
                            echo "<option value='". $categoryArray[$key]['id'] ."'>" . $categoryArray[$key]['Title'] . "</option>";
                    }
                ?>
            </select>
            <br><br>
            <label for="story_title">Story Title:</label>
            <input type="text" name='story_title' id='story_title' value="<?php echo $resultArray['Title'];?>" required />

            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="10" required ><?php echo $resultArray['content'];?></textarea>
            
            <div class="m-4">
                <?php
                    $sql = "SELECT id as image_id , image FROM storyimages WHERE story_id = $story_id AND deleted_at IS NULL";
                    $image = mysqli_query($conn , $sql);
                    $imageArray = mysqli_fetch_all($image , MYSQLI_ASSOC);
                    echo "<div class='grid-container'>";
                    foreach($imageArray as $key=>$path){
                        
                        echo "<div class='card m-2 ' >
                            <img src='../../uploads/{$path['image']}' alt='image Not uploaded'/>
                            <a href=\"deleteImage.php?story_id={$resultArray['story_id']}&image_id={$path['image_id']}\" class='btn btn-danger m-3'>Delete Image</a>
                            </div>";
                    }
                    echo "</div>";
                ?>
            </div>

            <label for="image">Add Image</label>
            <input type="file" id="image" name="addimage[]" multiple value='' />

            <button type="submit" name='submit' value="<?php echo $resultArray['story_id'] ?>">Submit</button>
        </form>
    </div>
</body>
</html>


<!-- <?php print_r($categoryArray); ?> -->