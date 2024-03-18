<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');

    require_once('../common/userDetailsVerify.php');

    $userData = userVerification($_SESSION['user_id'] , $conn);

    if($userData['role'] == 'admin'){

        // likes count , usercount , commentscount , story count
        
        require_once('Totalcount.php');

    }
    else{
        session_unset();
        session_destroy();
        header('location: ../common/logout.php');
    }
}
else{
    session_unset();
    session_destroy();
    header('location: ../common/logout.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../public/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body >
    <!-- navbar file -->
    <?php require_once('adminnavbar.php') ?>
    
    <main >
        <div class="cards">
            <div class="card">Total story: <?php echo $story_count ?></div>
            <div class="card">Likes: <?php echo $like_count ?></div>
            <div class="card">Comments: <?php echo $comment_count ?></div>
            <div class="card">Total Users: <?php echo $user_count ?></div>
        </div>
        <div class="m-2">
            <span><strong style="font-size:x-large;">ALL Stories</strong></span>
            <span style="float:right"><a href="addstoryform.php" class='btn btn-success m-3'>Add Story</a></span>
        </div>
        <div class="container">
                    
                    <?php 
                        require_once('adminStoryGridView.php');
                    ?>    
        </div>

    </main>

    <?php require_once('../common/footer.php') ?>
</body>
</html>

<!-- <?php print_r($_SESSION) ?> -->
