<?php
require_once('../../Class/Connection.php');
require_once('../../Class/Story.php');
require_once('../../Class/StoryImage.php');

$story = new Story();
$image = new StoryImage();
// $str1 = json_encode($story->totalCountInRange($_GET['startrange'] , $_GET['endrange']));
if ($_GET['startrange'] != ''  && $_GET['endrange'] != '')
    $storyArray = $story->getStoryDataInRange($_GET['startrange'], $_GET['endrange']);
else
    $storyArray = $story->storyDetails();

?>

    <?php
    if($storyArray){
    foreach ($storyArray as $key => $values) {
    ?>
        <div class="m-3 shadow-lg card">
            <div class="box-shadow ">
                <?php
                $imageArray = $image->imageDetails($values['story_id']);
                if ($imageArray) {
                ?>
                    <img class="card-img-top" style="height:10rem ; object-fit:fill;" src="../../Upload/<?php echo $imageArray[0]['image'] ?>" alt="image not found">
                <?php } ?>

            </div>
            <div class=" m-2 text-center">
                <div class="card-body" style="min-height:6rem ; text-align:justify">
                    <h6 style="font-size:12px">Category :
                        <?php echo $values['category_title'] ?>
                    </h6>
                    <h6 style="font-size:12px">Title :
                        <?php echo $values['story_title'] ?>
                    </h6>
                </div>
                <div class="btn-group mb-2">
                    <a href="adminstoryView.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-primary">View</a>
                    <a href="updateStoryForm.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                    <a href="deleteStory.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                </div>
            </div>
        </div>
    <?php } } else echo "<br><br><h4>No Story Found</h4>"?>
