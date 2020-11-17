<header class="containers">

    <div>
        <h1><a href="index.php">XiReader</a></h1>
        <span>Open, Know, Repeat</span>
    </div>

    <nav>
        <?php
            if(!isset($_SESSION['id'])){
        ?>
            <a href="login.php">Login</a>
            <a href="signup.php">Join</a>
        <?php }
            else{
        ?>
            <form>
                <a href="createPost.php" class="btn btn-primary">Create Post</a>
                <button type="submit" name="logout" class="btn btn-primary">Logout</button>
            </form>
        <?php } ?>
    </nav>
</header>