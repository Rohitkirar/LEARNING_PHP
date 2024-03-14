<?php 
session_start();
$user_count = $comment_count = $story_count = $like_count = 0;

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');

    $sql = "SELECT count(*) as user_count 
            FROM users 
            WHERE role = 'user' AND deleted_at IS NULL";

    $result = mysqli_query($conn , $sql);
    
    if($result){
        $resultArray = mysqli_fetch_assoc($result);
        $user_count = $resultArray['user_count'];
    }

    $sql = "SELECT count(*) as story_count 
            FROM story 
            WHERE user_id = {$_SESSION['user_id']} AND deleted_at IS NULL";

    $result = mysqli_query($conn , $sql);

    if($result){
        $resultArray = mysqli_fetch_assoc($result);
        $story_count = $resultArray['story_count'];
    }

    $sql = "SELECT count(*) as like_count 
            FROM likes 
            WHERE deleted_at IS NULL";
    
    $result = mysqli_query($conn , $sql);
    
    if($result){
        $resultArray = mysqli_fetch_assoc($result);
        $like_count = $resultArray['like_count'];
    }

    $sql = "SELECT count(*) as comment_count 
            FROM comments 
            WHERE  deleted_at IS NULL";
    
    $result = mysqli_query($conn , $sql);
    
    if($result){
        $resultArray = mysqli_fetch_assoc($result);
        $comment_count = $resultArray['comment_count'];
    }

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
    <link rel="stylesheet" href="../../public/css/admin.css">
</head>
<body>
    <!-- navbar file -->
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
            <span style="float:right"><a href="addstoryform.php"><button id="addstorybtn">Add Story</button></a></span>
        </div>
        <div class="grid-container">
                    
                    <?php 
                        require_once('adminStoryGridView.php');
                    ?>    
        </div>

    </main>
</body>
</html>

<!-- <?php print_r($_SESSION) ?> -->
