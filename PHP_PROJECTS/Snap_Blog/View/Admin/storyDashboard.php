<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../class/connection.php');
    require_once('../../class/User.php');
    require_once('../../class/Story.php');
    require_once('../../class/StoryImage.php');
    require_once('../../class/storycategory.php');
    
    $user = new User();
    $story = new Story();
    $image = new StoryImage();
    $category = new StoryCategory();

    $userData = $user->userDetails($_SESSION['user_id']);
    if($userData[0]['role'] != 'admin'){
        header('location: ../logout.php?logoutsuccess=false');
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
  <link rel="stylesheet" href="../../public/css/admin1.css">
  <!-- <link rel="stylesheet" href="../../public/css/style1.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
  <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script defer src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
  <script defer src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>

  <script defer src="../../public/js/datatable.js"></script>  
  <style>
    a{
      color:black;
      text-decoration: none;
    }
    a:hover{
      color:blue;
    }
  </style>
</head>
<body>
    <!-- navbar file -->
    <?php require_once('adminnavbar.php') ?>
    
    <main class="bg-white" >

        <div class="mb-3 pt-2">
            <span><strong style="font-size:x-large;">Story DashBoard</strong></span>
            <span style="float:right"><a class="btn btn-success" href="addStoryForm.php" >Add Story</a></span>
        </div>
        <div  class="card m-4 p-3" style="margin: 0 auto;">
            <table id="categorytable" class='table table-hover'  >
                <thead style="color:red">
                    <tr style="color:red">
                        <th>S.No</th>
                        <!-- <th>Image</th> -->
                        <th>category</th>
                        <th>Title</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>deleted_at</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    
                    $storyDataArray = $story->getAllStoryData();
                    // $categoryDataArray = $category->categoryDetails();
                    
                    foreach($storyDataArray as $key => $values){

                        echo "<tr> 
                                <td>". $key+1 ."</td>
                                <td><a href='adminallstoryview.php?category_id={$values['category_id']}' >{$values['category_title']}</a></td>
                                <td><a href='adminstoryview.php?story_id={$values['story_id']}' >{$values['story_title']}</a></td> 
                                <td>{$values['created_at']}</td>
                                <td>{$values['updated_at']}</td>
                                <td>{$values['deleted_at']}</td>
                                <td><a class='btn btn-primary' href='updatestoryform.php?story_id={$values['story_id']}&status=1' >Update</a></td>";
                                if(empty($values['deleted_at'])){
                                    echo "<td><a class='btn btn-danger' onclick=\"return confirm('Do you want to delete the category')\" href='deleteStory.php?story_id={$values['story_id']}&status=1' >Delete</a></td>";   
                                }
                                else{
                                    echo "<td></td><td></td>";   
                                }
                                
                        echo "</tr>";
                        
                    }
                ?>    
                </tbody>
            </table>
        </div>


    </main>

<?php

    require_once('../footer.php');

    if(isset($_SESSION['updatestory'])){
        unset($_SESSION['updatestory']);
        echo "<script> alert('story updated successfully!') </script>";
    }
    elseif(isset($_SESSION['storydelete'])){
        unset($_SESSION['storydelete']);
        echo "<script>alert('story deleted successfully!')</script>";
    }
?>
</body>
</html>

