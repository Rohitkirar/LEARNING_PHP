<?php 
session_start();
$user_id = $category_id = $content = $story_title = '';
if(isset($_SESSION['user_id'])){

    require_once('../database/connection.php');

    $sql = 'SELECT * FROM category';
    $result = mysqli_query($conn , $sql);
    $categoryArray = mysqli_fetch_all($result , MYSQLI_ASSOC);


    if(isset($_POST['submit'])){

        if(isset($_FILES['image'])){

            $category_id  = $_POST['category_id'];
            $story_title = addslashes($_POST['story_title']);
            $content = addslashes($_POST['content']);

            $user_id = $_SESSION['user_id'];

            $sql = "INSERT INTO story 
                        (user_id , category_id , title , content) 
                    VALUES
                        ('$user_id' , '$category_id', '$story_title' , '$content')";

            $result = mysqli_query($conn , $sql);
            if($result){
                echo "successfully inserted data";
            }
            else{
                echo "ERROR " . mysqli_error($conn);
            }
            
            $file = $_FILES['image'];
            $file_name = $file['name'];
            $file_size = $file['size'];
            $file_error = $file['error'];
            $tmp_name = $file['tmp_name'];
            $fileDestination = '../uploads/'.$file_name;
            move_uploaded_file($tmp_name , $fileDestination);

            $sql = "INSERT INTO images (story_id , image) VALUES ( (SELECT id FROM story order by id Desc LIMIT 1) , '$fileDestination')";

            $result = mysqli_query($conn , $sql);

            if($result){
                echo "successfully inserted data";
                $user_id = $category_id = $content = $story_title = '';
                mysqli_close($conn);
                header('location: Admin.php');
            }
            else{
                echo "ERROR " . mysqli_error($conn);
            }
        }
        else{
            echo "Error : FILE NOT Uploaded !";
        }
    }
}
else{
    session_unset();
    session_destroy();
    header('location: logout.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Story Form</title>
    <link rel="stylesheet" href="../public/css/addstoryform.css">
</head>
<body>
    <div class="container">
        <h1>Add Your Story</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >

            <label for="title">Category Title:</label>
            <select id="title" name='category_id'>
                <?php 
                    foreach($categoryArray as $key=>$values){
                            echo "<option value='". $categoryArray[$key]['id'] ."'>" . $categoryArray[$key]['Title'] . "</option>";
                    }
                ?>
            </select>
            <br><br>
            <label for="story_title">Story Title:</label>
            <input type="text" name='story_title' id='story_title' required />

            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="4" placeholder="Write your story here" required></textarea>

            <label for="image">Add Image</label>
            <input type="file" id="image" name="image" required >

            <button type="submit" name='submit'>Submit</button>
        </form>
    </div>
</body>
</html>


<!-- <?php print_r($categoryArray); ?> -->