<?php 
    require __DIR__ . '/settings.php';

    session_start();

    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    $posts = get_posts($con);

?>


<?php include APP_PATH . '/includes/header.php' ?>



<?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']): ?>


    <section class="container section-button" >
        <div>
        <a href="new_post.php">
            <button type="button" class="btn btn-outline-*" id="button">
                New post
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </button>
            </a>
        </div>
    </section>

<?php  endif; ?>



<section class="container section">
    <?php foreach($posts as $post): ?>
    <div class="post">
        <h1 class="post-title"><a href="post.php?post_id=<?php __($post['id']) ?>"><?php __($post['title']) ?></a></h1>
        <p class="post-content"><?php __($post['content']) ?></p>
   
        <div class="post-meta">
            <div>Published <?php __(get_current_date($post['created_at'])) ?> by <?php __(getUser($con, $post['user_id'])) ?></div>
            <div>2 likes    <?php __(count_comment($con, $post['id'])) ?> comment</div>
        </div>
    </div>
    <?php endforeach; ?>

</section>

<?php include APP_PATH . '/includes/footer.php' ?>