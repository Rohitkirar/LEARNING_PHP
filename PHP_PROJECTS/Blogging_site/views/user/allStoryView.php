<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
            
    require_once('../common/userDetailsVerify.php');
    
    $userData = userVerification($_SESSION['user_id'] , $conn);

    $user_count = $comment_count = $story_count = $like_count = 0;
    $comment = $commentErr  = '';

    // retrieving story data from database

    $sql = "SELECT story.id as story_id , storycategory.Title as category_title , story.title as story_title , content 
        FROM storycategory JOIN story 
        ON storycategory.id = story.category_id 
        WHERE story.deleted_at IS NULL AND storycategory.deleted_at IS NULL";

    $result = mysqli_query($conn , $sql);
    $storyArray = mysqli_fetch_all($result , MYSQLI_ASSOC);

    // comment add and delete operation file

    require_once('comment.php');
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
    <link rel="stylesheet" href="style.css">
    <title>User Page</title>
    <link rel="stylesheet" href="../../public/css/user.css">
    <!-- <link rel="stylesheet" href="../../public/css/style1.css"> -->
    
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
        .story_inner_div_items{
            display: flex; 
            padding : 10px;

        }
    </style>
</head>
<body>
    <!--  navbar file -->

    <?php require_once('navbar.php'); ?>
    
    <main style="background-color: whitesmoke;">
        <h4 class="p-2">All Story</h4>
        <div class="story_inner_div">
            <?php 
                foreach($storyArray as $key=>$values){
                    echo "
                    <form action='{$_SERVER["PHP_SELF"]}' method='POST'>
                        
                        <div class='story_inner_div_items mb-5 p-5 bg-white' >
                            
                            <div class='m-2' style='width:55%; text-align:justify'>
                                
                                <div>
                                    <h3 style='color:purple'>Title :  {$values['story_title']}  </h3><BR>
                                    <h3 style='color:purple'>Category : {$values['category_title']}  </h3><BR>
                                </div>
                        
                                <div>";
                                    $sql = "SELECT image FROM storyimages WHERE story_id = {$values['story_id']} AND deleted_at IS NULL";
                                    $image = mysqli_query($conn ,$sql);
                                    if(mysqli_num_rows($image) > 0){
                                        $imageArray = mysqli_fetch_all($image , MYSQLI_ASSOC);
                                        foreach($imageArray as $key=> $path){
                                            echo "<img src='../../uploads/{$path['image']}'  style='margin:2px 2px 4px 0;  width:100%; height:100%;' alt='image not available'/>";
                                        }
                                    }

                                    echo "
                                </div>

                                <div>
                                    <p>{$values['content']}<p>
                                </div>
                                <div class='container m-3'>
                                    
                                    <a class='btn btn-primary' href='like.php?story_id={$values['story_id']}' >Like</a>
        
                                    <span class='like-button'>
                                        <input type='text' name='comment'>
                                        <button class='btn btn-success' type='submit' name='comment_btn' value='{$values['story_id']}' >comment</button>
                                    </span>
                                    
                                    <span style='color : red; margin-right:1rem;'>$commentErr</span>";
                                    
                                    $sql = "SELECT count(*) as 'like_count' 
                                            FROM storylikes 
                                            WHERE story_id = {$values['story_id']}
                                            AND deleted_at IS NULL";
                                    
                                    $result = mysqli_query($conn , $sql);

                                    $resultArray = mysqli_fetch_assoc($result);

                                    echo "<span style='margin-right:1rem;'>Total like : {$resultArray['like_count']}</span>";
                                    
                                    $sql = "SELECT count(*) as 'comment_count' 
                                            FROM storycomments 
                                            WHERE story_id = {$values['story_id']}
                                            AND deleted_at IS NULL";
                                    
                                    $result = mysqli_query($conn , $sql);

                                    $resultArray = mysqli_fetch_assoc($result);

                                    echo "<span style='margin-right:1rem;'>Total comment : {$resultArray['comment_count']}</span>
                                </div>
                            </div>

                            <div class='p-4' style='width :45%; font-size:12px ; background-color:whitesmoke ;'>";

                                $sql = "SELECT storycomments.id as comment_id , user_id , story_id , content , CONCAT(first_name , ' ' , last_name) as full_name 
                                        FROM storycomments
                                        JOIN users 
                                        ON users.id = user_id 
                                        WHERE story_id = '{$values['story_id']}' AND storycomments.deleted_at IS NULL";

                                $result = mysqli_query($conn ,$sql);

                                $resultArray = mysqli_fetch_all($result , MYSQLI_ASSOC);

                                echo "<h5>Comments</h5><hr>";
                                
                                foreach($resultArray as $key => $values){
                                    
                                    echo "
                                    <div class='container'>
                                        <p>{$values['full_name']}</p>
                                        <div style='display:flex; justify-content:space-between;' ><span>{$values['content']}</span>";

                                        if($values['user_id'] == $_SESSION['user_id']){
                                            echo "<a class='btn btn-danger'  href='deleteComment.php?comment_id={$values['comment_id']}&story_id={$values['story_id']}' >Delete</a>";
                                        }
                                        echo "</div><hr style='color:grey'>";
                                    echo "
                                    </div>";
                                }
                            echo "
                            </div>

                        </div>
                    </form>";   
                }        
            ?>
        </div>
        
    </main>
</body>
</html>

