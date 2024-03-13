<?php 
session_start();
$user_count = $comment_count = $story_count = $like_count = 0;
$comment = $commentErr  = '';
if(isset($_SESSION['user_id'])){

    require_once('../database/connection.php');
    
    // retrieving story data from database

    $sql = "SELECT story.id as story_id , category.Title as category_title , story.title as story_title , content 
            FROM category JOIN story 
            ON category.id = story.category_id 
            AND deleted_at IS NULL ";

    $result = mysqli_query($conn , $sql);
    $storyArray = mysqli_fetch_all($result , MYSQLI_ASSOC);

    // comment data storing 
    if(isset($_POST['comment_btn'])){

        if(strlen($_POST['comment']) > 0){

            $story_id = $_POST['comment_btn'];
            $comment = $_POST['comment'];

            $sql = "INSERT INTO comments 
                        (user_id , story_id , content)
                    VALUES
                        ('{$_SESSION['user_id']}' , '{$story_id}' , '{$comment}') ";

            $result = mysqli_query($conn , $sql);
            if($result){
                $commentErr = '';
                echo 'commented successfully';
            }
            else{
                echo "ERROR " . mysqli_error($conn);
            }
        }
        else{
            $commentErr = 'empty comment!';
        }
    }
    
    // like data storing functionalites
    elseif(isset($_POST['like_btn'])){

        $story_id = $_POST['like_btn'];
        
        $sql = "INSERT INTO likes 
                    (user_id , story_id )
                VALUES
                    ('{$_SESSION['user_id']}' , '{$story_id}')";

        $result = mysqli_query($conn , $sql);

        if($result){
            echo 'liked successfully';
        }
        else{
            echo "ERROR " . mysqli_error($conn);
        }
    }
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
    <title>User Page</title>
    <link rel="stylesheet" href="../public/css/user.css">
    <style>
        body { font-family: Arial, sans-serif; }
        .post, .comments, .story { border: 1px solid #ccc; margin: 10px; padding: 10px; }
        .like-button { color: blue; cursor: pointer; }
        .comment { margin-bottom: 5px; }
        .story { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <header>
        <div class="logo" >A</div>
        <div class="logo" >User Dashboard</div>
        <div class="logo" >Welcome, <?php echo $_SESSION['username'] ?></div>
        <div class="search">
            <input type="text" placeholder="Search...">
        </div>
    </header>
    <nav>
        <ul >
            <li><a href="user.php" style="text-decoration: none; color:white;">Dashboard</a></li>
            <li><a href="user.php" style="text-decoration: none; color:white">Home</a></li>
            <li><a href="logout.php" style="text-decoration: none; color:white;" >Logout</a></li>
        </ul>
    </nav>
    <main>
        <span><strong style="font-size:x-large;">ALL Stories</strong></span>
        
            <div class="grid-container">
                
                            <?php 
                                foreach($storyArray as $key=>$values){
                                        echo '<div class="grid-item">';

                                        echo "<h6 style='color:purple'>Title : " . $values['story_title'] . "</h3><BR>";

                                        echo "<h6 style='color:purple'>Category : " . $values['category_title'] . "</h3><BR>";
                                        
                                        echo "<a href='storyView.php'><button>View</button></a>"; 

                                        echo '</div>';
                                }
                            ?>    
            </div>
        </div>
        
    </main>
</body>
</html>


<!-- 
        <div class="cards">
            <div class="card">Total story: <?php echo $story_count ?></div>
            <div class="card">Likes: <?php echo $like_count ?></div>
            <div class="card">Comments: <?php echo $comment_count ?></div>
            <div class="card">Total Users: <?php echo $user_count ?></div>
        </div>
<div class="post">
            <h2>Title : </h2>
            <p>This is the content of the post.</p>
            
        </div>

        <div class="comments">
            <h3>Comments</h3>
            <div class="comment">
            <p><strong>User1:</strong> Great post!</p>
        </div>
        <div class="comment">
            <p><strong>User2:</strong> I agree!</p>
        </div>
        </div>

        <div class="story">
            <h3>Story</h3>
            <p>This is a user story.</p>
        </div>

 -->