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
            <?php $name = get_loggedin_username($con, $_SESSION['current_user']); ?>
            <p class="display-username"><?php echo $name[0]["name"]; ?></p>
        </nav>

    <?php else : ?>
        <nav>
            <button id="login-modal">Login</button>
            <button id="join-modal">Join</button>
            <?php if (!empty($error)) : ?>
                <p class="error-msg"> <?= $error ?></p>
            <?php endif; ?>
            <?php if (!empty($successMsg)) : ?>
                <p class="register-success-msg"> <?= $successMsg ?></p>
            <?php endif; ?>
            <!-- <a href="">Login</a>
            <a href="">Join</a> -->
        </nav>
    <?php endif ?>
</header>