<?php 
        
    // retrieving story data from database

    $sql = "SELECT story.id as story_id , category.Title as category_title , story.title as story_title , content 
            FROM category JOIN story 
            ON category.id = story.category_id 
            AND deleted_at IS NULL ";

    $result = mysqli_query($conn , $sql);
    $storyArray = mysqli_fetch_all($result , MYSQLI_ASSOC);
    
    foreach($storyArray as $key=>$values){
            echo '<div class="grid-item">';

            echo "<h6 style='color:purple'>Title : " . $values['story_title'] . "</h3><BR>";

            echo "<h6 style='color:purple'>Category : " . $values['category_title'] . "</h3><BR>";
            
            echo "<a href='storyView.php?story_id={$values['story_id']}'><button>View</button></a>"; 

            echo '</div>';
    }
?>