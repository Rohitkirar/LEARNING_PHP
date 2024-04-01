<?php
session_start();

if (isset($_SESSION['user_id'])) {

  require_once ("../../Class/Connection.php");
  require_once ("../../Class/User.php");
  require_once ("../../Class/Story.php");
  require_once ("../../Class/StoryImage.php");
  require_once ("../../Class/StoryCategory.php");
  require_once ("../../Class/StoryComment.php");
  require_once ("../../Class/StoryLike.php");

  $user = new User();
  $story = new Story();
  $image = new StoryImage();
  $category = new StoryCategory();
  $comment = new StoryComment();
  $like = new StoryLike();

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>

  </style>
</head>

<body>
  <!-- navbar file add -->
  <?php require_once ('adminnavbar.php') ?>

  <main role="main" class="d-flex m-2" style="min-height:29rem" >
    <div class="d-flex pb-2" style="justify-content: space-between;">
      <?php if (isset($_GET['category_id'])) {
        $categoryData = $category->categoryDetails($_GET['category_id']);
        $storyArray = $story->storyDetails(null, $_GET['category_id']);
        ?>
        <h4>Category :
          <?php echo $categoryData[0]['Title'] ?>
        </h4>
        <?php
      } else {
        $storyArray = $story->storyDetails();
        ?>

        <h4>All Story</h4>
      <?php } ?>
    </div>
    <div class="bg-light " style="margin:0 auto; width:55%">
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
                <a href='deleteStory.php?story_id=<?php echo $values['story_id'] ?>'
                  onclick="return confirm('Do you want to delete the story')" class='btn btn-danger'>Delete</a>
              </div>
            </div>
              <?php
              $imageArray = $image->imageDetails($values['story_id']);
              if ($imageArray) {
                  ?>

              <div id="carouselExampleControls<?php echo $values['story_id'] ?>" class="carousel slide" >
              <div class="carousel-inner">
                <?php
                
                foreach ($imageArray as $key1 => $path) { 
                if($key1==0){ ?>
                <div class="carousel-item active">
                  <img class="d-block w-100" style="height:25rem ; width:100%" src="../../Upload/<?php echo $path['image'] ?>"
                    alt="Card image cap" />
                </div>
                <?php } else{ ?>

                <div class="carousel-item">
                  <img class="d-block w-100" style="height:25rem ; width:100%" src="../../Upload/<?php echo $path['image'] ?>"
                    alt="Card image cap" />
                </div>

                  <?php   
                }               
                }
              }
              ?>
              </div>
              <?php if(count($imageArray)>1) { ?>
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
                    <?php if($like->likeDetails($values['story_id'] , $_SESSION['user_id'])){ ?>
                    <a class="card p-2" href="../like.php?story_id=<?php echo $values['story_id'] ?>"
                      ><img src='../../Upload/icons8-like-48.png' style="width:95%" alt="Liked"/></a>
                    <?php }else{?>
                    <a class="card p-2" href="../like.php?story_id=<?php echo $values['story_id'] ?>"
                      ><img src='../../Upload/icons8-like-50.png' style="width:95%"  alt="Like"/></a>
                      <?php } ?>
                    <input style="margin-left: 0.5rem;" class="form-control" type="text" name="commentcontent" placeholder="comment here" required>
                    <button class="card p-2" style="margin-left: 0.5rem; align-items:center" value="<?php echo $values['story_id'] ?>" name="comment"
                      type="submit" ><img src="../../Upload/icons8-send-64.png" style="width:60%" alt=""></button>
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
                  <button class='btn btn-secondary' id='viewcommentbtn<?php echo $commentArray[0]['comment_id'] ?>' onclick='viewComment(this.id)' value='commentdiv<?php echo $commentArray[0]['comment_id'] ?>' >view comments</button>
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
                          <button class="editcommentbutton bg-transparent" id="editcommentbtn<?php echo $v['comment_id'] ?>"
                          value="showeditcomment<?php echo $v['comment_id'] ?>"
                            onclick="commentEditFunction(this.id)" style="border:none;"><img src="../../Upload/icons8-edit-50.png" style="width:55%" alt="Edit"></button>
                          <a 
                            href="../deletecomment.php?story_id=<?php echo $v['story_id'] ?>&comment_id=<?php echo $v['comment_id'] ?>"><img src="../../Upload/icons8-delete-50.png" style="width:25% ;" alt="Delete"></a>
                        </div>
                      </div>
                      <div id="showeditcomment<?php echo $v['comment_id'] ?>"  style="display:none">
                        <form action="<?php echo "{$_SERVER['PHP_SELF']}" ?>" method="POST">
                          <input class="w-50"  type="text" name="editcommentcontent" value="<?php echo $v['content'] ?>">
                          <input type="text" style="display:none" name="story_id" value="<?php echo $values['story_id'] ?>">
                          <button type="submit" name="editcomment" class="btn btn-success"
                            value="<?php echo $v['comment_id'] ?>">Save</button>
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
        <?php } else
        echo "No Story Available"; ?>
    </div>
    <div style="">
      <a href="addStoryForm.php" class="btn btn-success">Add Story</a>
    </div>
  </main>

  <?php
  require_once ('../footer.php');
  ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>

  function commentEditFunction(id){

    let unique = id.substr(id.length-3);
    let editbtn = document.getElementById(id);
    let showeditcomment = document.getElementById(editbtn.value);
    let showcomment = document.getElementById("showcomment" + id.substr(id.length-3) );

    editbtn.style.display = "none";
    showeditcomment.style.display = "block";
    showcomment.style.display = "none" ;
  }


  function viewComment(id){
    let commentbtn = document.getElementById(id);
    let idvalue = document.getElementById(id).value;
    let commentdiv = document.getElementById(idvalue);
    if(commentdiv.style.display=="block"){
      commentbtn.innerHTML = "view comments";
      commentdiv.style.display="none";
    }
    else{
      commentdiv.style.display="block";
      commentbtn.innerHTML = "hide comments";
    }

  }
</script>
</body>

</html>