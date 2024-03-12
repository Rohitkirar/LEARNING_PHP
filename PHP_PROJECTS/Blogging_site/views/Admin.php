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
            WHERE user_id = {$_SESSION['user_id']} AND deleted_at IS NULL";
    
    $result = mysqli_query($conn , $sql);
    
    if($result){
        $resultArray = mysqli_fetch_assoc($result);
        $like_count = $resultArray['like_count'];
    }

    $sql = "SELECT count(*) as comment_count 
            FROM comments 
            WHERE user_id = {$_SESSION['user_id']} AND deleted_at IS NULL";
    
    $result = mysqli_query($conn , $sql);
    
    if($result){
        $resultArray = mysqli_fetch_assoc($result);
        $comment_count = $resultArray['comment_count'];
    }

    $sql = "SELECT story.id as story_id , category.Title as category_title , story.title as story_title , content 
            FROM category JOIN story 
            ON category.id = story.category_id 
            AND story.user_id = {$_SESSION['user_id']} ";

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
            <li><a href="home.php" style="text-decoration: none; color:white">Home</a></li>
            <li>Products</li>
            <li>Settings</li>
            <li><a href="addstoryform.php" >Add Story</a></li>
            <li><a href="logout.php">Logout</a></li>
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
        <h2>Recent Stories</h2>
        <div class="recent-articles">
            <div class="story_inner_div">
                <?php 
                    foreach($storyArray as $key=>$values){
                        echo "<div class='story_inner_div_items'>";

                        echo "<h3 style='color:purple'>Title : " . $values['story_title'] . "</h3><BR>";
                        echo "<h3 style='color:purple'>Category : " . $values['category_title'] . "</h3><BR>";
                        
                        echo $values['content'];
                        echo "</div>";
                    }        
                ?>
            </div>
            <!-- Add more articles here -->
            <!-- <div>
                <?php 
                $sql = "SELECT image FROM images WHERE id = 1";
                $result = mysqli_query($conn , $sql);
                $resultArray = mysqli_fetch_assoc($result);
                $image_path = $resultArray['image'];
                ?>
                <img src="<?php echo $image_path ?>" alt="unable to fetch image from db <?php echo $image_path ?>">
            </div> -->
        </div>

    </main>
</body>
</html>

<!-- <?php print_r($_SESSION) ?> -->
