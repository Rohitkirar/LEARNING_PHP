<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../class/connection.php');
    require_once('../../class/User.php');
    require_once('../../class/Story.php');
    require_once('../../class/StoryImage.php');
    require_once('../../class/StoryCategory.php');

    $user = new User();
    $story = new Story();
    $image = new StoryImage();
    $category = new StoryCategory();

    $userData = $user->userDetails($_SESSION['user_id']);

    if($userData[0]['role'] != 'admin')
        header('location: ../logout.php?logoutsuccess=false');
        
    $ERROR = $user_id = $category_id = $content = $story_title = '' ;
    $flag = false;

    $categoryArray = $category->categoryDetails();

    if(isset($_POST['submit'])){

        $story_id = $_POST['submit'];

        if($_POST['status'] == 0){
            header("location: deleteStory.php?story_id=$story_id");
        }
        else{

            $result = $story->updateStory($story_id , $_POST);

            if($result){
                $ERROR = '';
                if(isset($_FILES['image']) && !empty($_FILES['image']['name'][0])){
                    $file = $_FILES['image'];
                    for($i=0 ; $i < count($file['name']) ;$i++){
                        $file_name = $file['name'][$i];
                        $file_type = $file['type'][$i];
                        $file_type = substr($file_type , 0 , strpos($file_type , '/'));
                        $file_size = $file['size'][$i];
                        $file_error = $file['error'][$i];
                        $tmp_name = $file['tmp_name'][$i];
                        if($file_error == 0){
                            if($file_type == 'image'){
                                
                                $ERROR = $filenameErr = '';
                                $fileDestination = '../../upload/'.$file_name;
                                
                                move_uploaded_file($tmp_name , $fileDestination);
        
                                $result = $image->addImage($story_id , $file_name );
        
                                if($result)
                                    continue;
                                else
                                    $ERROR  = "Failed to upload image";  
                            }
                            else
                                $ERROR =  "Invalid file type, Upload Image type only!";
                            
                        }
                        else
                            $ERROR =  'File not uploaded';
                    }
                }
            }
            else
                $ERROR = 'failed to update story!';

        
            if($ERROR == ''){
                $_SESSION['updatestory'] = true;
                header("location: adminStoryView.php?story_id=$story_id");
            }
        }    
    }
}
else
    header('location: ../logout.php?logoutsuccess=false');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Story Form</title>
    <!-- <link rel="stylesheet" href="../../public/css/style1.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- navbar file -->
    <?php require_once('adminnavbar.php') ?>
    
    <br><br>

    <div class="container p-5 shadow-lg p-3 mb-5 bg-white rounded" style="width:45%">
        <div class="text-center">
            <p >
                <img src="../../upload/snapchat.png" alt="logo" style="width:10%">
                <span style="font-size:x-large">ɮʟօɢ</span>
            </p>
            <h4 class="mt-1 pb-1">Update Story</h4>
            <center class="mb-3" style="color : red;"><?php echo $ERROR ?></center>
        </div>
        
        <form onsubmit="return confirm('Do you really want to update the story')" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >

            <?php
                if(isset($_GET['story_id'])) 
                    $story_id = $_GET['story_id'];
                
                $resultArray = $story->storyDetails($story_id); 
            ?>
            <div class="form-outline mb-4">
            <label class="form-label" for="category_title">Category Title:</label>
            <select id="category_title" name='category_id' >
                <?php 
                    foreach($categoryArray as $key=>$values){
                            echo "<option value='". $categoryArray[$key]['id'] ."'>" . $categoryArray[$key]['Title'] . "</option>";
                    }
                ?>
            </select>
            </div>
            
            <div class="form-outline mb-4">
            <label class="form-label" for="title">Story Title:</label>
            <input class="form-control" type="text" name='title' id='title' value="<?php echo $resultArray[0]['story_title'];?>" required />
            </div>
            
            <div class="form-outline mb-4">
            <label class="form-label" for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="10" required ><?php echo $resultArray[0]['story_content'];?></textarea>
            </div>
            
            <div class="container mb-4" style="display:grid; grid-template-columns: auto auto;">
                <?php
                    
                    $imageArray = $image->imageDetails($story_id);
                    if($imageArray)
                        foreach($imageArray as $key=>$path){
                            
                            echo 
                                "<div class='card p-2 m-2 '   >
                                    <img src='../../upload/{$path['image']}' alt='image Not uploaded'/>
                                    <a href=\"deleteImage.php?story_id={$resultArray[0]['story_id']}&image_id={$path['id']}\" class='btn btn-danger mt-2'>Delete</a>
                                </div>";
                        }
                ?>
            </div>

            <div class="form-outline mb-4">
            <label class="form-label" for="image">Add Image</label>
            <input class="form-control" type="file" id="image" name="image[]" multiple />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">Story Status:</label><br>
                <input type="radio" name="status" value="1" checked>Active<br>
                <input type="radio" name="status" value="0">Hide<br>
            </div>
            
            <div class="form-label" class="form-outline mb-4">
                <button class="form-control btn btn-primary" style="width:100%" type="submit" name='submit' value="<?php echo $resultArray[0]['story_id'] ?>">Submit</button>
            </div>
        </form>
    </div>
<?php 
    require_once('../footer.php');
  ?>
</body>
</html>


