
    
    <?php 
        $sql = "SELECT image FROM storyimages WHERE story_id = {$values['story_id']} AND deleted_at IS NULL";
        $image = mysqli_query($conn ,$sql);
        if(mysqli_num_rows($image) > 0){
            $imageArray = mysqli_fetch_all($image , MYSQLI_ASSOC);
            foreach($imageArray as $key=> $path){
                echo "<div class='slide ' >
                        <img src='../../uploads/{$path['image']}' class='card' style='width:100%; height:100%;' alt='image not available'/>
                    </div>";
            }
        }
    ?>
    <?php if(mysqli_num_rows($image)>1){ ?>
        <span id="arrow-left" class="arrow btn btn-primary"  onclick="startslide()">prev</span>
        <span id="arrow-right"  class="arrow btn btn-primary" onclick="startslide()">next</span>
   <?php } ?>