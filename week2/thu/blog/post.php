<?php 
    require __DIR__ . '/settings.php';
    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    $post_id = (isset($_GET['post_id'])) ? abs(intval($_GET['post_id'])) : 0;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // The request is using the POST method
        $errorMsg = '';
        $post_id = clean($_POST['post_id']);
        $newComment = array(
            'post_id' => $post_id,
            'comment' => clean($_POST['comment']),
            'user_id' => clean($_POST['user_id'])
        );
        create_comment($con, $newComment);

        header("location: post.php?post_id=" . $post_id);
    }
    
    $post = get_post($con, $post_id);

    $comments = get_comments($con, $post_id);

    if(!$post_id || !$post) {
        header("Location: index.php");
        exit;
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
        <h1 class="post-title"><?php __($post['title']) ?></h1>
        <p class="post-content"><?php __($post['content']) ?></p>
   
        <div class="post-meta">
            <div>Published on <?php __($post['created_at']) ?> by @<?php 
            $user_id = $post['user_id'];
            $user = get_user($con, $user_id);
            echo __($user['name']);
            ?> </div>
            <div>2 likes    <?php
            $post_id = $post['id'];
            
            $comment_count = get_comment_count($con, $post_id);
            if ($comment_count['count'] < 2) {
                echo $comment_count['count'];
                echo " comment";
            }else{
                echo $comment_count['count'];
                echo " comments";
            }
            ?> </div>
        </div>
        <?php foreach($comments as $comment) { ?>
        <div class="comment">
            <p class="post-content"><?php __($comment['comment']); ?></p>
            
            <div class="post-meta">
                <div>Commented on <?php __($comment['created_at']); ?> by @<?php
                    $user_id = $comment['user_id'];
                    $user = get_user($con, $user_id);
                    echo __($user['name']);
                    ?> 
                </div>
                <div>2 likes </div>
             </div>
        </div>
        <?php } ?>
    </div>
    <div>
        <form id="form" action="post.php" method="post" enctype="multipart/form-data">
            <input class="hide" type="text" name="post_id" value="<?php echo $post_id ?>">
            <textarea class="text-comment" placeholder="enter comment here..." name="comment" id="content" cols="30" rows="10"></textarea>
            <input class="hide" type="text" name="user_id" value="<?php echo $user_id ?>">
            <input type="submit" value="Post Comment" class="btn">
        </form>
    </div>
</section>
    
</body>
</html>