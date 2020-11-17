<?php 
    require __DIR__ . '/settings.php';

    session_start();
    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    $post_id = (isset($_GET['post_id'])) ? abs(intval($_GET['post_id'])) : 0;

    $post = get_post($con, $post_id);


    if(!$post_id || !$post) {
        header("Location: index.php");
        exit;
    }

    $comment_total=count_comment($con, $post_id);
    $author_id = getAuthor($con, $post_id);
    $author = getUser($con, $author_id);
    

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(!empty($_POST['comment'])){
            $comment = clean($_POST['comment']);
            $user_id = (int)$_SESSION['user_id'];

            $data = ["comment"=>$comment, "post_id"=>$post_id, "user_id"=>$user_id];
            var_dump($data);

            create_comment($con, $data);  
        }
        $comment_total = count_comment($con, $post_id);
        
    }

    $comments = get_comments($con, $post_id);


   
?>

<?php include APP_PATH . '/includes/header.php' ?>


<section class="container section">
    <div class="post">
        <h1 class="post-title"><a href=""><?php __($post['title']) ?></a></h1>
        <p class="post-content"><?php __($post['content']) ?></p>

        <div class="post-meta">
            <div>Published <?php __(get_current_date($post['created_at'])) ?> by <?php __($author)?> </div>
            <div>2 likes    <?php __($comment_total) ?> comment</div>
        </div>
        
        <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']): ?>
        <div class="comment-box">
            <form method=POST>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" id="comment-label">Leave a comment</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="comment" required></textarea>
                </div>
                <button type="submit" class="btn btn-outline-*" id="button">Submit</button>
            </form>
        </div>
        <?php  else: ?>
            <br/><br/><h6 id="comment-label">Comments</h6>
        <?php  endif; ?>


        <div class="comment-box">


            <?php foreach($comments as $comment): ?>
            <div class="comment">
                <p class="post-content"><?php __($comment['comment']) ?></p>
        
                <div class="post-meta">
                    <div>Published <?php __(get_current_date($comment['created_at'])) ?> by  <?php __(getUser($con, $comment['user_id'])) ?></div>
                    <div>2 likes</div>
                </div>
            </div>
            <?php endforeach; ?>

            </div>

    </div>

</section>
    
<?php include APP_PATH . '/includes/footer.php' ?>