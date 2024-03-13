<?php 
session_start();
$user_count = $comment_count = $story_count = $like_count = 0;
$comment = $commentErr  = '';

if(isset($_SESSION['user_id'])){

    require_once('../database/connection.php');
    
    // retrieving story data from database

    $sql = "SELECT story.id as story_id , category.Title as category_title , story.title as story_title , content , image
        FROM category JOIN story 
        ON category.id = story.category_id 
        LEFT JOIN images
        ON story.id = images.story_id
        WHERE story.deleted_at IS NULL ";
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
                header('location: storyView.php');
            }
            else{
                echo "ERROR " . mysqli_error($conn);
            }
        }
        else{
            $commentErr = 'empty comment!';
        }
    }

    // comment delete
    elseif(isset($_POST['deletecomment'])){
        $sql = "UPDATE comments SET deleted_at = CURRENT_TIMESTAMP WHERE id = {$_POST['deletecomment']}";
        $result = mysqli_query($conn , $sql);
        if($result)
            header('location: storyView.php');
        else
            echo "ERROR " . mysqli_error($conn);     
    }
    // like data storing functionalites
    elseif(isset($_POST['like_btn'])){

        $story_id = $_POST['like_btn'];

        $sql = "SELECT id , deleted_at  FROM likes WHERE user_id='{$_SESSION['user_id']}' AND story_id = $story_id ";
        $result = mysqli_query($conn , $sql);
        
        $resultArray = mysqli_fetch_assoc($result);

        if($resultArray){
            if($resultArray['deleted_at']){
                $sql = "UPDATE likes SET deleted_at = DEFAULT WHERE id = '{$resultArray['id']}'";
                $result = mysqli_query($conn , $sql);
                
                if($result)
                    echo "successfull liked";
                else
                    echo "ERROR : " . mysqli_error($conn);
            }
            else{
                $sql = "UPDATE likes SET deleted_at = CURRENT_TIMESTAMP WHERE id = '{$resultArray['id']}'";
                $result = mysqli_query($conn , $sql);
                
                if($result)
                echo "successfull unliked";
                else
                    echo "ERROR : " . mysqli_error($conn);
            }
        }
        else{
            $sql = "INSERT INTO likes (user_id , story_id ) VALUES('{$_SESSION['user_id']}' , '$story_id')";

            $result = mysqli_query($conn , $sql);

            if($result)
                echo "successfull liked";
            else
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
        .story_inner_div_items{
            padding : 5%;
        }
        #deletecommentbtn{
            padding: 1px;
            float:right ; 
            background-color:red; 
            border :none;
        }
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
        <h2>Story</h2>
            <div class="story_inner_div">
            
                <?php 

                    foreach($storyArray as $key=>$values){
                        echo "<form action='{$_SERVER["PHP_SELF"]}' method='POST'>";
                        echo "<div class='story_inner_div_items'>";

                            echo "<h3 style='color:purple'>Title : " . $values['story_title'] . "</h3><BR>";

                            echo "<h3 style='color:purple'>Category : " . $values['category_title'] . "</h3><BR>";

                            echo "<img src='{$values['image']}' style='width:100%; height:50%;' alt='image not found'/><BR><BR>";

                            echo $values['content'];

                            echo "<BR><BR>";

                            echo "<button type='submit' name='like_btn' value='{$values['story_id']}' style='margin-right:1rem;'>Like</button>";


                            echo "<span class='like-button'>";
                            echo "<input type='text' name='comment'>";
                            echo "<button type='submit' name='comment_btn' value='{$values['story_id']}' >comment</button></span>";
                            
                            echo "<span style='color : red; margin-right:1rem;'>$commentErr</span>";

                            $sql = "SELECT count(*) as 'like_count' 
                                    FROM likes 
                                    WHERE story_id = {$values['story_id']}
                                    AND deleted_at IS NULL";
                            
                            $result = mysqli_query($conn , $sql);

                            $resultArray = mysqli_fetch_assoc($result);

                            echo "<span style='margin-right:1rem;'>Total like : {$resultArray['like_count']}</span>";
                            
                            $sql = "SELECT count(*) as 'comment_count' 
                                    FROM comments 
                                    WHERE story_id = {$values['story_id']}
                                    AND deleted_at IS NULL";
                            
                            $result = mysqli_query($conn , $sql);

                            $resultArray = mysqli_fetch_assoc($result);

                            echo "<span style='margin-right:1rem;'>Total comment : {$resultArray['comment_count']}</span>";
                            

                            $sql = "SELECT comments.id as comment_id , user_id , story_id , content , CONCAT(first_name , ' ' , last_name) as full_name 
                                    FROM comments
                                    JOIN users 
                                    ON users.id = user_id 
                                    WHERE story_id = '{$values['story_id']}' AND comments.deleted_at IS NULL";

                            $result = mysqli_query($conn ,$sql);

                            $resultArray = mysqli_fetch_all($result , MYSQLI_ASSOC);

                            echo "<h5>Comments</h5><hr>";
                            
                            foreach($resultArray as $key => $values){

                                echo "<p>{$values['full_name']}</p>";
                                echo "<span>{$values['content']}</span>";

                                if($values['user_id'] == $_SESSION['user_id']){
                                    echo "<button type='submit' name='deletecomment' value='{$values['comment_id']}' id='deletecommentbtn'>Delete comment</button>";
                                }
                                echo "<hr style='color:grey'>";
                            }

                        echo "</div>";
                        echo "</form>";   
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