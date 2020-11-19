<header class="container">

    <div>
        <h1><a href="index.php">XiReader</a></h1>
        <span>Open, Know, Repeat</span>
    </div>

    <nav>
        <!-- Button trigger login modal -->
        <?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']): ?>
        <a href="logout.php">Logout</a>
        <?php else: ?>
        <a href="#" data-toggle="modal" data-target="#loginModal">Login</a>
        <a href="#" data-toggle="modal" data-target="#signUpModal">Join</a>
        <?php endif; ?>
    </nav>
</header>