<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once("../../Class/Connection.php");
    require_once("../../Class/User.php");
    require_once("../../Class/Story.php");
    require_once("../../Class/StoryImage.php");
    require_once("../../Class/StoryCategory.php");
    require_once("../../Class/StoryComment.php");
    require_once("../../Class/StoryLike.php");

    $user = new User();
    $story = new Story();
    $image = new StoryImage();
    $category = new StoryCategory();
    $comment = new StoryComment();
    $like = new StoryLike();

    // only admin can access this page condition
    $userResult = $user->userDetails($_SESSION['user_id']);
    if($userResult){
        if($userResult[0]['role'] != 'admin'){
            header('../logout.php?logoutsuccess=false');
        }
    }
  
    if(isset($_POST['comment'])){
  
      $user_id = $_SESSION['user_id'];
      $content = $_POST['commentcontent'];
      $story_id = $_POST['comment'];
      
      $commentArray = compact('user_id' , 'story_id' , 'content');
      
      if($comment->addComment($commentArray))
        header('location: adminallstoryView.php');
    
    }
    //edit comment logic

    if(isset($_POST['editcomment'])){
      $editCommentContent = $_POST['editcommentcontent'];
      $comment_id = $_POST['editcomment'];
  
      if($comment->updateComment($comment_id , $editCommentContent))
        header("location: adminallstoryView.php");
      else
        header("location: adminallstoryView.php");
    }
  
  }
  else{
    header('location: ../logout.php?logoutsuccess=false');
  }
  
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- <link rel="stylesheet" href="../../public/css/adminstoryView1.css"> -->
    <!-- <link rel="stylesheet" href="../../public/css/style1.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>

</style>
</head>
<body >
    <!-- navbar file add -->
    <?php require_once('adminnavbar.php') ?>
    <main role="main" class="py-3" >
        <div class="d-flex pb-2" style="justify-content: space-between;">
            <?php if(isset($_GET['category_id'])){ 
              $categoryData = $category->categoryDetails($_GET['category_id']);  
              $storyArray = $story->storyDetails(null , $_GET['category_id']);
            ?>
              <h4>Category : <?php echo $categoryData[0]['Title'] ?></h4>
            <?php 
              }else { 
                $storyArray = $story->storyDetails();
            ?>
              
              <h4>All Story</h4>
              <a href="addStoryForm.php" class="btn btn-success">Add Story</a>
            <?php }?>
        </div>
    <div class="album ">
      <div>
        <div class="" >
          <?php 
          if($storyArray)
          foreach($storyArray as $key => $values){ 
          ?>
          <div class="mb-4 shadow-lg p-5 bg-light " style="display : grid; grid-template-columns: 60% 40% " >
          <div class="p-2" >
            <div class="box-shadow ">
                <div class="d-flex mb-2" style="align-items: center; justify-content:space-between">
                    <div>
                        <p class="card-text">Title : <?php echo stripslashes($values['story_title']) ?></p>
                        <p class="card-text">Category : <?php echo $values['category_title'] ?></p>
                    </div>
                    <div>
                        <a href='updateStoryForm.php?story_id=<?php echo $values['story_id'] ?>' class='btn btn-primary'>Update</a>
                        <a href='deleteStory.php?story_id=<?php echo $values['story_id'] ?>' onclick="return confirm('Do you want to delete the story')" class='btn btn-danger'>Delete</a>
                    </div>
                </div>
              <?php 
                $imageArray = $image->imageDetails($values['story_id']);
                if($imageArray){
                  foreach($imageArray as $key=>$path){
              ?>
                <img class="card p-2" style="height:100% ; width:100%" src="../../Upload/<?php echo $path['image'] ?>"  alt="Card image cap">
              <?php 
                  } 
                } 
              ?>
              <div class="card-body">
                
                <p class="card-text" style="text-align: justify;"><?php echo stripslashes($values['story_content']) ?></p>

                <div class="d-flex justify-content-between align-items-center">
                  
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="d-flex">
                      <a href="../like.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-outline-primary">Like</a>  
                      <input type="text" name="commentcontent" placeholder="comment here" required>
                      <button class="btn btn-outline-success" value="<?php echo $values['story_id'] ?>" name="comment" type="submit">Comment</button>
                    </div>
                  </form>

                  <small class="text-muted">
                    Total like: 
                    <?php 
                      $likeResult =  $like->likeCount($values['story_id']);
                      if($likeResult)
                        echo $likeResult['total_like'];
                      else
                        echo 0; 
                    ?>
                  </small>

                  <small class="text-muted">
                    Total Comment: 
                    <?php 
                      $commentResult = $comment->commentCount($values['story_id']) ;
                      if($commentResult)
                        echo $commentResult['total_comment'];
                      else
                        echo 0 ; 
                    ?>
                  </small>

                </div>
              </div>
            </div>
          </div>
          <div>
            <!-- comment section -->
            <div class="p-2" >
            <div class="box-shadow ">
              <h5 class="card-text">Comments</h5>
              <hr>
              <div class="card-body">
                <?php 
                  $commentArray = $comment->commentDetails($values['story_id']);
                  if($commentArray){ 
                  foreach($commentArray as $k=>$v){  
                ?>
                <div>
                  <div class="d-flex" style="justify-content: space-between;">
                    <div class="card-text" style="text-align: justify; font-weight:100 "><?php echo $v['full_name']?></div>
                    <div>
                      <script> commentflag = true </script>
                      <button class="btn btn-success editcommentbutton" id="editcommentbtn<?php echo $v['comment_id'] ?>" onclick="commentEditFunction(this.id)" >Edit</button>
                      <a class="btn btn-danger" href="../deletecomment.php?story_id=<?php echo $v['story_id'] ?>&comment_id=<?php echo $v['comment_id'] ?>">delete</a>
                    </div>
                  </div>
                  <div id="showeditcomment<?php echo $v['comment_id'] ?>" style="display:none">
                  <form action="<?php echo "{$_SERVER['PHP_SELF']}" ?>" method="POST">
                    <input type="text" name="editcommentcontent" value="<?php echo $v['content']?>">
                    <button type="submit" name="editcomment" class="btn btn-success" value="<?php echo $v['comment_id'] ?>">Edit</button>
                  </form>
                  </div>
                  <div id="showcomment<?php echo $v['comment_id'] ?>" style="display:block">
                    <p class="card-text" style="text-align: justify;"><?php echo $v['content']?></p>
                  </div>
                  <hr>
                </div>
                <?php 
                    } 
                  }
                  else 
                    echo 'No Comments Yet';  
                ?>
              </div>
            </div>
          </div>
          
          </div>
          </div>
          <?php } else echo "No Story Available" ;?>
          
        </div>
      </div>
    </div>
  </main>
<main>
<?php 
    require_once('../footer.php');
  ?>

<script src="../../public/js/editcomment.js"></script>
</body>
</html>