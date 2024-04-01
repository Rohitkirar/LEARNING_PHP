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
        <div class="container shadow-lg mt-5 p-3 mb-5 bg-white rounded "  style="height:25rem ; ">
          <h1 class="jumbotron-heading">Join millions of others</h1>
          <p class="lead text-muted">
               Whether sharing your expertise, breaking news, or whatever’s on your mind, 
              you’re in good company on Blogger. Sign up to discover why millions of people have published their passions here.
          </p>
          <p>
            <a href="login.php" class="btn btn-primary my-2">login here</a>
            <a href="register.php" class="btn btn-secondary my-2">Register</a>
          </p>
        </div>
        <div class="container shadow-lg mt-5 p-3 mb-5 bg-white rounded "  style="background-color: whitesmoke; height:25rem ; ">
          <img src="../upload/snapchat.png" style="width:5% ;" alt="">
          <span style="font-size:xx-large;">ɮʟօɢ</span><br><br>
          <p class="lead text-muted">
                A Snap blog is an online journal that displays information on a variety of topics. 
                The blog is a shortened version of “ weblog ” which means web blog.
          </p>
          <p>
            <!-- <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a> -->
          </p>
        </div>
      </section>

      

    </main>

    <?php 
      require_once('footer.php');
    ?>
</body>
</html>