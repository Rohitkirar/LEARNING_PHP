<link rel="stylesheet" href="../../public/css/usernavbar.css">
<div class="nav_div shadow-lg bg-white" >
    <div class='headertag d-flex' style="align-items:center; justify-content:space-between;">
            <div class="logo" style="color:black" ><img src="../../uploads/icons8-user-50 (1).png"  alt="user-img">User</div>

            <div class="logo" style="text-align: center;"><img src="../../uploads/blogger-logo-icon-png-10168.png" style="height:12% ; width:12%"></div>
            
            <div class="logo" style="color:black" >
                Welcome, <?php echo $userData['full_name'] ?>
                <a class='btn' href="../common/logout.php?LogoutSuccess=true" ><img src="../../uploads/icons8-logout-32.png" alt="logout"></a>
            </div>
    </div>
    <div class='navbar navbar-expand-lg '>
            <a href="user.php" style="text-decoration: none; ">Home</a>
            <?php 
                if($userData['role'] == 'admin'){
                    echo "<a href='../admin/admin.php' style='text-decoration: none;'>Admin Dashboard</a>";
                }
            ?>
            <a href="allStoryView.php" style="text-decoration: none; ">All Story</a>
            <a href="Edit_Info.php" style="text-decoration: none; ">Edit Info</a>
            <a href="updatepassword.php" style="text-decoration: none; ">change Password</a>
            <!-- <a href="../common/logout.php" style="text-decoration: none; color:white;" >Logout</a> -->
    </div>
</div>