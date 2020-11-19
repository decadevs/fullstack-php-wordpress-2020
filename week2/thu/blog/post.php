<?php
session_start();
    require __DIR__ . '/settings.php';
    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    //Logout button
    if (array_key_exists('logout', $_POST)) {
        logout();
    }

    $post_id = (isset($_GET['post_id'])) ? abs(intval($_GET['post_id'])) : 0;

    //get post
    $post = get_post($con, $post_id);
    //get user
    $author = get_user($con, $post['user_id']);

    if(!$post_id || !$post) {
        header("Location: index.php");
        exit;
    }

    //add comment if user login
    $err = "";
    $data = [];
    if(isset($_SESSION['id']) && array_key_exists('submit', $_POST) && !empty($_POST['comment'])){
        $data['user_id'] = $_SESSION['id'];
        $data['post_id'] = $post_id;
        $data['message'] = clean($_POST['comment']);
        $outcome = create_comment($con, $data);
    }
    elseif(array_key_exists('submit', $_POST) && !isset($_SESSION['id'])){
        $err .= 'Comment are for members only, login or sign up to add comment';
    }
    elseif(array_key_exists('submit', $_POST) && empty($_POST['comment'])){
        $err .= 'Kindly enter your comment';
    }

    //get comments
    $comments = get_comments($con, $post_id);

    include APP_PATH . '/includes/htmlhead.php'
?>

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
    <?php
        if(!empty($err)){
            echo '<div class="alert alert-danger" role="alert">'.nl2br($err).'</div>';
        }
    ?>
    <form class="commentFrm" action="" method="post">
        <div class="form-group">
            <label for="Create Post">Add Comment</label>
            <textarea class="form-control" id="Create Post" name="comment" rows="3"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Create Comment</button>
    </form>
</section>

<section class="containers section">
    <h5>Comment:</h5>
    <div class="commentHolder">
<?php foreach($comments as $comment){
    $myName = get_user($con, $comment['user_id']);
    ?>
    <div class="comment">
        <?php echo '<div class="commentName"><strong>comment by '.$myName['name'].'</strong></div>' ?>
        <?php echo $comment['message'] ?>
    </div>
<?php } ?>
    </div>
</section>
    
</body>
</html>
