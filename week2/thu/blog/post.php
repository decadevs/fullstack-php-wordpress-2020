<?php 
    require __DIR__ . '/settings.php';
    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    $post_id = (isset($_GET['post_id'])) ? abs(intval($_GET['post_id'])) : 0;

    $post = get_post($con, $post_id);

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $content = $_POST['content'];
        $created_at = date("Y-m-d H:i:s");
        $result = create_comment($con, $content, 1, $created_at, $post_id);
    } 
    
    if(!$post_id || !$post) {
        header("Location: index.php");
        exit;
    }
    
    $comments = get_comments($con, $post_id);

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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">   
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include APP_PATH . '/includes/header.php' ?>


<section class="container section">
    
    <div class="post">
        
        <h1 class="post-title"><a href="post.php?post_id=<?php __($post['id']) ?>"><?php __($post['title']) ?></a></h1>
        <p class="post-content"><?php __($post['content']) ?></p>

        <div class="post-meta">
            <div>Published on <?php __($post['created_at']) ?> by @ 
            <?php 
                $user_id = $post['user_id'];
                $user = get_user($con, $user_id);
                echo __($user['name']);?> </div>
            <div>2 likes 
            <?php if(($commentCount) < 2) {
                echo $commentCount . ' ' . "comment";
            } else {
                echo $commentCount . ' ' . "comments";
            } ?>
            </div>
        </div>
    </div>

<?php foreach($comments as $comment): ?>
        <div class="comment">
            <p class="post-content"><?php __($comment['content']); ?></p>
            
            <div class="post-meta">
                <div>Commented on <?php __($comment['created_at']); ?> by @ <?php
                    $user_id = $comment['user_id'];
                    $user = get_user($con, $user_id);
                    echo __($user['name']);
                    ?> 
                </div>
                <div>2 likes </div>
             </div>
        </div>
 <?php endforeach; ?>

    <div>
    <!-- comment form -->
                <form class="clearfix" action="" method="post" id="comment_form">
                    <h4>Post a comment:</h4>
                    <textarea name="content" id="content" class="form-control" cols="30" rows="3"></textarea>
                    <button class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit comment</button>
                </form>
    </div>
</section>
    
</body>
</html>