<?php
session_start();


if(isset($_SESSION['user_id'])){
  require_once('../../Class/Connection.php');
  require_once('../../Class/User.php');
  require_once('../../Class/Story.php');
  require_once('../../Class/StoryLike.php');
  require_once('../../Class/StoryComment.php');
  require_once('../../Class/StoryImage.php');
  $user = new User();
  $story = new Story();
  $like = new StoryLike();
  $comment = new StoryComment();
  $image = new StoryImage();

  // condition for admin excess only 

  $userResult = $user->userDetails($_SESSION['user_id']);
  if($userResult){
    if($userResult[0]['role'] != 'admin')
        header('location: logout.php');
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <!-- navbar file add -->
    <?php require_once('adminnavbar.php') ?>
    <main role="main" >
    <div class="d-flex " style=" align-items:center ; justify-content: space-between; height:3rem">
        <?php 
          $story_count = $story->storyDetails();
          if($story_count)  
            $story_count = count($story_count);
          else
            $story_count = 0 ;
          
          $like_count = $like->likeDetails();
          if($like_count)  
            $like_count = count($like_count);
          else
            $like_count = 0 ;

          $comment_count = $comment->commentDetails();
          if($comment_count)  
            $comment_count = count($comment_count);
          else
            $comment_count = 0 ;
          
          $user_count = $user->userDetails();
          if($user_count)  
            $user_count = count($user_count);
          else
            $user_count = 0 ;
        ?>

        <div class="shadow-lg p-2 bg-white" style="width:25%;" >Total story: <span id="story_count"><?php echo $story_count ?></span></div>
        <div class="shadow-lg p-2 bg-white" style="width:25% ">Likes: <span id="like_count"><?php echo $like_count ?></span></div>
        <div class="shadow-lg p-2 bg-white" style="width:25%">Comments: <span id="comment_count"><?php echo $comment_count ?></span></div>
        <div class="shadow-lg p-2 bg-white" style="width:25%">Total Users: <span id="user_count"><?php echo $user_count ?></span></div>
        <div class="d-flex shadow-lg bg-white p-1" style="height:2.5rem" >
          <label class="form-label p-1" for="startrange">Date</label>
          <input class="form-control" id="startrange" type="date"/>
          <label class="form-label p-1" for="endrange">To</label>
          <input class="form-control" id="endrange" type="date" />
          <button class="btn btn-primary" style="color :white ;"  onclick="updateData()">Filter</button>
        </div>
      </div>

    <div class="album py-2 bg-light">
    <div class="d-flex" style="align-items: center; justify-content:space-between">
      <div>
        <h3>Story</h3>
      </div>
      <!-- <div class="d-flex " style="height: 2rem; width:20%  ">
        <input type="search" class="form-control" id="search_field" placeholder="Search here" />
        <span id="search-addon ">
          <img class="" src="../../Upload/icons8-google-web-search-50.png" style="height:100% ; width:2.2rem" alt="">
        </span>
      </div> -->
    </div>
      <div class="container">

        <div class="" style="display : grid ; grid-template-columns:auto auto auto auto;">
          <?php 
          $storyArray = $story->storyDetails();
          foreach($storyArray as $key => $values){ 
          ?>
          <div class="m-4 card" >
            <div class="box-shadow ">
              <?php 
            
            
            
            $imageArray = $image->imageDetails($values['story_id']);
              if($imageArray){
              ?>
              <img class="card-img-top" src="../../Upload/<?php echo $imageArray[0]['image'] ?>" alt="image not found">
              <?php } ?>
              <div class="card-body">
              <p class="card-text">Title : <?php echo $values['story_title'] ?></p>
                <p class="card-text">Category : <?php echo $values['category_title'] ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="adminstoryView.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-primary">View</a>
                    <a href="updateStoryForm.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                    <a href="deleteStory.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          
        </div>
      </div>
    </div>
  </main>




  <?php 
    require_once('../footer.php');

    if(isset($_SESSION['addstory'])){
      unset($_SESSION['addstory']);
      echo "<script> alert('Story added successfull!') </script>";
    }
  ?>
  <script>
    function updateData(){
      let startrange = document.getElementById('startrange').value;
      let endrange = document.getElementById('endrange').value;
      if(startrange != '' && endrange != ''){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          let obj = JSON.parse(this.responseText);
          document.getElementById("user_count").innerHTML = obj.user_count;
          document.getElementById("story_count").innerHTML = obj.story_count;
          document.getElementById("like_count").innerHTML = obj.like_count;
          document.getElementById("comment_count").innerHTML = obj.comment_count;
        }
      };
      xhttp.open("GET", "getdataInRange.php?startrange="+startrange+"&endrange="+endrange, true);
      xhttp.send();   
    }
  }
  </script>
</body>
</html>