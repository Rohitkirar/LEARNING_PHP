<?php

    require_once('../../Class/Connection.php');
    require_once('../../Class/Story.php');

    $story = new Story();

    $countArray = $story->totalCountInRange($_GET['startrange'] , $_GET['endrange']);
    
    $story_count = $countArray['story_count'];
    $like_count = $countArray['like_count'];
    $user_count = $countArray['user_count'];
    $comment_count = $countArray['comment_count'];   


?>

<div class="shadow-lg p-2 bg-white" style="width:25%;">Total story: <span id="story_count">
        <?php echo $story_count ?>
    </span></div>
<div class="shadow-lg p-2 bg-white" style="width:25% ">Likes: <span id="like_count">
        <?php echo $like_count ?>
    </span></div>
<div class="shadow-lg p-2 bg-white" style="width:25%">Comments: <span id="comment_count">
        <?php echo $comment_count ?>
    </span></div>
<div class="shadow-lg p-2 bg-white" style="width:25%">Total Users: <span id="user_count">
        <?php echo $user_count ?>
    </span>
</div>

