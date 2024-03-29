<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
    
    require_once('../common/userDetailsVerify.php');

    $userData = userVerification($_SESSION['user_id'] , $conn);

    if($userData['role'] == 'admin'){

        $user_count = $comment_count = $story_count = $like_count = 0;

        // total user count

        require_once('Totalcount.php');

        $sql = "SELECT story.id as story_id , storycategory.Title as category_title , story.title as story_title , content
                FROM storycategory JOIN story 
                ON storycategory.id = story.category_id AND story.id = {$_GET['story_id']}
                WHERE story.user_id = {$_SESSION['user_id']} AND story.deleted_at IS NULL AND storycategory.deleted_at IS NULL; 
                ";

        $result = mysqli_query($conn , $sql);
        
        $values = mysqli_fetch_assoc($result );
    }
    else{
        session_unset();
        session_destroy();
        header('location: ../common/logout.php?LogoutSuccess=true');
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
    <title>Admin Dashboard</title>
    <!-- <link rel="stylesheet" href="../../public/css/adminstoryView1.css"> -->
    <link rel="stylesheet" href="../../public/css/imageslider.css">
    <!-- <link rel="stylesheet" href="../../public/css/style1.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- navbar file -->
    <?php require_once('adminnavbar.php') ?>

    <main>

        <div class="cards d-flex ">
            <div class="card">Total story: <?php echo $story_count ?></div>
            <div class="card">Likes: <?php echo $like_count ?></div>
            <div class="card">Comments: <?php echo $comment_count ?></div>
            <div class="card">Total Users: <?php echo $user_count ?></div>
        </div>

        <br>

        <div>
            <span><strong style=" font-size:x-large">Story View</strong></span>
            <span style="float:right"><a href="addstoryform.php" class="btn btn-success">Add Story</a></span>
        </div>

        <div class="story_inner_div" style="margin:1rem auto;">
            
            <form action='{$_SERVER["PHP_SELF"]}' method='POST'>
                
                <div class='d-flex story_inner_div_items mb-5 p-5 bg-white '>
                    <div class="m-2" style="width:55%; text-align:justify">
                        <div class='d-flex'>

                            <div>
                                <h3 style='color:purple'>Title :  <?php echo $values['story_title'] ?>  </h3><BR>
                                <h3 style='color:purple'>Category : <?php echo $values['category_title'] ?> </h3><BR>
                            </div>

                            <div style='margin : 0 auto;'>
                                    
                                <a href="updateStoryForm.php?story_id=<?php echo $values['story_id'] ?>" class='btn btn-primary'>Update</a>

                                <a href="deleteStory.php?story_id=<?php echo $values['story_id'] ?>" class='btn btn-danger' onclick="return confirm('Do you want to delete the story')">Delete</a>

                            </div>

                        </div>

                        <div class="container text-center" >
                            <?php require('../common/imageslider.php') ?>
                        </div>
                        
                        <div>
                            <p><?php echo $values['content'] ?></p>
                        </div>

                        <div>
                        <?php 
                            $sql = "SELECT count(*) as 'like_count' 
                                        FROM storylikes 
                                        WHERE story_id = {$values['story_id']}
                                        AND deleted_at IS NULL";
                                
                            $result = mysqli_query($conn , $sql);

                            $resultArray = mysqli_fetch_assoc($result);

                            echo "<span> | Total like : {$resultArray['like_count']} | </span>";
                            
                            $sql = "SELECT count(*) as 'comment_count' 
                                    FROM storycomments 
                                    WHERE story_id = {$values['story_id']}
                                    AND deleted_at IS NULL";
                            
                            $result = mysqli_query($conn , $sql);

                            $resultArray = mysqli_fetch_assoc($result);

                            echo "<span>Total comment : {$resultArray['comment_count']}</span>
                        </div>
                    </div>
                    <div class='p-4' style='width :45%; font-size:12px ; background-color:whitesmoke ;'>";

                        $sql = "SELECT storycomments.id as comment_id , user_id , story_id , content , CONCAT(first_name , ' ' , last_name) as full_name 
                                    FROM storycomments
                                    JOIN users 
                                    ON users.id = user_id 
                                    WHERE story_id = {$_GET['story_id']} AND storycomments.deleted_at IS NULL";

                        $result = mysqli_query($conn ,$sql);

                        $resultArray = mysqli_fetch_all($result , MYSQLI_ASSOC);

                        echo "<h5>Comments</h5><hr>";
                        
                        foreach($resultArray as $key => $values){

                            echo "
                                <p>{$values['full_name']}</p>

                                <div style='display:flex; justify-content:space-between;' ><span>{$values['content']}</span>

                                <a href='deleteComment.php?deletecommentid={$values['comment_id']}&story_id={$_GET['story_id']}' class='btn btn-danger' >Delete</a>

                                </div><hr style='color:grey'>";
                        }
                    ?>
                    </div>
                </div>
            </form>
        </div>

    </main>
    <script src="../../public/js/imageslider.js"></script>
</body>
</html>

