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

    $postComments = get_comments($con, $post_id);
    
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isValid($_POST['content'])){
       $comment = create_comment($con, $_POST);
        array_push($postComments, $comment);
    }

    $commentCount = count_comments($con, $post_id);
   
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
            <div>2 likes  
                <?php __($commentCount); 
                    $commentCount > 1 ? __(" comments") : __(" comment");
                ?>
            </div>
        </div>
        <div class="form-area">
            <form action="" method="post">
                <textarea name="content"></textarea>
                <input type="hidden" name="user_id" value='1'>
                <input type="hidden" name="post_id" value='<?php __($post_id)?>'>
                <button type="submit">Add Comment</button>
            </form>
        </div>
        <?php if(!empty($postComments)): ?> 
        <div class="post-comments">
            <?php foreach ($postComments as $postComment): ?>    
            <div class="post-comment">
                <div class="comment-header">
                    <h6><strong>John Doe</strong></h6>
                    <h6><?php __($postComment['created_at']) ?></h6>
                </div>
                <p><?php __($postComment['content']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>   
    </div>

</section>
    
</body>
</html>