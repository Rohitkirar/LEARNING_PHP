<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
        
    require_once('../common/userDetailsVerify.php');
    
    $userData = userVerification($_SESSION['user_id'] , $conn);

    $user_count = $comment_count = $story_count = $like_count = 0;
    $comment = $commentErr  = '';

    // like data storing functionalites
    if(isset($_POST['like_btn'])){

        $story_id = $_POST['like_btn'];
        
        $sql = "INSERT INTO storylikes 
                    (user_id , story_id )
                VALUES
                    ('{$_SESSION['user_id']}' , '{$story_id}')";

        $result = mysqli_query($conn , $sql);

        if($result)
            echo 'liked successfully';
        else
            echo "ERROR " . mysqli_error($conn);
        
    }
}
else{
    session_unset();
    session_destroy();
    header('location: ../common/logout.php?LogoutSuccess=true');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="../../public/css/user.css">
    <!-- <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="../../public/css/style1.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
</head>
<body>
    
    <?php require_once('navbar.php'); ?>

    <main>
        <h4 class="mt-2">All Stories</h4>
        <div class="grid-container">
            <?php require_once('storyGridView.php') ?>
        </div>
    </main>

    <?php require_once('../common/footer.php') ?>

    <?php 
        if(isset($_SESSION['successpassword']) && $_SESSION['successpassword'] == true){ 
            unset($_SESSION['successpassword']);
            echo '<script>alert("password successfully Updated!")</script>';
        }
        elseif(isset($_SESSION['successeditdetails']) && $_SESSION['successeditdetails'] == true){ 
            unset($_SESSION['successeditdetails']);
            echo '<script>alert("Successfully Saved user Details!")</script>';      
        }
    ?>

</body>
</html>
