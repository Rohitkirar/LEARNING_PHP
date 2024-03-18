<?php 
$user_count = $comment_count = $story_count = $like_count = 0;

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
        FROM storylikes 
        WHERE deleted_at IS NULL";

$result = mysqli_query($conn , $sql);

if($result){
    $resultArray = mysqli_fetch_assoc($result);
    $like_count = $resultArray['like_count'];
}

$sql = "SELECT count(*) as comment_count 
        FROM storycomments 
        WHERE  deleted_at IS NULL";

$result = mysqli_query($conn , $sql);

if($result){
    $resultArray = mysqli_fetch_assoc($result);
    $comment_count = $resultArray['comment_count'];
}
?>