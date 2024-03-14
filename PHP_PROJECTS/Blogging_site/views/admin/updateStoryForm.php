<?php 
session_start();
$user_id = $category_id = $content = $story_title = '';

if(isset($_SESSION['user_id'])){
    require_once('../../database/connection.php');

    $sql = 'SELECT * FROM category';
    $result = mysqli_query($conn , $sql);
    $categoryArray = mysqli_fetch_all($result , MYSQLI_ASSOC);


    if(isset($_POST['submit'])){

        if(isset($_FILES['image'])){

            $category_id  = $_POST['category_id'];
            $story_title = addslashes($_POST['story_title']);
            $content = addslashes($_POST['content']);

            $user_id = $_SESSION['user_id'];
            $story_id = $_POST['submit'];

            echo ($story_id);


        
            $file = $_FILES['image'];

            if(is_array($file['name'])){
            
                for($i=0 ; $i< count($file['name']) ;$i++){

                    $file_name = $file['name'][$i];
                    $file_size = $file['size'][$i];
                    $file_error = $file['error'][$i];
                    $tmp_name = $file['tmp_name'][$i];

                    if($file_error == 0){
                        $fileDestination = '../../uploads/'.$file_name;
                        move_uploaded_file($tmp_name , $fileDestination);

                        $sql = "UPDATE story JOIN images ON story.id = images.story_id 
                            SET category_id = $category_id , title = '$story_title' , content = '$content' , image = '$fileDestination' 
                            WHERE story.id = $story_id AND user_id = $user_id" ;

                        $result = mysqli_query($conn , $sql);

                        if($result)
                            echo "successfully inserted data";
                        else
                            echo "ERROR " . mysqli_error($conn);
                    }
                    else
                        echo "error in file ;";
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

                    $sql = "UPDATE story JOIN images ON story.id = images.story_id 
                            SET category_id = $category_id , title = '$story_title' , content = '$content' , image = '$fileDestination' 
                            WHERE story.id = $story_id AND user_id = $user_id" ;

                    $result = mysqli_query($conn , $sql);

                    if($result)
                        echo "successfully inserted data";
                    else
                        echo "ERROR " . mysqli_error($conn);
                }
                else
                    echo "error in file ;";
            }
        }
        else{
            echo "error: FIle not uploaded";
        }

        header('location: admin.php');
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
    <link rel="stylesheet" href="../../public/css/admin.css">
</head>
<body>
    <!-- navbar file -->
    <?php require_once('adminnavbar.php') ?>
    
    <br><br>

    <div class="container">
        <h1>Update Story</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >

            <?php 
                $story_id = $_GET['story_id'];
                
                $sql = "SELECT story_id , Title , content , image 
                        FROM story LEFT JOIN images 
                        ON story.id = images.story_id 
                        WHERE story_id = $story_id";
                
                $result = mysqli_query($conn , $sql);
                $resultArray = mysqli_fetch_assoc($result ); 
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
            <textarea id="content" name="content" rows="4" required ><?php echo $resultArray['content'];?></textarea>

            <label for="image">Add Image</label>
            <input type="file" id="image" name="image[]" multiple required />

            <button type="submit" name='submit' value="<?php echo $_GET['story_id']?>">Submit</button>
        </form>
    </div>
</body>
</html>


<!-- <?php print_r($categoryArray); ?> -->