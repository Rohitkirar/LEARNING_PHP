<link rel="stylesheet" href="../../public/css/adminnavbar.css">
<div class="nav_div shadow-lg bg-white" >
    <header class='headertag'>
        <div class="logo" ><img src="../../uploads/icons8-admin-48.png" alt="admin-img">Admin</div>
        
        <div class="logo" style="text-align:center"><img  src="../../uploads/blogger-logo-icon-png-10168.png" style="height:12% ; width:12%"></div>
        
        <div class="logo" >
            Welcome, <?php echo $userData['full_name'] ?>
            <a class='btn' href="../common/logout.php?LogoutSuccess=true"><img src="../../uploads/icons8-logout-32.png" alt="logout"></a>
        </div>
    </header>
    <div class='navbar navbar-expand-lg'>
            <a class='navbar-brand' href="admin.php" >Home</a></li>
            <a class='navbar-brand' href="adminallstoryview.php" >All Stories</a>
            <a class='navbar-brand' href="../user/user.php" >User DashBoard</a>
            <a class='navbar-brand' href="alluserdetails.php" >User Details</a>
            <a class='navbar-brand' href="categorydetails.php" >Category Details</a>
            <!-- <a class='navbar-brand' href="addstoryform.php" >Add Story</a>
            <a class='navbar-brand' href="addcategoryform.php" >Add Category</a> -->
    </div>
</div>