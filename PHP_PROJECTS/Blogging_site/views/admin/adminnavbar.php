<style>

    header {
    width:100%;
    height: 5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    /* background-color: #333; */
    color: #fff;
}
    .navbar{
        padding:5px;
        height: 2.8rem;
    }
    .navbar a{
        font-size:medium;
        text-decoration: none;
        color:white;
        padding:1px;
        margin-right: 2rem;
        font-weight: bold;
    }
    .navbar a:hover{
        cursor: pointer;
        color:black;
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
    /* background-color: #333; */
    color: #fff;
    text-align: center;
    padding: 10px;
    }



</style>
<header class='headertag'>
    <div class="logo" ><img src="../../uploads/icons8-admin-48.png" alt="admin-img">Admin</div>
    
    <div class="logo" style="text-align:center"><img  src="../../uploads/blogger-logo-icon-png-10168.png" style="height:12% ; width:12%"></div>
    
    <div class="logo" >
        Welcome, <?php echo $userData['full_name'] ?>
        <a class='btn' href="../common/logout.php"><img src="../../uploads/icons8-logout-32.png" alt="logout"></a>
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
