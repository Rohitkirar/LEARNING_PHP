<?php
session_start();


if (isset($_SESSION['user_id'])) {
  require_once('../../Class/Connection.php');
  require_once('../../Class/User.php');
  require_once('../../Class/Story.php');
  require_once('../../Class/StoryImage.php');
  $user = new User();
  $story = new Story();
  $image = new StoryImage();
} else
  header('location: ../logout.php?logoutsuccess=false');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <title>Home</title>
</head>

<body>
  <!-- navbar file add -->
  <?php require_once('navbar.php') ?>

  <hr style="margin:0 ; border:3px solid white;">

  <main role="main">

    <div class="album py-2 bg-light">
      <h3>Latest Story</h3>

      <div class="container">

        <div class="" style="display : grid ; grid-template-columns:auto auto auto auto; ">
          <?php
          $storyArray = $story->storyDetails();
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
                  <a href="storyView.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-primary">View</a>
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


  <script src="https://code.jquery.com/jquery-3.6.4.min.js">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
  </script>



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>


</body>

</html>