<?php
require __DIR__ . '/settings.php';

session_start();

$con = con();

if (!$con) {
    die_with_error("Error connecting to Database Server");
}

$post_id = (isset($_GET['post_id'])) ? abs(intval($_GET['post_id'])) : 0;

$post = get_post($con, $post_id);


if (!$post_id || !$post) {
    header("Location: index.php");
    exit;
}

/* Request to handle post comment form by checking if the length of the post array is equal to 1, 
since there's only 1 field (comment) that is sent with this post request */
if ($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) == 1) {
    // echo "<pre>";
    // var_dump($_SERVER);
    // echo "==================================================";
    // var_dump($_POST);
    // echo "</pre>";
    $comment = $_POST['comment'];
    date_default_timezone_set("Africa/Lagos");
    $created_at = date("Y-m-d H:i:s");
    $result = comment_on_post($con, $comment, 1, $created_at, $post_id);
}

/* Request to handle login form by checking if the email attribute is set in the post array */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    include APP_PATH . '/includes/login.php';
}

/* Request to handle logout comment form by checking if the length of the post array is equal to 0, 
since there's no attribute that is sent with this post request */
if ($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) == 0) {
    include APP_PATH . '/includes/logout.php';
}

$comments = get_comments($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php __($post['title']) ?></title>
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
        <div class="post">
            <h1 class="post-title"><a href=""><?php __($post['title']) ?></a></h1>
            <p class="post-content"><?php __($post['content']) ?></p>

            <div class="post-meta">
                <div>Published on 12/01/2020 by @aj </div>
                <div>2 likes <a class="comment" id="comment-id" href="post.php?post_id=<?php __($post['id']) ?>"> <?php echo count_comments_per_post($con, $post['id']) ?> comments</a></div>
            </div>

        </div>

        <div>
            <?php

            foreach ($comments as $comment) :
                if ($post_id == $comment['post_id']) :
            ?>
                    <div class="post-meta comment-wrapper">
                        <div class="comment">
                            <p class="post-comment"><?php __($comment['comment']) ?></p>
                            <?php
                            $time = strtotime($comment['created_at']);
                            $myFormatForView = date("F j, Y, g:i a", $time);
                            ?>
                            <div><?php echo $myFormatForView ?></div>
                        </div>
                    </div>
            <?php endif;
            endforeach; ?>
        </div>

        <form method="post" action="" class="post-comment">
            <input type="text" name="comment" id="post-comment" placeholder="Comment on this post..." required>
            <button>Comment</button>
        </form>

    </section>

    <script src="assets/script/app.js"></script>
</body>

</html>