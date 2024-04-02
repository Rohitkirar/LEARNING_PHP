<?php
session_start();


if (isset($_SESSION['user_id'])) {
  require_once('../../Class/Connection.php');
  require_once('../../Class/User.php');
  require_once('../../Class/Story.php');
  require_once('../../Class/StoryLike.php');
  require_once('../../Class/StoryComment.php');
  require_once('../../Class/StoryImage.php');
  $user = new User();
  $story = new Story();
  $like = new StoryLike();
  $comment = new StoryComment();
  $image = new StoryImage();

  $storyArray = $story->storyDetails();

  // condition for admin excess only 

  $userResult = $user->userDetails($_SESSION['user_id']);
  if ($userResult) {

    if ($userResult[0]['role'] != 'admin')
      header('location: ../logout.php?logoutsuccess=false');
  }
} else {
  header('location: ../logout.php?logoutsuccess=false');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Home</title>
</head>

<body>
  <!-- navbar file add -->
  <?php require_once('adminnavbar.php') ?>


  <main role="main">
    <div class="" style="display:grid ; grid-template-columns:65% 35%">

      <div class="d-flex " id="countDiv" style=" align-items:center ; justify-content: space-between; height:3rem">
        <?php
        $story_count = $storyArray;
        if ($story_count)
          $story_count = count($story_count);
        else
          $story_count = 0;

        $like_count = $like->likeDetails();
        if ($like_count)
          $like_count = count($like_count);
        else
          $like_count = 0;

        $comment_count = $comment->commentDetails();
        if ($comment_count)
          $comment_count = count($comment_count);
        else
          $comment_count = 0;

        $user_count = $user->userDetails();
        if ($user_count)
          $user_count = count($user_count);
        else
          $user_count = 0;
        ?>
        <div class="shadow-lg p-2 bg-white" id="totalstorycount" style="width:25%;">Total story: <span id="story_count">
            <?php echo $story_count ?>
          </span></div>
        <div class="shadow-lg p-2 bg-white" id="totallikecount" style="width:25% ">Likes: <span id="like_count">
            <?php echo $like_count ?>
          </span></div>
        <div class="shadow-lg p-2 bg-white" id="totalcommentcount" style="width:25%">Comments: <span id="comment_count">
            <?php echo $comment_count ?>
          </span></div>
        <div class="shadow-lg p-2 bg-white" id="totalusercount" style="width:25%">Total Users: <span id="user_count">
            <?php echo $user_count ?>
          </span>
        </div>

      </div>
      <div class="d-flex shadow-lg bg-white p-1" style="height:2.75rem">
        <label class="form-label p-1" for="startrange">Date</label>
        <input class="form-control" id="startrange" type="date" />
        <label class="form-label p-1" for="endrange">To</label>
        <input class="form-control" id="endrange" type="date" />
        <button class="btn btn-primary" id="filterdatabtn" style="color :white ;">Filter</button>
      </div>
    </div>


    <div class="album py-2 bg-light">
      <h3>Latest Story</h3>

      <div class="container" id="storydivhide"  >

        <div class="" style="display : grid ; grid-template-columns:25% 25% 25% 25%; ">
          <?php

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
                <div class="btn-group mb-2" >
                  <a href="adminstoryView.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-primary">View</a>
                  <a href="updateStoryForm.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                  <a href="deleteStory.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>
  </main>


<?php
  require_once('../footer.php');

  if (isset($_SESSION['addstory'])) {
    unset($_SESSION['addstory']);
    echo "<script> alert('Story added successfull!') </script>";
  } elseif (isset($_SESSION['storydelete'])) {
    unset($_SESSION['storydelete']);
    echo "<script>alert('story deleted successfully!')</script>";
  }
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../../public/js/adminpage.js"></script>
  
</body>

</html>