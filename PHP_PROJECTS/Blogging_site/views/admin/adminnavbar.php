<style>
    .headertag{
        width:100%;
        background-color:cadetblue;
    }
    .navbar{
        display: flex;
        padding:5px;
        background-color:grey;
        height: 100%;
    }
    .navbar a{
        text-decoration: none;
        color:white;
        font-size: larger;
        padding:10px;
    }
    .navbar a:hover{
        cursor: pointer;
        color:skyblue;
        font-size: larger;
        padding:10px;
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
    <div class="logo" >Welcome, <?php echo $_SESSION['username'] ?></div>
</header>
<div class='navbar bg-dark'>
        <a class='navbar-brand' href="admin.php" >Home</a></li>
        <a class='navbar-brand' href="adminallstoryview.php" >All Stories</a>
        <a class='navbar-brand' href="../user/user.php" >User DashBoard</a>
        <a class='navbar-brand' href="alluserdetails.php" >User Details</a>
        <a class='navbar-brand' href="categorydetails.php" >Category Details</a>
        <!-- <a class='navbar-brand' href="addstoryform.php" >Add Story</a>
        <a class='navbar-brand' href="addcategoryform.php" >Add Category</a> -->
        <a class='navbar-brand' href="../common/logout.php" >Logout</a>
</div>
