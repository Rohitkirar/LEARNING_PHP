<?php 
session_start();
$user_count = $comment_count = $story_count = $like_count = 0;

if(isset($_SESSION['user_id'])){

    require_once('../database/connection.php');

    $sql = "SELECT count(*) as user_count 
            FROM users 
            WHERE role = 'user' AND deleted_at IS NULL";

    $result = mysqli_query($conn , $sql);
    
    if($result){
        $resultArray = mysqli_fetch_assoc($result);
        $user_count = $resultArray['user_count'];
    }

    $sql = "SELECT count(*) as story_count 
            FROM story 
            WHERE user_id = {$_SESSION['user_id']} AND deleted_at IS NULL";

    $result = mysqli_query($conn , $sql);

    if($result){
        $resultArray = mysqli_fetch_assoc($result);
        $story_count = $resultArray['story_count'];
    }

    $sql = "SELECT count(*) as like_count 
            FROM likes 
            WHERE deleted_at IS NULL";
    
    $result = mysqli_query($conn , $sql);
    
    if($result){
        $resultArray = mysqli_fetch_assoc($result);
        $like_count = $resultArray['like_count'];
    }

    $sql = "SELECT count(*) as comment_count 
            FROM comments 
            WHERE  deleted_at IS NULL";
    
    $result = mysqli_query($conn , $sql);
    
    if($result){
        $resultArray = mysqli_fetch_assoc($result);
        $comment_count = $resultArray['comment_count'];
    }

    $sql = "SELECT story.id as story_id , category.Title as category_title , story.title as story_title , image
            FROM category JOIN story 
            ON category.id = story.category_id 
            LEFT JOIN images
            ON story.id = images.story_id
            WHERE story.user_id = {$_SESSION['user_id']} AND story.deleted_at IS NULL 
            ";

    $result = mysqli_query($conn , $sql);
    
    $storyArray = mysqli_fetch_all($result , MYSQLI_ASSOC);

    // style="background-color:transparent; color:white"
}
else{
    session_unset();
    session_destroy();
    header('location: logout.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../public/css/admin.css">
</head>
<body>
    <header>
        <div class="logo" >A</div>
        <div class="logo" >Admin Dashboard</div>
        <div class="logo" >Welcome, <?php echo $_SESSION['username'] ?></div>
        <div class="search">
            <input type="text" placeholder="Search...">
        </div>
    </header>
    <nav>
        <ul>
            <li>Dashboard</li>
            <li><a href="admin.php" style="text-decoration: none; color:white">Home</a></li>
                    <!-- <li>Products</li>
                    <li>Settings</li> -->
            <li><a href="addstoryform.php" style="text-decoration: none; color:white">Add Story</a></li>
            <li><a href="logout.php" style="text-decoration: none; color:white">Logout</a></li>
        </ul>
    </nav>
    <main>
        <div class="cards">
            <div class="card">Total story: <?php echo $story_count ?></div>
            <div class="card">Likes: <?php echo $like_count ?></div>
            <div class="card">Comments: <?php echo $comment_count ?></div>
            <div class="card">Total Users: <?php echo $user_count ?></div>
        </div>
        <br>
        <div>
            <span><strong style="font-size:x-large;">ALL Stories</strong></span>
            <span style="float:right"><a href="addstoryform.php"><button id="addstorybtn">Add Story</button></a></span>
        </div>
        <div class="grid-container">
                    
                    <?php 
                        foreach($storyArray as $key=>$values){
                                echo "<div class='grid-item' >";

                                echo "<h6 style='color:purple'>Title : " . $values['story_title'] . "</h3><BR>";

                                echo "<h6 style='color:purple'>Category : " . $values['category_title'] . "</h3><BR>";
                                
                                echo "<a href='adminstoryView.php'><button>View</button></a>"; 

                                echo '</div>';


                        }
                    ?>    
        </div>

    </main>
</body>
</html>

<!-- <?php print_r($_SESSION) ?> -->
