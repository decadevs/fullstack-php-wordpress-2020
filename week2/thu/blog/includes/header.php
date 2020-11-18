<header class="container">

    <div>
        <h1><a href="index.php">XiReader</a></h1>
        <span>Open, Know, Repeat</span>
    </div>

    <nav>
        <?php
        $isLogedIn = $_SESSION['user_islogedin'];

        if ($_SERVER['REQUEST_URI'] === "/week2/thu/blog/login.php") {?>
            <a href="signup.php">Join</a>
        <?php }else if($_SERVER['REQUEST_URI'] === "/week2/thu/blog/signup.php") { ?>
            <a href="login.php">Login</a>
        <?php }else if($_SERVER['REQUEST_URI'] === "/week2/thu/blog/index.php" && $isLogedIn) { ?>
            <a href="logout.php">Logout</a>
        <?php }else if($_SERVER['REQUEST_URI'] === "/week2/thu/blog/index.php" && !$isLogedIn) { ?>
            <a href="login.php">Login</a>
        <?php }else { ?>
            <a href="index.php">Posts</a>
            <a href="logout.php">Logout</a>
        <?php } ?>
    </nav>
</header>