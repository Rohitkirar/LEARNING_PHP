<?php
 
    $sql = "SELECT story.id as story_id , storycategory.Title as category_title , story.title as story_title, storyimages.image
    FROM storycategory JOIN story 
    ON storycategory.id = story.category_id 
    LEFT JOIN storyimages ON story.id = storyimages.story_id
    WHERE story.user_id = {$_SESSION['user_id']} AND story.deleted_at IS NULL AND storycategory.deleted_at IS NULL AND storyimages.deleted_at IS NULL
    GROUP BY story_id ORDER BY story_id DESC";

    $result = mysqli_query($conn , $sql);

    $storyArray = mysqli_fetch_all($result , MYSQLI_ASSOC);

?>


    <?php foreach($storyArray as $key=>$values){ ?>
    
            <div class='grid-item text-center pt-2 shadow-lg bg-white rounded'  >
                
                <img src="../../uploads/<?php echo $values["image"] ?>" style="height: 40%; width:40%; margin-bottom:1rem;"/>
                
                <h6 style="color:purple ; ">Title : <?php echo $values["story_title"] ?> </h3>

                <h6 style="color:purple ; ">Category : <?php echo $values["category_title"] ?> </h3>
                
                <div class="btn-group " >

                    <a href="adminStoryView.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-primary">View</a>

                    <a href="updateStoryForm.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-secondary" >Update</a>

                    <a href="deleteStory.php?story_id=<?php echo $values['story_id'] ?>"  onclick="return confirm('Do you want to delete the story')" class="btn btn-danger">Delete</a>
                
                </div>

            </div>
    <?php } ?>