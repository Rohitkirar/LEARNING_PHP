<header>
    <div class="logo" >A</div>
    <div class="logo" >Admin Dashboard</div>
    <div class="logo" >Welcome, <?php echo $_SESSION['username'] ?></div>
    <div class="search">
        <input type="text" placeholder="Search...">
    </div>
</header>
<nav>
    <ul>
        <li>Dashboard</li>
        <li><a href="admin.php" style="text-decoration: none; color:white">Home</a></li>
        <li><a href="adminallstoryview.php" style="text-decoration: none; color:white">All Stories</a></li>
                <!-- <li>Products</li>
                <li>Settings</li> -->
        <li><a href="addstoryform.php" style="text-decoration: none; color:white">Add Story</a></li>
        <li><a href="../common/logout.php" style="text-decoration: none; color:white">Logout</a></li>
    </ul>
</nav>