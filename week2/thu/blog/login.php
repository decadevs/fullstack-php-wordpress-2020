<?php
    require __DIR__ . '/settings.php';

    include APP_PATH . '/includes/htmlhead.php'
?>

<body>

<?php include APP_PATH . '/includes/header.php' ?>

<section class="containers section">
    <form action="" method="post">

        <div class="form-group">
            <label for="email">Enter Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email">
        </div>

        <div class="form-group">
            <label for="password">Enter Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</section>

</body>
</html>
