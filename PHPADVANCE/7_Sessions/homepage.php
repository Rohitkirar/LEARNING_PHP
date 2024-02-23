<?php 

session_start();
$username = $password = "";
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $loginmsg = "Hi $username, Successfully Logged In ";
}

if(isset($_POST['logout'])){
    session_destroy();
    $loginmsg = "Please Login Again ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body{
        margin : 0;
        background-color: silver;
    }
    .main{
        margin: 5% 25% 25% 25%;
        padding: 3rem;
        border : none;
        background-color: whitesmoke;
    }
    </style>
</head>
<body>
    <div class="main">
        <h2><?php echo $loginmsg?></h2>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

        <button name="logout">LOGOUT!</button>

        </form>
    </div>
</body>
</html>