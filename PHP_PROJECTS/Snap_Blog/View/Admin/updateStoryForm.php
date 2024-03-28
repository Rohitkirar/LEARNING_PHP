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
        
    $user_id = $category_id = $content = $story_title = '' ;
    $flag = false;

    $categoryArray = $category->categoryDetails();

    if(isset($_POST['submit'])){

        $category_id  = $_POST['category_id'];
        $title = addslashes($_POST['story_title']);
        $content = addslashes($_POST['content']);

        $story_id = $_POST['submit'];
        $storyArray = compact('category_id' , 'title' , 'content');

        $result = $story->updateStory($story_id , $storyArray);

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
                        $fileDestination = '../../upload/'.$file_name;
                        move_uploaded_file($tmp_name , $fileDestination);

                        $result =  $image->addImage($story_id , $file_name);

                        if($result)
                            $flag = true;
                        
                        else
                            $flag = false;
                    }
                    else
                        $flag = false;
                }
            }
            else{
                $file_name = $file['name'];
                $file_size = $file['size'];
                $file_error = $file['error'];
                $tmp_name = $file['tmp_name'];

                if($file_error == 0){
                    $fileDestination = '../../upload/'.$file_name;
                    move_uploaded_file($tmp_name , $fileDestination);

                    $result =  $image->addImage($story_id , $file_name);

                    if($result)
                        $flag = true;
                    
                    else
                        $flag = false;
                    
                }
                else
                    $flag = false;
                
            }
        }
    }
    if($flag)
        header("location: adminStoryView.php?story_id=$story_id");
    
}
else
    header('location: ../common/logout.php?LogoutSuccess=true');

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
            <h4 class="mt-1 mb-5 pb-1">Update Story</h4>
        </div>
        
        <form onsubmit="return confirm('Do you really want to update the story')" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >

            <?php 
                $story_id = $_GET['story_id'];
                
                $resultArray = $story->storyDetails($story_id); 
            ?>
            <div class="form-outline mb-4">
            <label class="form-label" for="title">Category Title:</label>
            <select id="title" name='category_id' >
                <?php 
                    foreach($categoryArray as $key=>$values){
                            echo "<option value='". $categoryArray[$key]['id'] ."'>" . $categoryArray[$key]['Title'] . "</option>";
                    }
                ?>
            </select>
            </div>
            
            <div class="form-outline mb-4">
            <label class="form-label" for="story_title">Story Title:</label>
            <input class="form-control" type="text" name='story_title' id='story_title' value="<?php echo $resultArray[0]['story_title'];?>" required />
            </div>
            
            <div class="form-outline mb-4">
            <label class="form-label" for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="10" required ><?php echo $resultArray[0]['story_content'];?></textarea>
            </div>
            
            <div class="container mb-4" style="display:grid; grid-template-columns: auto auto;">
                <?php
                    
                    $imageArray = $image->imageDetails($story_id);
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
            <input class="form-control" type="file" id="image" name="addimage[]" multiple value='' />
            </div>
            
            <div class="form-label" class="form-outline mb-4">
            <button class="form-control btn btn-primary" style="width:100%" type="submit" name='submit' value="<?php echo $resultArray[0]['story_id'] ?>">Submit</button>
            </div>
        </form>
    </div>

</body>
</html>


