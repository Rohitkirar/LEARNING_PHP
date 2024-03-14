<?php 
session_start();
$user_count = $comment_count = $story_count = $like_count = 0;
$comment = $commentErr  = '';

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
    
    // retrieving story data from database

    $sql = "SELECT story.id as story_id , category.Title as category_title , story.title as story_title , content , image
        FROM category JOIN story 
        ON category.id = story.category_id  AND story.id = {$_GET['story_id']}
        LEFT JOIN images
        ON story.id = images.story_id
        WHERE story.deleted_at IS NULL ";
    $result = mysqli_query($conn , $sql);
    $storyArray = mysqli_fetch_all($result , MYSQLI_ASSOC);


    $result = mysqli_query($conn , $sql);
    $storyArray = mysqli_fetch_all($result , MYSQLI_ASSOC);

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
            <?php 
                foreach($storyArray as $key=>$values){
                    echo "<form action='{$_SERVER["PHP_SELF"]}.?story_id={$_GET['story_id']}' method='POST'>
                    <div class='story_inner_div_items'>

                        <h3 style='color:purple'>Title :  {$values['story_title']} </h3><BR>

                        <h3 style='color:purple'>Category : {$values['category_title']} </h3><BR>

                        <img src='{$values['image']}' style='width:100%; height:50%;' alt='image not found'/>
                        
                        <BR>

                        <p>{$values['content']}<p>

                        <BR>

                        <button  style='margin-right:1rem;'>
                            <a href='like.php?story_id={$values['story_id']}' style='text-decoration:none; color:black'>Like</a>
                        </button>


                        <span class='like-button'>
                        <input type='text' name='comment'>
                        <button type='submit' name='comment_btn' value='{$values['story_id']}' >comment</button></span>
                        
                        <span style='color : red; margin-right:1rem;'>$commentErr</span>";

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

                    echo "</div>";
                    echo "</form>";   
                }        
            ?>
        </div>
        
    </main>
</body>
</html>

