<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
    
    require_once('../common/userDetailsVerify.php');

    $userData = userVerification($_SESSION['user_id'] , $conn);

    if($userData['role'] == 'admin'){

        $user_id = $category_id = $content = $story_title = '';

        $sql = 'SELECT * FROM storycategory';

        $result = mysqli_query($conn , $sql);
        $categoryArray = mysqli_fetch_all($result , MYSQLI_ASSOC);


        if(isset($_POST['submit'])){

            // story data inserting in database;

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


            if(isset($_FILES['image'])){
                
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
                            
                            $filenameErr = '';

                            $fileDestination = '../../uploads/'.$file_name;
                            
                            move_uploaded_file($tmp_name , $fileDestination);

                            $sql = "INSERT INTO storyimages (story_id , image) VALUES ( (SELECT id FROM story order by id Desc LIMIT 1) , '$file_name')";

                            $result = mysqli_query($conn , $sql);

                            if($result)
                                echo "successfully inserted data";
                            else
                                echo "ERROR " . mysqli_error($conn);  
                        }
                        else{
                            Echo "ERROR : Invalid file type, Upload Image type only!";
                        }
                    }
                    else
                        echo 'error :file not uploaded';
                }
            }
                
            header('location: admin.php');
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
    
    <br><br>

    <div class="container p-5 shadow-lg p-3 mb-5 bg-white rounded" style="width:50%;">
        <h1>Add Your Story</h1>
        <hr>
        <form onsubmit="return confirm('Do you really want to submit the form?');" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >

            <label for="title">Category Title:<span style="color:red">* </span></label>
            <select id="title" name='category_id'>
                <?php 
                    foreach($categoryArray as $key=>$values){
                            echo "<option value='". $categoryArray[$key]['id'] ."'>" . $categoryArray[$key]['Title'] . "</option>";
                    }
                ?>
            </select>
            <br><br>
            <label for="story_title">Story Title: <span style="color:red">* </span></label>
            <input type="text" name='story_title' id='story_title' required />

            <label for="content">Content: <span style="color:red">* </span></label>
            <textarea id="content" name="content" rows="4" placeholder="Write your story here" required></textarea>
            
            <br><br>

            <label for="image">Add Image <span style="color:red">* </span></label>
            <input type="file" id="image" name="image[]" multiple required >
            <hr>
            <div class="card" style="border:none; background-color:transparent">
                <button type="submit" name='submit'>Submit</button>
            </div>
        </form>
    </div>
    <?php 
        require_once('../common/footer.php');
    ?>
</body>
</html>


<!-- <?php print_r($categoryArray); ?> -->