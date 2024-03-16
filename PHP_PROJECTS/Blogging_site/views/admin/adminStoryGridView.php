<style>
    .grid-item{
        background-image: url('../../uploads/7042259.jpg');
        
    }
</style>
<?php

 
    $sql = "SELECT story.id as story_id , category.Title as category_title , story.title as story_title
    FROM category JOIN story 
    ON category.id = story.category_id 
    WHERE story.user_id = {$_SESSION['user_id']} AND story.deleted_at IS NULL AND category.deleted_at IS NULL
    ";

    $result = mysqli_query($conn , $sql);

    $storyArray = mysqli_fetch_all($result , MYSQLI_ASSOC);

    echo "<div style=' display:grid; grid-template-columns:auto auto auto;' >";

    foreach($storyArray as $key=>$values){
            echo "
            <div class='grid-item' >
                
                <h6 style='color:purple'>Title : {$values['story_title']} </h3><BR>

                <h6 style='color:purple'>Category : {$values['category_title']} </h3><BR>
                
                <div class='btn-group'>

                    <a href='adminStoryView.php?story_id={$values['story_id']}' class='btn btn-primary'>View</a>

                    <a href='updateStoryForm.php?story_id={$values['story_id']}' class='btn btn-secondary' >Update Story</a>

                    <a href='deleteStory.php?story_id={$values['story_id']}' class='btn btn-danger'>Delete Story</a>
                
                </div>

            </div>";
    }
    echo "</div>"
?>    