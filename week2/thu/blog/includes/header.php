<header class="container">

    <div>
        <h1><a href="index.php">XiReader</a></h1>
        <span>Open, Know, Repeat</span>
    </div>

    <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) : ?>
        <nav>
            <form action="" method="post">
                <button>Logout</button>
            </form>
        </nav>

    <?php else : ?>
        <nav>
            <button class="login-modal">Login</button>
            <button class="login-modal">Join</button>
            <?php if (!empty($error)) : ?>
                <p class="error-msg"> <?= $error ?></p>
            <?php endif; ?>
            <!-- <a href="">Login</a>
            <a href="">Join</a> -->
        </nav>
    <?php endif ?>
</header>