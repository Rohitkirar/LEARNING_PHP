<?php
require_once("../Class/User.php");

session_start();


if(isset($_SESSION['user'])){

  require_once("../Class/Connection.php");
  $conn = new Connection();
  $conn = $conn->createConnection();


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
        <h4>All Story</h4>
    <div class="album ">
      <div>
        <div class="" >
          <?php 
          $storyArray = $_SESSION['user']->storyDetails($conn);
          foreach($storyArray as $key => $values){ 
          ?>
          <div class="mb-4 shadow-lg p-5 bg-light " style="display : grid; grid-template-columns: 60% 40% " >
          <div class="p-2" >
            <div class="box-shadow ">
                <p class="card-text">Title : <?php echo $values['story_title'] ?></p>
                <p class="card-text">Category : <?php echo $values['category_title'] ?></p>
              <?php 
              $imageArray = $_SESSION['user']->imageDetails($conn , $values['story_id']);
              if($imageArray){
              ?>
              <img class="card-img-top" src="../Upload/<?php echo $imageArray[0]['image'] ?>" alt="Card image cap">
              <?php } ?>
              <div class="card-body">
                <p class="card-text" style="text-align: justify;"><?php echo $values['story_content'] ?></p>
                <div class="d-flex justify-content-between align-items-center">

                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
          <div>
            <!-- comment section -->
            <div class="p-2" >
            <div class="box-shadow ">
                <p class="card-text">Title : <?php echo $values['story_title'] ?></p>
                <p class="card-text">Category : <?php echo $values['category_title'] ?></p>
              <?php 
              $imageArray = $_SESSION['user']->imageDetails($conn , $values['story_id']);
              if($imageArray){
              ?>
              <img class="card-img-top" src="../Upload/<?php echo $imageArray[0]['image'] ?>" alt="Card image cap">
              <?php } ?>
              <div class="card-body">
                <p class="card-text" style="text-align: justify;"><?php echo $values['story_content'] ?></p>
                <div class="d-flex justify-content-between align-items-center">

                  <small class="text-muted">9 mins</small>
                </div>
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

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>

</body>
</html>