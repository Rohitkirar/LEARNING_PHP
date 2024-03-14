<?php
 
    $sql = "SELECT story.id as story_id , category.Title as category_title , story.title as story_title , image
    FROM category JOIN story 
    ON category.id = story.category_id 
    LEFT JOIN images
    ON story.id = images.story_id
    WHERE story.user_id = {$_SESSION['user_id']} AND story.deleted_at IS NULL 
    ";

    $result = mysqli_query($conn , $sql);

    $storyArray = mysqli_fetch_all($result , MYSQLI_ASSOC);


    foreach($storyArray as $key=>$values){
            echo "
            <div class='grid-item' >

                <h6 style='color:purple'>Title : {$values['story_title']} </h3><BR>

                <h6 style='color:purple'>Category : {$values['category_title']} </h3><BR>
                
                <button>
                    <a href='adminStoryView.php?story_id={$values['story_id']}' style='text-decoration:none;color:black;'>View</a>
                </button>

                <button id='updatebtn'>
                    <a href='updateStoryForm.php?story_id={$values['story_id']}' style='text-decoration:none;color:black;'>Update Story</a>
                </button>

                <button id='deletebtn'>
                    <a href='deleteStory.php?story_id={$values['story_id']}' style='text-decoration:none;color:black;'>Delete Story</a>
                </button>
            
            </div>";
    }
?>    