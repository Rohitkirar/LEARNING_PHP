<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Homepage</title>
    <link rel="stylesheet" href="../../public/css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
</head>
<body>
    <!-- adding navbar file -->
    <?php require_once('navbar.php') ?>
    <main>
        <div>
            <h1>Welcome to My Homepage</h1>
            <a href="Login.php" rel="noopener noreferrer">LOGIN</a>
            <a href="Register.php"  rel="noopener noreferrer">REGISTER</a>
        </div>
    </main>
    <!-- adding footer file -->
    <?php require_once('footer.php') ?>
</body>
</html>