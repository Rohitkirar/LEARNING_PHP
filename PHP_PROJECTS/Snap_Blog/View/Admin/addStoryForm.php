<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../class/connection.php');
    require_once('../../Class/User.php');
    require_once('../../Class/StoryCategory.php');
    require_once('../../Class/Story.php');
    require_once('../../Class/StoryImage.php');
    
    $user = new User();
    $story = new Story();
    $categoryobj = new StoryCategory();
    $imageobj = new StoryImage();

    $userData = $user->userDetails($_SESSION['user_id']);

    if($userData[0]['role'] == 'admin'){

        $ERROR = $user_id = $category_id = $content = $story_title = '';

        $categoryArray = $categoryobj->categoryDetails();

        if(isset($_POST['submit'])){

            // story data inserting in database;

            $category_id  = $_POST['category_id'];
            $title = addslashes($_POST['story_title']);
            $content = addslashes($_POST['content']);

            $user_id = $_SESSION['user_id'];

            $storyArray = compact('user_id' , 'category_id' , 'title' , 'content');

            $result = $story->addStory($storyArray) ;

            if($result){
                echo "successfully inserted data";
            }
            else{
                $ERROR = "Failed to insert Data";
            }


            if(isset($_FILES['image'])){

                $story_id = $story->getLastStoryId();
                $story_id = $story_id['story_id'];

                $file = $_FILES['image'];
                
                for($i=0 ; $i< count($file['name']) ;$i++){

                    $file_name = $file['name'][$i];
                    $file_type = $file['type'][$i];
                    $file_type = substr($file_type , 0 , strpos($file_type , '/'));
                    $file_size = $file['size'][$i];
                    $file_error = $file['error'][$i];
                    $tmp_name = $file['tmp_name'][$i];

                    if($file_error == 0){
                        echo $file_type;
                        if($file_type == 'image'){
                            
                            $ERROR = '';

                            $filenameErr = '';

                            $fileDestination = '../../upload/'.$file_name;
                            
                            move_uploaded_file($tmp_name , $fileDestination);

                            $result = $imageobj->addImage($story_id , $file_name );

                            if($result)
                                echo "successfully inserted data";
                            else
                                $ERROR  = "Failed to upload image";  
                        }
                        else{
                            $ERROR =  "Invalid file type, Upload Image type only!";
                        }
                    }
                    else
                        $ERROR =  'error :file not uploaded';
                }
            }
            if($ERROR == ''){
                $_SESSION['addstory'] = true; 
                header('location: admin.php');
            }
        }
    }
    else{
        session_unset();
        session_destroy();
        header('location: ../common/logout.php?LogoutSuccess=true');
    }    
}
else{
    session_unset();
    session_destroy();
    header('location: ../common/logout.php?LogoutSuccess=true');
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
    
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100 d-flex justify-content-center align-items-center">
            <div class="card rounded-3 text-black" style="width:55%">

                <div class="card-body p-md-5 mx-md-4">

                    <div class="text-center">
                        <p >
                            <img src="../../upload/snapchat.png" alt="logo" style="width:15%">
                            <span style="font-size:x-large">ɮʟօɢ</span>
                        </p>
                        
                    </div>

                    <center><p>Fill Details to Add Story</p></center>
                    <center><p><?php echo $ERROR ?></p></center>

                    <form onsubmit="return confirm('Do you really want to submit the form?');" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >                        
                        
                        <div class="form-outline mb-4">
                            <label class="form-label"  for="title">Category Title:<span style="color:red">* </span></label>
                            <select class="form-control" id="title" name='category_id'>
                                <?php 
                                    foreach($categoryArray as $key=>$values){
                                            echo "<option value='". $categoryArray[$key]['id'] ."'>" . $categoryArray[$key]['Title'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="story_title">Story Title: <span style="color:red">* </span></label>
                            <input class="form-control" type="text" name='story_title' id='story_title' required />    
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="content">Content: <span style="color:red">* </span></label>
                            <textarea class="form-control" id="content" name="content" rows="4" placeholder="Write your story here" required></textarea>   
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="image">Add Image <span style="color:red">* </span></label>
                            <input class="form-control" type="file" id="image" name="image[]" multiple required >  
                        </div>

                        <div class="text-center pt-1 mb-5 pb-1">
                            <button type="submit" class="btn btn-primary mb-3" name="submit" style="width: 100%;" >Add Story</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php 
    require_once('../footer.php');
  ?>
</body>
</html>
