<style>
    .headertag{
        width:100%;
        height: 5rem;
        background-color:silver;
    }
    .navbar{
        padding:5px;
        background-color:grey;
        height: 2.8rem;
    }
    .navbar a{
        text-decoration: none;
        color:white;
        padding:1px;
    }
    .navbar a:hover{
        cursor: pointer;
        color:white;
        background-color: darkgray;
    }
    .card {
        flex: 1;
        padding: 10px;
        background-color: #f0f0f0;
        border-radius: 5px;
    }
    main {
    margin-left: 10px;
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
    
    <div class="logo" >Admin Dashboard</div>
    <div class="logo" style="text-align: center;"><img src="../../uploads/blogger-logo-icon-png-10168.png" style="height:12% ; width:12%"></div>
    <div class="logo" >
        Welcome, <?php echo $userData['full_name'] ?>
        <a class='btn' href="../common/logout.php" ><img src="../../uploads/icons8-logout-32.png" alt="logout"></a>
    </div>
</header>
<div class='navbar bg-dark navbar-expand-lg'>
        <a class='navbar-brand' href="admin.php" >Home</a></li>
        <a class='navbar-brand' href="adminallstoryview.php" >All Stories</a>
        <a class='navbar-brand' href="../user/user.php" >User DashBoard</a>
        <a class='navbar-brand' href="alluserdetails.php" >User Details</a>
        <a class='navbar-brand' href="categorydetails.php" >Category Details</a>
        <!-- <a class='navbar-brand' href="addstoryform.php" >Add Story</a>
        <a class='navbar-brand' href="addcategoryform.php" >Add Category</a> -->

</div>
