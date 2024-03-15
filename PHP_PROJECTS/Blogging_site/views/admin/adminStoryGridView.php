<?php
 
    $sql = "SELECT story.id as story_id , category.Title as category_title , story.title as story_title
    FROM category JOIN story 
    ON category.id = story.category_id 
    WHERE story.user_id = {$_SESSION['user_id']} AND story.deleted_at IS NULL 
    ";

    $result = mysqli_query($conn , $sql);

    $storyArray = mysqli_fetch_all($result , MYSQLI_ASSOC);


    foreach($storyArray as $key=>$values){
            echo "
            <div class='grid-item' >

                <h6 style='color:purple'>Title : {$values['story_title']} </h3><BR>

                <h6 style='color:purple'>Category : {$values['category_title']} </h3><BR>
                <div class='btn-group'>
                <button class='btn btn-primary'>
                    <a href='adminStoryView.php?story_id={$values['story_id']}' style='text-decoration:none;color:white;'>View</a>
                </button>

                <button id='updatebtn' class='btn btn-secondary'>
                    <a href='updateStoryForm.php?story_id={$values['story_id']}' style='text-decoration:none;color:white;'>Update Story</a>
                </button>

                <button id='deletebtn' class='btn btn-danger'>
                    <a href='deleteStory.php?story_id={$values['story_id']}' style='text-decoration:none; color:white;'>Delete Story</a>
                </button>
                </div>
            </div>";
    }
?>    