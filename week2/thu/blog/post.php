<?php 
    require __DIR__ . '/settings.php';
    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    $post_id = (isset($_GET['post_id'])) ? abs(intval($_GET['post_id'])) : 0;

    $post = get_post($con, $post_id);
    $author = get_user($con, $post['user_id']);

    if(!$post_id || !$post) {
        header("Location: index.php");
        exit;
    }

   
?>
<?php include APP_PATH . '/includes/htmlhead.php' ?>
<body>

<?php include APP_PATH . '/includes/header.php' ?>


<section class="containers section">
    <div class="post">
        <h1 class="post-title"><?php __($post['title']) ?></h1>
        <p class="post-content"><?php __($post['content']) ?></p>
   
        <div class="post-meta">
            <div>Published on <?php __($post['created_at'] . ' by ') . __($author['name'])?> </div>
            <div>2 likes    <?php __(count_post($con, $post_id))?> comment</div>
        </div>
    </div>

</section>

<section class="containers section">
    <form action="" method="post">
        <div class="form-group">
            <label for="Create Post">Comment</label>
            <textarea class="form-control" id="Create Post" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Comment</button>
    </form>
</section>
    
</body>
</html>
