<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../class/connection.php');
    require_once('../../Class/User.php');
    require_once('../../Class/Story.php');
    require_once('../../Class/StoryImage.php');

    $user = new User();
    $story = new Story();
    $image = new StoryImage();
}
else{
    session_unset();
    session_destroy();
    header('location: ../logout.php?LogoutSuccess=true');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       
        .card {
            flex: 1;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
    
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
    
    
        .grid-container {
            display: grid ;
            grid-template-columns:  auto auto auto auto;
            margin: 0 auto;

        }
        .grid-item{
            margin:1rem;
        }
    </style>
</head>
<body >

    <?php require_once('adminnavbar.php') ?>
    
    <main >
        <div class="m-2">
            <span><strong style="font-size:x-large;">ALL Stories</strong></span>
            <span style="float:right"><a href="addstoryform.php" class='btn btn-success m-3'>Add Story</a></span>
        </div>

        <div class="grid-container m-2" style="width:100%">
                    
                    <?php 
                        require_once('adminStoryGridView.php');
                    ?>    
        </div>

    </main>
</body>
</html>

