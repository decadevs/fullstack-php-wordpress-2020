<header class="container">

    <div>
        <h1><a href="index.php">XiReader</a></h1>
        <span>Open, Know, Repeat</span>
    </div>

    <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) : ?>
        <nav>
            <a href="auths/logout.php">Logout</a>
        </nav>
    <?php else : ?>
        <nav>
            <a href="auths/login.php">Login</a>
            <a href="">Join</a>
        </nav>
    <?php endif ?>
</header>