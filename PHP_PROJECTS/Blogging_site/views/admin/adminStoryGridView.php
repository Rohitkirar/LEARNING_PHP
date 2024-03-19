<?php
 
    $sql = "SELECT story.id as story_id , storycategory.Title as category_title , story.title as story_title, storyimages.image
    FROM storycategory JOIN story 
    ON storycategory.id = story.category_id 
    JOIN storyimages ON story.id = storyimages.story_id
    WHERE story.user_id = {$_SESSION['user_id']} AND story.deleted_at IS NULL AND storycategory.deleted_at IS NULL AND storyimages.deleted_at IS NULL
    GROUP BY story_id";

    $result = mysqli_query($conn , $sql);

    $storyArray = mysqli_fetch_all($result , MYSQLI_ASSOC);

    echo "<div style=' display:grid; grid-template-columns:auto auto auto;' >";

    foreach($storyArray as $key=>$values){
            echo "
            <div class='grid-item text-center m-2 mb-5 p-3 pt-5 shadow-lg bg-white rounded'  >
                <img src='../../uploads/{$values['image']}' style='height: 40%; width:40%; margin-bottom:1rem;'/>
                
                <h6 style='color:purple ; margin-bottom:1rem;'>Title : {$values['story_title']} </h3>

                <h6 style='color:purple ; margin-bottom:1rem;'>Category : {$values['category_title']} </h3>
                
                <div class='btn-group m-2'>

                    <a href='adminStoryView.php?story_id={$values['story_id']}' class='btn btn-primary'>View</a>

                    <a href='updateStoryForm.php?story_id={$values['story_id']}' class='btn btn-secondary' >Update Story</a>

                    <a href='deleteStory.php?story_id={$values['story_id']}' onclick=\"return confirm('Do you want to delete the story')\" class='btn btn-danger'>Delete Story</a>
                
                </div>

            </div>";
    }
    echo "</div>"
?>    