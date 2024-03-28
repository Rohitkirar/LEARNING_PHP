<?php
session_start();


if(isset($_SESSION['user_id'])){
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

  // condition for admin excess only 

  $userResult = $user->userDetails($_SESSION['user_id']);
  if($userResult){
    if($userResult[0]['role'] != 'admin')
        header('location: logout.php');
  }
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
    <main role="main" >
    <div class="d-flex " style=" align-items:center ; justify-content: space-between; height:2rem">
        <?php 
          $story_count = $story->storyDetails();
          if($story_count)  
            $story_count = count($story_count);
          else
            $story_count = 0 ;
          
          $like_count = $like->likeDetails();
          if($like_count)  
            $like_count = count($like_count);
          else
            $like_count = 0 ;

          $comment_count = $comment->commentDetails();
          if($comment_count)  
            $comment_count = count($comment_count);
          else
            $comment_count = 0 ;
          
          $user_count = $user->userDetails();
          if($user_count)  
            $user_count = count($user_count);
          else
            $user_count = 0 ;
        ?>

        <div class="shadow-lg p-2 bg-white" style="width:25%;" >Total story: <?php echo $story_count ?></div>
        <div class="shadow-lg p-2 bg-white" style="width:25% ">Likes: <?php echo $like_count ?></div>
        <div class="shadow-lg p-2 bg-white" style="width:25%">Comments: <?php echo $comment_count ?></div>
        <div class="shadow-lg p-2 bg-white" style="width:25%">Total Users: <?php echo $user_count ?></div>
    </div>

    <div class="album py-2 bg-light">
    <div class="d-flex" style="align-items: center; justify-content:space-between">
          <div>
            <h3>Story</h3>
          </div>
          <div>
              <form action="" method="">
                Date From <input class="btn btn-outline-secondary" type="date" />
                To <input class="btn btn-outline-secondary" type="date" />
                <button class="btn btn-outline-success" type="submit" >Search</button>
              </form>
          </div>
        </div>
      <div class="container">

        <div class="" style="display : grid ; grid-template-columns:auto auto auto auto;">
          <?php 
          $storyArray = $story->storyDetails();
          foreach($storyArray as $key => $values){ 
          ?>
          <div class="m-4 card" >
            <div class="box-shadow ">
              <?php 
            
            
            
            $imageArray = $image->imageDetails($values['story_id']);
              if($imageArray){
              ?>
              <img class="card-img-top" src="../../Upload/<?php echo $imageArray[0]['image'] ?>" alt="image not found">
              <?php } ?>
              <div class="card-body">
              <p class="card-text">Title : <?php echo $values['story_title'] ?></p>
                <p class="card-text">Category : <?php echo $values['category_title'] ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="adminstoryView.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-primary">View</a>
                    <a href="updateStoryForm.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                    <a href="deleteStory.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                  </div>
                </div>
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
  ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <script src="../../assets/js/vendor/popper.min.js"></script>
  <script src="../../dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/vendor/holder.min.js"></script>

</body>
</html>