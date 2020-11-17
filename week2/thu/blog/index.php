<?php 
    require __DIR__ . '/settings.php';
    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errorMsg = '';
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'user_id' => 1
        ];
        create_post($con, $data);
    }
    
    $post_id = (isset($_GET['post_id'])) ? abs(intval($_GET['post_id'])) : 0;

    $posts = get_posts_with_comment_count($con);
       
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XiReader</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">   
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include APP_PATH . '/includes/header.php' ?>


<section class="container section">
    <?php foreach($posts as $post): ?>
    <div class="post">
        <h1 class="post-title"><a href="post.php?post_id=<?php __($post['id']) ?>"><?php __($post['title']) ?></a></h1>
        <p class="post-content"><?php __($post['content']) ?></p>
   
         <div class="post-meta">
            <div>Published on <?php __($post['created_at']) ?> by @ 
            <?php
                echo __($post['name']);?> </div>
            <div>2 likes 
            <?php if(($post['comments_count']) < 2) {
                echo $post['comments_count'] . ' ' . "comment";
            } else {
                echo $post['comments_count'] . ' ' . "comments";
            } ?>
            </div>
        </div>
    </div>

    <?php endforeach; ?>


</section>
    
</body>
</html>