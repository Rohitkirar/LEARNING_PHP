<?php 
    session_start();
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
    <!-- navbar file add -->
    <?php require_once('navbar.php') ?>
    
    <main role="main">

      <section class="jumbotron text-center ">
        <div class="container shadow-lg mt-5 p-3 mb-5 bg-white rounded "  style="background-color:gray; height:25rem ; ">
          <?php 
          if(isset($_GET['logoutsuccess'])){
            if($_GET['logoutsuccess'] == 'false'){ ?>
            <h3 class="jumbotron-heading" >Sorry You Do Not Have the Access!</h3>  
          <?php 
            }
          } 
          ?>
          <h3 class="jumbotron-heading">Your Are Successfully Logout</h3>
          <p class="lead text-muted">
               Thank You For Joining Us! You can login again to continue Services
          </p>
          <p>
            <a href="login.php" class="btn btn-primary my-2">login here</a>
            <a href="register.php" class="btn btn-secondary my-2">Register</a>
          </p>
        </div>
       
      </section>

      

    </main>

    <?php 
      require_once('footer.php');
    ?>
</body>
</html>