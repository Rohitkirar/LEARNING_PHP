<?php
session_start();


if(isset($_SESSION['user_id'])){
  require_once('../../Class/Connection.php');
  require_once('../../Class/User.php');
  require_once('../../Class/Story.php');
  require_once('../../Class/StoryImage.php');
  $user = new User();
  $story = new Story();
  $image = new StoryImage();
}
else
  header('location: ../logout.php?logoutsuccess=false');

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
    <main role="main" >
    <div class="album py-5 bg-light">
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
                    <a href="storyView.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-secondary">View</a>
                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                  </div>
                  <!-- <small class="text-muted">9 mins</small> -->
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