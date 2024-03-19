<?php 
        
    // retrieving story data from database

    $sql = "SELECT story.id as story_id , storycategory.Title as category_title , story.title as story_title , content , storyimages.image
            FROM storycategory JOIN story 
            ON storycategory.id = story.category_id
            JOIN storyimages ON story.id = storyimages.story_id
            WHERE storyimages.deleted_at IS NULL 
            AND story.deleted_at IS NULL AND storycategory.deleted_at IS NULL 
            GROUP BY story_id";

    $result = mysqli_query($conn , $sql);
    $storyArray = mysqli_fetch_all($result , MYSQLI_ASSOC);
    
    foreach($storyArray as $key=>$values){
            echo '<div class="grid-item text-center m-2 mb-5 p-3 pt-5 shadow-lg bg-white rounded">';
            
            echo "<img src='../../uploads/{$values['image']}' style='height: 40%; width:40%; margin-bottom:1rem;'/>";
            
            echo "<h6 style='color:purple'>Title : " . $values['story_title'] . "</h3>";

            echo "<h6 style='color:purple'>Category : " . $values['category_title'] . "</h3>";
            
            echo "<a class='container btn btn-primary' href='storyView.php?story_id={$values['story_id']}'>View</a>"; 

            echo '</div>';
    }
?>