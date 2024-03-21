
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
    <title>My Homepage</title>
    <link rel="stylesheet" href="../../public/css/csshome.css">
    <!-- <link rel="stylesheet" href="../../public/css/style1.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">   
</head>
<body>
    <!-- adding navbar file -->
    <?php require_once('navbar.php') ?>

    <main class="text-center" style="color:black;">
        <br>
        <h1>Logout Successfully</h1>

        <a href="Login.php" rel="noopener noreferrer" style="text-decoration: none;">Login Again</a>
        <!-- <a href="Register.php"  rel="noopener noreferrer">REGISTER</a> -->
        <p></p>
    </main>
    <!-- adding footer file -->
    <?php 
        require_once('footer.php') ;

        if(isset($_GET['LogoutSuccess']) && $_GET['LogoutSuccess'] == true){
            unset($_GET['LogoutSuccess']);
            echo '<script> alert("User Successfully Logout!"); </script>';
        }
    ?>
</body>
</html>