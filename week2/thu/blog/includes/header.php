<header class="container">

    <div>
        <h1><a href="index.php">XiReader</a></h1>
        <span>Open, Know, Repeat</span>
    </div>

    <nav>
       <?php
        if(isloggedin()):?>
        <a href="/logout.php">Logout</a>
        <a href="/new_post.php">Admin post</a>

        <?php else: ?>
         <a href="/login.php">Login</a>
        <a href="/signup.php">Join</a>
        <?php endif ?>

    </nav>
</header>