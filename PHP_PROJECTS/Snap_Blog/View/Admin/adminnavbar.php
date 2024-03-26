<!-- <link rel="stylesheet" href="../../public/css/adminnavbar.css">     -->
<style>
     .headertag{
    /* Header styles */
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color:transparent;
    }
        /* .navbar{
            padding:5px;
            height: 2.8rem;
        } */
        .navbar a{
            font-size: medium;
            text-decoration: none;
            color:black;
            /* padding:1px; */
            margin-right: 2rem;
            font-weight: bold;
        }
        .navbar a:hover{
            cursor: pointer;
            color:darkblue;
            /* background-color: darkgray; */
        }
</style>
<div class="nav_div shadow-lg bg-white " >
    <?php $userData = $user->userDetails($_SESSION['user_id']) ?>
    <header class='headertag'>
        <div class="logo" ><img src="../../upload/icons8-admin-48.png" alt="admin-img">Admin</div>
        
        <div class="logo" style="text-align:center"><img  src="../../upload/blogger-logo-icon-png-10168.png" style="height:12% ; width:12%"></div>
        
        <div class="logo" >
            Welcome, <?php echo $userData[0]['first_name'] . " " . $userData[0]['last_name'] ?>
            <a class='btn' href="../logout.php?LogoutSuccess=true"><img src="../../upload/icons8-logout-32.png" alt="logout"></a>
        </div>
    </header>
    <div class='navbar navbar-expand-lg'>
            <a class='navbar-brand' href="admin.php" >Home</a></li>
            <a class='navbar-brand' href="adminallstoryview.php" >All Stories</a>
            <a class='navbar-brand' href="../user/user.php" >User DashBoard</a>
            <a class='navbar-brand' href="alluserdetails.php" >User Details</a>
            <a class='navbar-brand' href="categorydetails.php" >Category Details</a>
    </div>
</div>
