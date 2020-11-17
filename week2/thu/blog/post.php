<?php 
    require __DIR__ . '/settings.php';
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

    $comment_count = count_comment($con, $post_id);
    $author = getUser($con, $post['user_id']);
    $published_date = get_comment_date($post['created_at']);


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['submit']) && !empty($_POST['comment'])){
            $comment = $_POST['comment'];
            $user_id = 1;

            $data = array("comment"=>$comment, "post_id"=>$post_id, "user_id"=>$user_id);

            create_comment($con, $data);  
        }
        $comment_count = count_comment($con, $post_id);
        
    }


    

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
            <?php __("<div>Published on $published_date by @$author </div>") ?>
            <div>2 likes    <?php __($comment_count) ?> comment</div>
        </div>
    </div>
     
    <?php if(isloggedin()) include APP_PATH . '/includes/comment_form.php' ?>

    <?php 
    $comments = get_comments($con, $post_id);

    if($comments){ ?>
    <div id="comment-section">

        <?php foreach($comments as $comment): ?>

    <div class="comment"><?php __($comment['comment']) ?> </div>
    <div class="comment-info">
    <span class="date"><?php __(get_comment_date($comment['created_at'])); ?>  </span>
    <span class="time"><?php __(get_comment_time($comment['created_at'])); ?> </span>
    <span class="cauthor"><?php __(getUser($con, $comment['user_id'])); ?> </span>
    </div>

    <?php endforeach ?>
    </div>
        
    <?php }?> 


</section>
    
</body>
</html>