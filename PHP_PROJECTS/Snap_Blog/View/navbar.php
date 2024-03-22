<?php if(isset($_SESSION['user'])){ ?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    
    <a class="navbar-brand" style="width:10% ; height:10%;" href="#">
        <img src="../upload/snapchat.png" style="width:25% ; height:25%;" alt="">
        <span  style="color:white">ɮʟօɢ</span>
    </a>

    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link"  style="color:white" href="user.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="allStoryView.php">All story</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="editdetails.php">Edit Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="updatepassword.php">Change Password</a>
            </li>
        </ul>
    </div>
    <div>
     
        <!-- <form action="#" method="POST" class="form-inline my-2 my-lg-0 d-flex">
            <input class="form-control mr-sm-2" style="margin-right:4px" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
</nav>    

<?php }?>

<?php if(isset($_SESSION['admin'])){ ?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    
    <a class="navbar-brand" style="width:10% ; height:10%;" href="#">
        <img src="../upload/snapchat.png" style="width:25% ; height:25%;" alt="">
        <span  style="color:white">ɮʟօɢ</span>
    </a>

    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link"  style="color:white" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="register.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="login.php">Login</a>
            </li>
        </ul>
    </div>
    <div>
     
        <!-- <form action="#" method="POST" class="form-inline my-2 my-lg-0 d-flex">
            <input class="form-control mr-sm-2" style="margin-right:4px" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
</nav>

<?php }?>

<?php if(!(isset($_SESSION['user']) || isset($_SESSION['admin']))){ ?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    
    <a class="navbar-brand" style="width:10% ; height:10%;" href="#">
        <img src="../upload/snapchat.png" style="width:25% ; height:25%;" alt="">
        <span  style="color:white">ɮʟօɢ</span>
    </a>

    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link"  style="color:white" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="register.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="login.php">Login</a>
            </li>
        </ul>
    </div>
    <div>
     
        <!-- <form action="#" method="POST" class="form-inline my-2 my-lg-0 d-flex">
            <input class="form-control mr-sm-2" style="margin-right:4px" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
</nav>

<?php  }?>

