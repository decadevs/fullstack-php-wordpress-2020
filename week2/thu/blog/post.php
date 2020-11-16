<?php
require __DIR__ . '/settings.php';
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST['comment'];
    $created_at = date("Y-m-d H:i:s");
    $result = comment_on_post($con, $comment, 1, $created_at, $post_id);
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
            <input type="text" name="comment" id="post-comment" placeholder="Comment on this post...">
            <button>Comment</button>
        </form>

    </section>

</body>

</html>