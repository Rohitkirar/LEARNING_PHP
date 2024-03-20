<style>
.headertag{
        width:100%;
        height: 5rem;
        background-color:transparent;
    }
    .navbar{
        padding:5px;
        /* background-color:grey; */
        height: 2.8rem;
    }
    .navbar a{
        font-size: medium;
        text-decoration: none;
        color:white;
        padding:1px;
        margin-right: 2rem;
        font-weight: bold;
    }
    .navbar a:hover{
        cursor: pointer;
        color:white;
        /* background-color: darkgray; */
    }
    .card {
        flex: 1;
        padding: 10px;
        background-color: #f0f0f0;
        border-radius: 5px;
    }
    main {
    margin: 10px;
    padding: 20px;
    }
    footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
    }
</style>
<header class='headertag'>
        <div class="logo" ><img src="../../uploads/icons8-user-50 (1).png"  alt="user-img">User</div>

        <div class="logo" style="text-align: center;"><img src="../../uploads/blogger-logo-icon-png-10168.png" style="height:12% ; width:12%"></div>
        
        <div class="logo" >
            Welcome, <?php echo $userData['full_name'] ?>
            <a class='btn' href="../common/logout.php?LogoutSuccess=true" ><img src="../../uploads/icons8-logout-32.png" alt="logout"></a>
        </div>
</header>
<div class='navbar navbar-expand-lg'>
        <a href="user.php" style="text-decoration: none; color:white">Home</a>
        <?php 
            if($userData['role'] == 'admin'){
                echo "<a href='../admin/admin.php' style='text-decoration: none; color:white'>Admin Dashboard</a>";
            }
        ?>
        <a href="allStoryView.php" style="text-decoration: none; color:white">All Story</a>
        <a href="Edit_Info.php" style="text-decoration: none; color:white">Edit Info</a>
        <a href="updatepassword.php" style="text-decoration: none; color:white">change Password</a>
        <!-- <a href="../common/logout.php" style="text-decoration: none; color:white;" >Logout</a> -->
</div>