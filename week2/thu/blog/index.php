<?php 
    require __DIR__ . '/settings.php';
    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    $posts = get_posts($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XiReader</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
    
<link rel="stylesheet" href="assets/css/style.css">
<script></script>
</head>
<body>

<?php include APP_PATH . '/includes/header.php' ?>


<section class="container section">
    <?php foreach($posts as $post): ?>
    <div class="post">
        <h1 class="post-title"><a href="post.php?post_id=<?php __($post['id']) ?>"><?php __($post['title']) ?></a></h1>
        <p class="post-content"><?php __($post['content']) ?></p>
   
        <div class="post-meta">
            <div>Published on 12/01/2020 by @aj </div>
            <div>2 likes    <a href="">1k comment</a></div>
        </div>

        <div>
            <!-- TODO: display comments from database in this div -->
        </div>

        <form method="post" action="" class="post-comment">
                <input type="text" name="post-comment" id="post-comment">
                <button>Comment</button>
        </form>

        <div class="comments">
            <div></div>
        </div>

    </div>
    <?php endforeach; ?>

</section>
    
</body>
</html>