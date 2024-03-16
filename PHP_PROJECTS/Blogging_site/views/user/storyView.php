<?php 
session_start();
$user_count = $comment_count = $story_count = $like_count = 0;
$comment = $commentErr  = '';

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
    
    // retrieving story data from database

    $sql = "SELECT story.id as story_id , category.Title as category_title , story.title as story_title , content
        FROM category JOIN story 
        ON category.id = story.category_id  AND story.id = {$_GET['story_id']}
        WHERE story.deleted_at IS NULL AND category.deleted_at IS NULL ";

    $result = mysqli_query($conn , $sql);
    $values = mysqli_fetch_assoc($result);


    // comment add and delete operation file

    require_once('comment.php');
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
    <link rel="stylesheet" href="style.css">
    <title>User Page</title>
    <link rel="stylesheet" href="../../public/css/user.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <style>
        .story_inner_div_items{
            padding : 5%;
        }
        #deletecommentbtn{
            padding: 1px;
            float:right ; 
            background-color:red; 
            border :none;
        }
    </style>
</head>
<body>
    <!--  navbar file -->

    <?php require_once('navbar.php'); ?>
    
    <main>
        <h2>Story</h2>
        <div class="story_inner_div">
     
            <form action='<?php echo "{$_SERVER["PHP_SELF"]}.?story_id={$_GET['story_id']}" ?>' method='POST'>
                <div class='story_inner_div_items'>
                    
                    <div>
                        <h3 style='color:purple'>Title :  <?php echo $values['story_title'] ?>  </h3><BR>
                        <h3 style='color:purple'>Category : <?php echo $values['category_title'] ?> </h3><BR>
                    </div>
                    
                    <div>
                        <?php 
                        $sql = "SELECT image FROM images WHERE story_id = {$values['story_id']} AND deleted_at IS NULL";
                        $image = mysqli_query($conn ,$sql);
                        if(mysqli_num_rows($image) > 0){
                            $imageArray = mysqli_fetch_all($image , MYSQLI_ASSOC);
                            foreach($imageArray as $key=> $path){
                                echo "<img src='../../uploads/{$path['image']}' style='width:100%; height:100%;' alt='image not available'/><BR><BR>";
                            }
                        }
                        ?>
                    </div>
                    
                    <p><?php echo $values['content'] ?><p>

                    <div class="container m-4">
                    <a class="btn btn-primary" href='like.php?story_id=<?php echo $values['story_id'] ?>' >Like</a>


                    <span>
                    <input type='text' name='comment'>
                    <button type='submit' class="btn btn-success" name='comment_btn' value='<?php echo $values['story_id'] ?>' >comment</button>
                    </span>
                    
                    <span style='color : red; margin-right:1rem;'><?php $commentErr ?></span>

                    <?php 
                        $sql = "SELECT count(*) as 'like_count' 
                                FROM likes 
                                WHERE story_id = {$values['story_id']}
                                AND deleted_at IS NULL";
                        
                        $result = mysqli_query($conn , $sql);

                        $resultArray = mysqli_fetch_assoc($result);

                        echo "<span style='margin-right:1rem;'>Total like : {$resultArray['like_count']}</span>";
                        
                        $sql = "SELECT count(*) as 'comment_count' 
                                FROM comments 
                                WHERE story_id = {$values['story_id']}
                                AND deleted_at IS NULL";
                        
                        $result = mysqli_query($conn , $sql);

                        $resultArray = mysqli_fetch_assoc($result);

                        echo "<span style='margin-right:1rem;'>Total comment : {$resultArray['comment_count']}</span>";
                        
                        echo"</div>";

                        $sql = "SELECT comments.id as comment_id , user_id , story_id , content , CONCAT(first_name , ' ' , last_name) as full_name 
                                FROM comments
                                JOIN users 
                                ON users.id = user_id 
                                WHERE story_id = '{$values['story_id']}' AND comments.deleted_at IS NULL";

                        $result = mysqli_query($conn ,$sql);

                        $resultArray = mysqli_fetch_all($result , MYSQLI_ASSOC);

                        echo "<h5>Comments</h5><hr>";
                        
                        foreach($resultArray as $key => $values){

                            echo "<p>{$values['full_name']}</p>";
                            echo "<span>{$values['content']}</span>";

                            if($values['user_id'] == $_SESSION['user_id']){
                                echo "
                                <button id='deletecommentbtn'>
                                    <a href='deleteComment.php?comment_id={$values['comment_id']}&story_id={$values['story_id']}' style='text-decoration:none; color:black;margin:20px;'>Delete</a>
                                </button>";
                            }
                            echo "<hr style='color:grey'>";
                        }
                    ?>
                </div>
            </form>          
        </div>
        
    </main>
</body>
</html>

