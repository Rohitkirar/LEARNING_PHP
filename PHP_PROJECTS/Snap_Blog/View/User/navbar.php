
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    
    <a class="navbar-brand" style="width:10% ; height:10%;" href="#">
        <img src="../../upload/snapchat.png" style="width:25% ; height:25%;" alt="">
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
                <a class="nav-link"  style="color:white" href="editUserdetails.php">Edit Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="updatepassword.php">Change Password</a>
            </li>
        </ul>
    </div>
    <div class="form-inline my-2 my-lg-0 d-flex">
        
        <?php echo "Welcome ". $userDetails['first_name'] . ' ' . $userDetails['last_name']; ?>

        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </div>
</nav>    
