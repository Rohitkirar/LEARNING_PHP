
    
    <?php 
    $imageArray = $image->imageDetails($values['story_id']);
    if($imageArray){
        foreach($imageArray as $key=> $path){
            echo "<div class='slide ' >
                    <img src='../../upload/{$path['image']}' class='card p-2' style='height:100% ; width:100%' alt='image not available'/>
                </div>";
        }
        if(count($imageArray)>1){ ?>
        <div class="d-flex " style="justify-content:center">
            <button id="arrow-left" class="arrow btn btn-primary m-1">prev</button>
            <button id="arrow-right"  class="arrow btn btn-primary m-1" >next</button>
        </div>
    <?php
        }
    }

    ?>
    