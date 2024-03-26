<?php
 
    $storyArray =  $story->storyDetails();


?>


    <?php foreach($storyArray as $key=>$values){ ?>
    
            <div class='grid-item text-center pt-2 shadow-lg bg-white rounded'  >
                
                <?php $imageArray = $image->imageDetails($values['story_id']) ?>
                
                <img src="../../upload/<?php echo $imageArray[0]["image"] ?>" style="height: 40%; width:40%; margin-bottom:1rem;"/>
                
                <h6 style="color:purple ; ">Title : <?php echo $values["story_title"] ?> </h3>

                <h6 style="color:purple ; ">Category : <?php echo $values["category_title"] ?> </h3>
                
                <div class="btn-group " >

                    <a href="adminStoryView.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-primary">View</a>

                    <a href="updateStoryForm.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-secondary" >Update</a>

                    <a href="deleteStory.php?story_id=<?php echo $values['story_id'] ?>"  onclick="return confirm('Do you want to delete the story')" class="btn btn-danger">Delete</a>
                
                </div>

            </div>
    <?php } ?>