<?php
    session_start();
    require __DIR__ . '/settings.php';

    //Logout button
    if (array_key_exists('logout', $_POST)) {
        logout();
    }

    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    $posts = get_posts($con);
    $subCount = 300;

    include APP_PATH . '/includes/htmlhead.php'

?>

<body>

<?php include APP_PATH . '/includes/header.php' ?>

<section class="containers section">
    <?php foreach($posts as $post):
        $author = get_user($con, $post['user_id']);
        //length of content
        $contentCount = strlen($post['content']);
        $subString = substr($post['content'], 0, $subCount);
        $content = substr($subString, 0, strrpos($subString, ' '));
        ?>
    <div class="post">
        <h1 class="post-title"><a href="post.php?post_id=<?php __($post['id']) ?>"><?php __($post['title']) ?></a></h1>
        <p class="post-content"><?php $subCount < $contentCount ? __($content. '... ') : __($content. ' ') ?><a href="post.php?post_id=<?php __($post['id']) ?>" class="readmore">Read more</a></p>

        <div class="post-meta">
            <div>Published on <?php __($post['created_at'] . ' by '). __($author['name']) ?></div>
            <div>2 likes    <?php __(count_post($con, $post['id']))?> comment</div>
        </div>
    </div>
    <?php endforeach; ?>

</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>