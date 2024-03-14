<?php 
session_start();
$user_count = $comment_count = $story_count = $like_count = 0;
$comment = $commentErr  = '';
if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');


    
    // like data storing functionalites
    if(isset($_POST['like_btn'])){

        $story_id = $_POST['like_btn'];
        
        $sql = "INSERT INTO likes 
                    (user_id , story_id )
                VALUES
                    ('{$_SESSION['user_id']}' , '{$story_id}')";

        $result = mysqli_query($conn , $sql);

        if($result)
            echo 'liked successfully';
        else
            echo "ERROR " . mysqli_error($conn);
        
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
    <title>User Page</title>
    <link rel="stylesheet" href="../../public/css/user.css">

</head>
<body>

    
    <?php require_once('navbar.php'); ?>
    
    <main>
        <span><strong style="font-size:x-large;">ALL Stories</strong></span>
        
        <div class="grid-container">
            
            <?php require_once('storyGridView.php') ?>

        </div>

    </main>

</body>
</html>


<!-- 
        <div class="cards">
            <div class="card">Total story: <?php echo $story_count ?></div>
            <div class="card">Likes: <?php echo $like_count ?></div>
            <div class="card">Comments: <?php echo $comment_count ?></div>
            <div class="card">Total Users: <?php echo $user_count ?></div>
        </div>
<div class="post">
            <h2>Title : </h2>
            <p>This is the content of the post.</p>
            
        </div>

        <div class="comments">
            <h3>Comments</h3>
            <div class="comment">
            <p><strong>User1:</strong> Great post!</p>
        </div>
        <div class="comment">
            <p><strong>User2:</strong> I agree!</p>
        </div>
        </div>

        <div class="story">
            <h3>Story</h3>
            <p>This is a user story.</p>
        </div>

 -->