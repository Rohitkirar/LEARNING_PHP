<header>
        <div class="logo" >A</div>
        <div class="logo" >User Dashboard</div>
        <div class="logo" >Welcome, <?php echo $_SESSION['username'] ?></div>
        <div class="search">
            <input type="text" placeholder="Search...">
        </div>
</header>
<nav>
    <ul >
        <li><a href="user.php" style="text-decoration: none; color:white;">Dashboard</a></li>
        <li><a href="user.php" style="text-decoration: none; color:white">Home</a></li>
        <li><a href="allStoryView.php" style="text-decoration: none; color:white">All Story</a></li>
        <li><a href="../common/logout.php" style="text-decoration: none; color:white;" >Logout</a></li>
    </ul>
</nav>