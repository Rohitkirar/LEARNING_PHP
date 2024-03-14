<?php 
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
                header("location: storyView.php?story_id=$story_id");
            }
            else{
                echo "ERROR " . mysqli_error($conn);
            }
        }
        else{
            $commentErr = 'empty comment!';
        }
    }

?>