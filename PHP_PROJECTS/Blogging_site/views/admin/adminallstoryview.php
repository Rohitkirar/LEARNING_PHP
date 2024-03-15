<?php 
session_start();


if(isset($_SESSION['user_id'])  && $_SESSION['role'] == 'admin'){

    $user_count = $comment_count = $story_count = $like_count = 0;
    
    require_once('../../database/connection.php');

    // total user count

    $sql = "SELECT count(*) as user_count 
            FROM users 
            WHERE role = 'user' AND deleted_at IS NULL";

    $result = mysqli_query($conn , $sql);
    
    if($result){
        $resultArray = mysqli_fetch_assoc($result);
        $user_count = $resultArray['user_count'];
    }

    // total story count

    $sql = "SELECT count(*) as story_count 
            FROM story 
            WHERE user_id = {$_SESSION['user_id']} AND deleted_at IS NULL";

    $result = mysqli_query($conn , $sql);

    if($result){
        $resultArray = mysqli_fetch_assoc($result);
        $story_count = $resultArray['story_count'];
    }

    // total like count

    $sql = "SELECT count(*) as like_count 
            FROM likes 
            WHERE  deleted_at IS NULL";
    
    $result = mysqli_query($conn , $sql);
    
    if($result){
        $resultArray = mysqli_fetch_assoc($result);
        $like_count = $resultArray['like_count'];
    }

    //total comment count

    $sql = "SELECT count(*) as comment_count 
            FROM comments 
            WHERE  deleted_at IS NULL";
    
    $result = mysqli_query($conn , $sql);
    
    if($result){
        $resultArray = mysqli_fetch_assoc($result);
        $comment_count = $resultArray['comment_count'];
    }


    $sql = "SELECT story.id as story_id , category.Title as category_title , story.title as story_title , content 
            FROM category JOIN story 
            ON category.id = story.category_id 
            WHERE story.user_id = {$_SESSION['user_id']} AND story.deleted_at IS NULL; 
            ";

    $result = mysqli_query($conn , $sql);
    
    $storyArray = mysqli_fetch_all($result , MYSQLI_ASSOC);




    // style="background-color:transparent; color:white"
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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../public/css/adminstoryView.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- navbar file add -->
    <?php require_once('adminnavbar.php') ?>
    
    <main>

        <div class="cards">
            <div class="card">Total story: <?php echo $story_count ?></div>
            <div class="card">Likes: <?php echo $like_count ?></div>
            <div class="card">Comments: <?php echo $comment_count ?></div>
            <div class="card">Total Users: <?php echo $user_count ?></div>
        </div>

        <br>

        <div>
            <span><strong style="font-size:x-large;">ALL Stories</strong></span>
            <span style="float:right" ><a href="addstoryform.php"><button id="addstorybtn">Add Story</button></a></span>
        </div>

        <div class="story_inner_div">
            <?php  
                foreach($storyArray as $key=>$values){

                    echo "<form action='{$_SERVER["PHP_SELF"]}' method='POST'>

                        <div class='story_inner_div_items card container-md ' style='width: 90%;'>

                        <div class='postnavdiv'>

                            <div>
                             <h3 style='color:purple'>Title :  {$values['story_title']}  </h3><BR>
                             <h3 style='color:purple'>Category : {$values['category_title']} </h3><BR>
                            </div>

                            <div style='margin : 0 auto'>

                                <button id='updatebtn' class='btn btn-primary'>
                                    <a href='updateStoryForm.php?story_id={$values['story_id']}' style='text-decoration:none;color:white;'>Update Story</a>
                                </button>

                                <button id='deletebtn' class='btn btn-danger'>
                                    <a href='deleteStory.php?story_id={$values['story_id']}' style='text-decoration:none;color:white;'>Delete Story</a>
                                </button>

                            </div>

                        </div>

                        <div>";
                            $sql = "SELECT image FROM images WHERE story_id = {$values['story_id']} AND deleted_at IS NULL";
                            $image = mysqli_query($conn ,$sql);
                            if(mysqli_num_rows($image) > 0){
                                $imageArray = mysqli_fetch_all($image , MYSQLI_ASSOC);
                                foreach($imageArray as $key=> $path){
                                    echo "<img src='../../uploads/{$path['image']}' class='card-img-top' style='width:100%; height:100%;' alt='image not available'/><BR><BR>";
                                }
                            }
                            echo "
                        </div>
                        
                        <div>
                            {$values['content']}
                        </div>

                        <div>";
                            
                            $sql = "SELECT count(*) as 'like_count' 
                                        FROM likes 
                                        WHERE story_id = {$values['story_id']}
                                        AND deleted_at IS NULL";
                                
                            $result = mysqli_query($conn , $sql);

                            $resultArray = mysqli_fetch_assoc($result);

                        echo "<span> | Total like : {$resultArray['like_count']} | </span>";
                            
                            $sql = "SELECT count(*) as 'comment_count' 
                                    FROM comments 
                                    WHERE story_id = {$values['story_id']}
                                    AND deleted_at IS NULL";
                            
                            $result = mysqli_query($conn , $sql);

                            $resultArray = mysqli_fetch_assoc($result);

                            echo "<span>Total comment : {$resultArray['comment_count']}</span>";
                            
                            $sql = "SELECT comments.id as comment_id , user_id , story_id , content , CONCAT(first_name , ' ' , last_name) as full_name 
                                        FROM comments
                                        JOIN users 
                                        ON users.id = user_id 
                                        WHERE story_id={$values['story_id']} AND comments.deleted_at IS NULL";

                            $result = mysqli_query($conn ,$sql);

                            $resultArray = mysqli_fetch_all($result , MYSQLI_ASSOC);

                            echo "<h5>Comments</h5><hr>";
                            
                            foreach($resultArray as $key => $values){

                                echo "
                                    <p>{$values['full_name']}</p>

                                    <p>{$values['content']}</p>

                                    <button  class='btn btn-danger'>
                                        <a href='deleteComment.php?deletecommentid={$values['comment_id']}&story_id={$values['story_id']}' style='text-decoration:none; color:white;'>Delete comment</a>
                                    </button>

                                    <hr>";
                            }
                echo "
                    </div>
                    </div>
                    </form>" ;
                }

            ?>
        </div>

    </main>
</body>
</html>

<!-- <?php print_r($_SESSION) ?> -->
