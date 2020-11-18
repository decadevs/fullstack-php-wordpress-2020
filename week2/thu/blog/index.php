<?php
require __DIR__ . '/settings.php';

session_start();

$con = con();

if (!$con) {
    die_with_error("Error connecting to Database Server");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    include APP_PATH . '/includes/login.php';
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) == 0) {
    include APP_PATH . '/includes/logout.php';
}

$posts = get_posts($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XiReader</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php include APP_PATH . '/includes/header.php' ?>

    <!-- Modal Start -->
    <div class="modal-bg">
        <div class="modal">
            <h2>Login</h2>
            <form action="" method="post" class="auth-form">
                <div class="form-entry">
                    <label for="email">Email: </label>
                    <input type="email" name="email">
                </div>
                <div class="form-entry">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password">
                </div>
                <button>Enter</button>
            </form>
            <span class="modal-close">X</span>
        </div>
    </div>
    <!-- Modal End -->

    <section class="container section">
        <?php foreach ($posts as $post) : ?>
            <div class="post">
                <h1 class="post-title"><a href="post.php?post_id=<?php __($post['id']) ?>"><?php __($post['title']) ?></a></h1>
                <p class="post-content"><?php __($post['content']) ?></p>

                <div class="post-meta">
                    <div>Published on 12/01/2020 by @aj </div>
                    <div>2 likes <a class="comment" id="comment-id" href="post.php?post_id=<?php __($post['id']) ?>"> <?php echo count_comments_per_post($con, $post['id']) ?> comments</a></div>
                </div>

            </div>
        <?php endforeach; ?>

    </section>

    <script src="assets/script/app.js"></script>
</body>

</html>