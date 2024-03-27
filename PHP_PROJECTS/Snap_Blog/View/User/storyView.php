<?php
session_start();


if(isset($_SESSION['user_id'])){

  require_once("../../Class/Connection.php");
  require_once("../../Class/User.php");
  require_once("../../Class/Story.php");
  require_once("../../Class/StoryImage.php");
  require_once("../../Class/StoryComment.php");
  require_once("../../Class/StoryLike.php");
  $user = new User();
  $story = new Story();
  $image = new StoryImage();
  $comment = new StoryComment();
  $like = new StoryLike();

  if(isset($_POST['comment'])){
    
    $user_id = $_SESSION['user_id'];
    $content = $_POST['commentcontent'];
    $story_id = $_POST['comment'];
    
    $commentArray = compact('user_id' , 'story_id' , 'content');

    if($comment->addComment($commentArray)){
      
      if(isset($_GET['story_id'])){
        header("location: storyView.php?story_id={$_GET['story_id']}");
      }
      else{
        header('location: allstoryView.php');
      }
    }
  
  }

}
else{
  session_unset();
  session_destroy();
  header('location: logout.php?success=false');
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
    <?php require_once('navbar.php') ?>
    <main role="main" class="py-3" >
        <h4>Story View</h4>
    <div class="album ">
      <div>
        <div class="" >
          <?php 
          $storyArray = $story->storyDetails($_GET['story_id']);
          foreach($storyArray as $key => $values){ 
          ?>
          <div class="mb-4 shadow-lg p-5 bg-light " style="display : grid; grid-template-columns: 60% 40% " >
          <div class="p-2" >
            <div class="box-shadow ">
                <p class="card-text">Title : <?php echo $values['story_title'] ?></p>
                <p class="card-text">Category : <?php echo $values['category_title'] ?></p>
              
              <?php require_once('../imageslider.php') ?>

              <div class="card-body">
                
                <p class="card-text" style="text-align: justify;"><?php echo $values['story_content'] ?></p>

                <div class="d-flex justify-content-between align-items-center">
                  
                  <form action="<?php echo "{$_SERVER['PHP_SELF']}?story_id={$values['story_id']}" ?>" method="POST">
                    <div class="d-flex">
                      <a href="../like.php?storyview=1&story_id=<?php echo $values['story_id'] ?>" class="btn btn-outline-primary">Like</a>  
                      <input type="text" name="commentcontent" placeholder="comment here" required>
                      <button class="btn btn-outline-success" value="<?php echo $values['story_id'] ?>" name="comment" type="submit">Comment</button>
                    </div>
                  </form>

                  <small class="text-muted">
                    Total like: 
                    <?php 
                      $likeResult =  $like->likeCount($values['story_id']);
                      if($likeResult)
                        echo $likeResult['total_like'];
                      else
                        echo 0; 
                    ?>
                  </small>

                  <small class="text-muted">
                    Total Comment: 
                    <?php 
                      $commentResult = $comment->commentCount($values['story_id']) ;
                      if($commentResult)
                        echo $commentResult['total_comment'];
                      else
                        echo 0 ; 
                    ?>
                  </small>

                </div>
              </div>
            </div>
          </div>
          <div>
            <!-- comment section -->
            <div class="p-2" >
            <div class="box-shadow ">
              <h5 class="card-text">Comments</h5>
              <hr>
              <div class="card-body">
                <?php 
                  $commentArray = $comment->commentDetails($values['story_id']);
                  if($commentArray){ 
                  foreach($commentArray as $k=>$v){  
                ?>
                <div>
                  <div class="d-flex" style="justify-content: space-between;">
                    <div class="card-text" style="text-align: justify; font-weight:100 "><?php echo $v['full_name']?></div>
                    <?php if($v['user_id'] == $_SESSION['user_id']){ ?>
                      <a class="btn btn-danger" href="../deletecomment.php?story_id=<?php echo $v['story_id'] ?>&comment_id=<?php echo $v['comment_id'] ?>">delete</a>
                    <?php } ?>
                  </div>
                  <p class="card-text" style="text-align: justify;"><?php echo $v['content']?></p>
                  <hr>
                </div>
                <?php 
                    } 
                  }
                  else 
                    echo 'No Comments Yet';  
                ?>
              </div>
            </div>
          </div>
          
          </div>
          </div>
          <?php }?>
          
        </div>
      </div>
    </div>
  </main>

<?php 
  if(isset($_SESSION['deletecomment'])){
    unset($_SESSION['deletecomment']);
    echo "<script> alert('comment delted successfully') </script>";
  }
?>

  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <script src="../../assets/js/vendor/popper.min.js"></script>
  <script src="../../dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/vendor/holder.min.js"></script>

  <script>
    let sliderImages = document.querySelectorAll(".slide"),
      arrowLeft = document.querySelector("#arrow-left"),
      arrowRight = document.querySelector("#arrow-right"),
      current = 0;
      
      // Clear all images
      function reset() {
      for (let i = 0; i < sliderImages.length; i++) {
        sliderImages[i].style.display = "none";
          }
      }
      
      // Initial slide
      function startSlide() {
      reset();
      sliderImages[0].style.display = "block";
      }
      
      // Show previous
      function slideLeft() {
      reset();
      sliderImages[current - 1].style.display = "block";
      current--;
      }
      
      // Show next
      function slideRight() {
      reset();
      sliderImages[current + 1].style.display = "block";
      current++;
      }
      
      // Left arrow click
      arrowLeft.addEventListener("click", function () {
      if (current === 0) {
        current = sliderImages.length;
      }
      slideLeft();
      });
      
      // Right arrow click
      arrowRight.addEventListener("click", function () {
      if (current === sliderImages.length - 1) {
        current = -1;
      }
      slideRight();
      });
      
      startSlide();
  </script>
</body>
</html>