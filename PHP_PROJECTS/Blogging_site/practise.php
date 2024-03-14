<?php 

$user_id = $category_id = $content = $story_title = '';


require_once('database/connection.php');

$sql = 'SELECT * FROM category';
$result = mysqli_query($conn , $sql);
$categoryArray = mysqli_fetch_all($result , MYSQLI_ASSOC);


if(isset($_POST['submit'])){

    if(isset($_FILES['image'])){

        $category_id  = $_POST['category_id'];
        $story_title = addslashes($_POST['story_title']);
        $content = addslashes($_POST['content']);

        $user_id = 9;
        $story_id = $_POST['submit'];
        
        echo ($story_id);
        echo ($_GET['story_id']);
        $file = $_FILES['image'];
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $tmp_name = $file['tmp_name'];
        $fileDestination = '../../uploads/'.$file_name;
        move_uploaded_file($tmp_name , $fileDestination);

        $sql = "UPDATE story JOIN images ON story.id = images.story_id 
                SET story.Title = '$story_title' , image = '$fileDestination' , story.content = '$content' 
                WHERE story_id = $story_id";
                

        $result = mysqli_query($conn , $sql);
        if($result){
            echo "successfully updated data";
            header('location: views/admin/adminstoryView.php');
        }
        else{
            echo "ERROR " . mysqli_error($conn);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Story Form</title>
    <link rel="stylesheet" href="public/css/addstoryform.css">
</head>
<body>
    <div class="container">
        <h1>Update Story</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >

            <?php 
                $story_id = $_GET['story_id'];
                $sql = "SELECT story_id , Title , content , image FROM story JOIN images ON story.id = images.story_id WHERE story_id = $story_id";
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
            <input type="file" id="image" name="image" value="<?php echo $resultArray['image'] ;?>" required >

            <button type="submit" name='submit' value="<?php echo $_GET['story_id']?>">Submit</button>
        </form>
    </div>
</body>
</html>


<!-- <?php print_r($categoryArray); ?> -->