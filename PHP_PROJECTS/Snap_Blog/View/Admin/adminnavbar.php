<?php $userDetails = $user->userDetails($_SESSION['user_id']);  ?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    
    <a class="navbar-brand" style="width:10% ; height:10%;" href="#">
        <img src="../../upload/snapchat.png" style="width:25% ; height:25%;" alt="">
        <span  style="color:white">ɮʟօɢ</span>
    </a>
    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" >
            <li class="nav-item active">
                <a class='nav-link' style="color:white"  href="admin.php" >Home</a></li>
            </li>
            <li class="nav-item">
                <a class='nav-link' style="color:white" href="adminallstoryview.php" >All Story</a>
            </li>
            <!-- <li class="nav-item">
                <a class='nav-link' style="color:white" href="../user/user.php" >User DashBoard</a>
            </li> -->
            <li class="nav-item">
                <a class='nav-link' style="color:white" href="alluserdetails.php" >User DashBoard</a>
            </li>
            <li class="nav-item">
                <a class='nav-link' style="color:white" href="categorydetails.php" >Category DashBoard</a>
            </li>
        </ul>
    </div>
    <div>
        <img src="../../Upload/icons8-admin-48.png" style="height: 100% ; width:100%;" alt="">
    </div>
    <div class="d-flex" style="color:white">
        
        <div class="p-1"><?php echo "Welcome, ". $userDetails[0]['first_name'] . ' ' . $userDetails[0]['last_name']; ?></div>

        <a class="my-2 my-sm-0" href="../logout.php?success=true"><img src="../../Upload/icons8-logout-32.png" style="height: 100% ; width:100%;" alt=""></a>
    </div>
</nav>    
