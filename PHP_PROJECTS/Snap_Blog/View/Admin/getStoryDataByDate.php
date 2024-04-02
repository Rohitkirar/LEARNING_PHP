<?php
require_once("../../Class/Connection.php"); 
require_once("../../Class/User.php"); 
require_once("../../Class/Story.php");
require_once("../../Class/StoryImage.php");

$story = new Story();
$image = new StoryImage();

if(isset($_GET['start_date'])  && isset($_GET['end_date'])){
    $storyArray = $story->getStoryDataInRange($_GET['start_date'], $_GET['end_date'] );
    if($storyArray){
        for($i = 0 ; $i< count($storyArray); $i++){
            $storyArray[$i]['image'] = $image->imageDetails($storyArray[$i]['story_id']);
        }
    }

}

    
echo json_encode($storyArray);

?>