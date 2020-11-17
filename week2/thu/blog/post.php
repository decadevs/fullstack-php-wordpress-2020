<?php
    require __DIR__ . '/settings.php';
    session_start();
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        create_comment($con, ['post_id'=>$post_id, 'comment'=>htmlspecialchars($_POST["comment"]), 'user_id'=>$_SESSION['id']]);
    }
    $comments = get_comment($con, $post_id);
    $no_comments = count_comments($con, $post_id);
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php __($post['title']) ?></title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />   
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>

    <?php include APP_PATH . '/includes/header.php' ?>


        <section class="container section">
            <p>You are logged in <a href="logout.php">logout</a></p>
            <div class="post">
                <h1 class="post-title"><a href=""><?php __($post['title']) ?></a></h1>
                <p class="post-content"><?php __($post['content']) ?></p>
        
                <div class="post-meta">
                    <div>Published on 12/01/2020 by @aj </div>
                    <div>2 likes    <span><?php echo $no_comments.' comment(s)'?></span></div>
                </div>
            </div>
            
            <div class="col-md-6 col-md-offset-3 comments-section">
                <form class="clearfix" method="post">
                    <label for="comment">comment</label>
                    <textarea class="form-control" name="comment" id="comment" rows="4" cols="50" required></textarea>
                    <button class="btn btn-primary btn-sm pull-right" type="submit">Submit</button>
                </form>
            </div>
            
            <div id="comments-wrapper">
            <div class="comment clearfix">
            <?php foreach($comments as $comment): ?>
                
                <div class="comment-details">
                    
                    <span class="comment-name"><?php echo (get_username($con, $comment["user_id"]))['name']?></span>
                    
                    <span class="comment-date"><?php echo $comment["created_at"]?></span>
                    <p class="comment_content"><?php __($comment["comment"])?></p>
                    <br/>
                    
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>  
    </body>
</html>