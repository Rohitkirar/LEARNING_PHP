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
        <div class="logo" >User Dashboard</div>
        <div class="logo" >Welcome, <?php echo $_SESSION['username'] ?></div>
</header>
<div class='navbar bg-dark'>
        <a href="user.php" style="text-decoration: none; color:white">Home</a>
        <a href="Edit_Info.php" style="text-decoration: none; color:white">Edit Info</a>
        <a href="allStoryView.php" style="text-decoration: none; color:white">All Story</a>
        <a href="../common/logout.php" style="text-decoration: none; color:white;" >Logout</a>
</div>