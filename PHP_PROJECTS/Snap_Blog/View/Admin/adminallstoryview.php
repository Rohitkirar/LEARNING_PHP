<?php
session_start();

if (isset($_SESSION['user_id'])) {

  require_once("../../Class/Connection.php");
  require_once("../../Class/User.php");
  require_once("../../Class/Story.php");
  require_once("../../Class/StoryImage.php");
  require_once("../../Class/StoryCategory.php");
  require_once("../../Class/StoryComment.php");
  require_once("../../Class/StoryLike.php");

  $user = new User();
  $story = new Story();
  $image = new StoryImage();
  $category = new StoryCategory();
  $comment = new StoryComment();
  $like = new StoryLike();

  $storyArray = $story->storyDetails();

  // only admin can access this page condition
  $userResult = $user->userDetails($_SESSION['user_id']);
  if ($userResult) {
    if ($userResult[0]['role'] != 'admin') {
      header('../logout.php?logoutsuccess=false');
    }
  }

  if (isset($_POST['comment'])) {

    $user_id = $_SESSION['user_id'];
    $content = $_POST['commentcontent'];
    $story_id = $_POST['comment'];

    $commentArray = compact('user_id', 'story_id', 'content');

    if ($comment->addComment($commentArray))
      header("location: adminallstoryView.php?#$story_id");
  }
  //edit comment logic

  if (isset($_POST['editcomment'])) {
    $editCommentContent = $_POST['editcommentcontent'];
    $comment_id = $_POST['editcomment'];
    $story_id = $_POST['story_id'];


    if ($comment->updateComment($comment_id, $editCommentContent))
      header("location: adminallstoryView.php?#$story_id");
    else
      header("location: adminallstoryView.php?#$story_id");
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
  <title>Admin Dashboard</title>
  <!-- <link rel="stylesheet" href="../../public/css/adminstoryView1.css"> -->
  <!-- <link rel="stylesheet" href="../../public/css/style1.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>

  </style>
</head>

<body>
  <!-- navbar file add -->
  <?php require_once('adminnavbar.php') ?>

  <main role="main" class="" style="min-height:29rem">

    <div class="d-flex shadow-lg p-2 " style=" justify-content: space-between;">
      <div>
        <?php if (isset($_GET['category_id'])) {
          $categoryData = $category->categoryDetails($_GET['category_id']);
          $storyArray = $story->storyDetails(null, $_GET['category_id']);
        ?>
          <h4>Category :
            <?php echo $categoryData[0]['Title'] ?>
          </h4>
        <?php
        } else {
          
        ?>

          <button id="viewStory" class="btn" onclick="viewStory(this.id)">Story View</button>
          <button id="viewStoryGrid" class="btn" onclick="viewStoryGrid(this.id)">Story Grid</button>
          <button id="slideshow" class="btn" onclick="viewSlideShow(this.id)">Story Slideshow</button>
      </div>
      <div>
        <a href="addStoryForm.php" class="btn btn-success"> Add Story</a>
      <?php } ?>
      </div>
    </div>

    <div id="myCarousel" style="display:none" class="carousel slide wet-asphalt bg-white " data-bs-ride="carousel" data-interval="5000" data-pause="false">
      <div class="carousel-inner">

        <?php
        
        foreach ($storyArray as $key => $values) {
          $imageArray = $image->imageDetails($values['story_id']);
          if ($imageArray) {
        ?>
            <?php if ($key == 0) { ?>
              <div class="carousel-item active card p-4 " style="transition-duration: 1.5s; ">
                <a href="adminstoryview.php?story_id=<?php echo $values['story_id'] ?>">
                  <div>
                    <img class="d-block w-100 " style="object-fit:fill; height:35rem;" src="../../Upload/<?php echo $imageArray[0]['image'] ?>" alt="First slide">
                  </div>
                  <div class="carousel-caption">
                    <h4>Title :
                      <?php echo $values['story_title'] ?>
                    </h4>
                    <p>Category :
                      <?php echo $values['category_title'] ?>
                    </p>
                  </div>
                </a>
              </div>
            <?php } else { ?>
              <div class="carousel-item card p-4" style="transition-duration: 1.5s;">
                <a href="adminstoryview.php?story_id=<?php echo $values['story_id'] ?>">
                  <img class="d-block w-100" style="object-fit:fill; height:35rem;" src="../../Upload/<?php echo $imageArray[0]['image'] ?>" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Title :
                      <?php echo $values['story_title'] ?>
                    </h5>
                    <h5>Category :
                      <?php echo $values['category_title'] ?>
                    </h5>
                  </div>
                </a>
              </div>
        <?php
            }
          }
        } ?>

      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-black rounded-circle" aria-hidden="true">
        </span>
        <span class="visually-hidden">
          Previous
        </span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon  
                  bg-black rounded-circle" aria-hidden="true">
        </span>
        <span class="visually-hidden">
          Next
        </span>
      </button>
    </div>

    <div class="bg-light mt-3" id="viewstorydiv" style="margin:0 auto; width:55%">
      <?php
      if ($storyArray)
        foreach ($storyArray as $key => $values) {
      ?>
        <div class="container mb-5 shadow-lg p-3" id="<?php echo $values['story_id'] ?>">
          <div class="d-flex mb-2" style="justify-content:space-between">
            <div>
              <strong class="card-text">Title :
                <?php echo stripslashes($values['story_title']) ?>
              </strong><br>
              <strong class="card-text">Category :
                <?php echo $values['category_title'] ?>
              </strong>
            </div>
            <div>
              <a href='updateStoryForm.php?story_id=<?php echo $values['story_id'] ?>' class='btn btn-primary'>Update</a>
              <a href='deleteStory.php?story_id=<?php echo $values['story_id'] ?>' onclick="return confirm('Do you want to delete the story')" class='btn btn-danger'>Delete</a>
            </div>
          </div>
          <?php
          $imageArray = $image->imageDetails($values['story_id']);
          if ($imageArray) {
          ?>

            <div id="carouselExampleControls<?php echo $values['story_id'] ?>" class="carousel slide">
              <div class="carousel-inner">
                <?php

                foreach ($imageArray as $key1 => $path) {
                  if ($key1 == 0) { ?>
                    <div class="carousel-item active">
                      <img class="d-block w-100" style="height:25rem ; width:100%" src="../../Upload/<?php echo $path['image'] ?>" alt="Card image cap" />
                    </div>
                  <?php } else { ?>

                    <div class="carousel-item">
                      <img class="d-block w-100" style="height:25rem ; width:100%" src="../../Upload/<?php echo $path['image'] ?>" alt="Card image cap" />
                    </div>

              <?php
                  }
                }
              }
              ?>
              </div>
              <?php if (count($imageArray) > 1) { ?>
                <a class="carousel-control-prev" href="#carouselExampleControls<?php echo $values['story_id'] ?>" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Prev</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls<?php echo $values['story_id'] ?>" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              <?php } ?>
            </div>

            <div class="card-body">
              <p class="card-text" style="text-align: justify;">
                <?php echo stripslashes($values['story_content']) ?>
              </p>

              <div class="d-flex justify-content-between align-items-center">

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                  <div class="d-flex" style="justify-content: space-between;">
                    <?php if ($like->likeDetails($values['story_id'], $_SESSION['user_id'])) { ?>
                      <a class="card p-2" href="../like.php?story_id=<?php echo $values['story_id'] ?>"><img src='../../Upload/icons8-like-48.png' style="width:95%" alt="Liked" /></a>
                    <?php } else { ?>
                      <a class="card p-2" href="../like.php?story_id=<?php echo $values['story_id'] ?>"><img src='../../Upload/icons8-like-50.png' style="width:95%" alt="Like" /></a>
                    <?php } ?>
                    <input style="margin-left: 0.5rem;" class="form-control" type="text" name="commentcontent" placeholder="comment here" required>
                    <button class="card p-2" style="margin-left: 0.5rem; align-items:center" value="<?php echo $values['story_id'] ?>" name="comment" type="submit"><img src="../../Upload/icons8-send-64.png" style="width:60%" alt=""></button>
                  </div>
                </form>

                <small class="text-muted">
                  Total like:
                  <?php
                  $likeResult = $like->likeCount($values['story_id']);
                  if ($likeResult)
                    echo $likeResult['total_like'];
                  else
                    echo 0;
                  ?>
                </small>

                <small class="text-muted">
                  Total Comment:
                  <?php
                  $commentResult = $comment->commentCount($values['story_id']);
                  if ($commentResult)
                    echo $commentResult['total_comment'];
                  else
                    echo 0;
                  ?>
                </small>

              </div>
            </div>
            <!-- comment section -->
            <div class="box-shadow ">

              <hr>
              <div class="card-body">
                <?php
                $commentArray = $comment->commentDetails($values['story_id']);
                if ($commentArray) { ?>

                  <div class='d-flex mb-3' style='justify-content:space-between'>
                    <h5 class='card-text'>Comments</h5>
                    <button class='btn btn-secondary' id='viewcommentbtn<?php echo $commentArray[0]['comment_id'] ?>' onclick='viewComment(this.id)' value='commentdiv<?php echo $commentArray[0]['comment_id'] ?>'>view comments</button>
                  </div>
                  <div id='commentdiv<?php echo $commentArray[0]['comment_id'] ?>' style='display:none'>
                    <?php
                    foreach ($commentArray as $k => $v) {
                    ?>
                      <div class="d-flex" style="justify-content: space-between;">
                        <div class="card-text" style="text-align: justify; font-weight:100 ">
                          <?php echo $v['full_name'] ?>
                        </div>
                        <div>
                          <button class="editcommentbutton bg-transparent" id="editcommentbtn<?php echo $v['comment_id'] ?>" value="showeditcomment<?php echo $v['comment_id'] ?>" onclick="commentEditFunction(this.id)" style="border:none;"><img src="../../Upload/icons8-edit-50.png" style="width:55%" alt="Edit"></button>
                          <a href="../deletecomment.php?story_id=<?php echo $v['story_id'] ?>&comment_id=<?php echo $v['comment_id'] ?>"><img src="../../Upload/icons8-delete-50.png" style="width:25% ;" alt="Delete"></a>
                        </div>
                      </div>
                      <div id="showeditcomment<?php echo $v['comment_id'] ?>" style="display:none">
                        <form action="<?php echo "{$_SERVER['PHP_SELF']}" ?>" method="POST">
                          <input class="w-50" type="text" name="editcommentcontent" value="<?php echo $v['content'] ?>">
                          <input type="text" style="display:none" name="story_id" value="<?php echo $values['story_id'] ?>">
                          <button type="submit" name="editcomment" class="btn btn-success" value="<?php echo $v['comment_id'] ?>">Save</button>
                        </form>
                      </div>
                      <div id="showcomment<?php echo $v['comment_id'] ?>" style="display:block">
                        <p class="card-text" style="text-align: justify;">
                          <?php echo $v['content'] ?>
                        </p>
                      </div>
                      <hr>

                  <?php
                    }
                    echo "</div>";
                  } else
                    echo 'No Comments Yet';
                  ?>
                  </div>
              </div>
            </div>
          <?php }
      else
        echo "No Story Available"; ?>
        </div>

        <div class="container" id="viewstorygrid">

          <div class="" id="storyDiv" style="display : grid ; grid-template-columns:25% 25% 25% 25%; ">
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
                  <div class="btn-group mb-2">
                    <a href="adminstoryView.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-primary">View</a>
                    <a href="updateStoryForm.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                    <a href="deleteStory.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
  </main>

  <?php
  require_once('../footer.php');
  ?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../public/js/allstoryviewpage.js"></script>
  <script src="../../public/js/editcomment.js"></script>
</body>

</html>