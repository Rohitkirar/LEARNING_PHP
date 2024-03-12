
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
    <link rel="stylesheet" href="../public/css/home.css">
    
</head>
<body>
    <header>
        <!-- <a href="#" class="logo">My Website</a> -->
        <nav>
            <a href="home.php">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </nav>
    </header>
    <main>
        <h1>LOGOUT Successfully</h1>
        <a href="Login.php" rel="noopener noreferrer">LOGIN</a>
        <a href="Register.php"  rel="noopener noreferrer">REGISTER</a>
        <p></p>
    </main>
    <footer>
        © 2024 My Website | Contact: contact@mywebsite.com
    </footer>
</body>
</html>