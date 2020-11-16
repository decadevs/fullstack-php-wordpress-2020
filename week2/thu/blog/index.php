<?php 
    require __DIR__ . '/settings.php';
    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['content'])){
        create_post($con, $_POST);
    }
 
    $posts = get_posts($con);
    $postCount = count_post($con);
    echo $postCount;
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
</head>
<body>

<?php include APP_PATH . '/includes/header.php' ?>


<section class="container section">
    <div class="form-area">
        <form action="" method="post">
            <input type="text" name="title" id="" placeholder="post title">
            <textarea name="content" placeholder="Whats on your mind? "></textarea>
            <input type="hidden" name="user_id" value='1'>
            <button type="submit">Post</button>
        </form>
    </div> 
    <div class="post-area">
        <?php __($postCount); $postCount > 1 ? __(" posts") : __(" post"); ?>
        <?php foreach($posts as $post): ?>
        <div class="post">
            <h1 class="post-title"><a href="post.php?post_id=<?php __($post['id']) ?>"><?php __($post['title']) ?></a></h1>
            <p class="post-content"><?php __($post['content']) ?></p>
    
            <div class="post-meta">
                <div>Published on 12/01/2020 by @aj </div>
                <div>2 likes    1k comment</div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</section>

<section class="login">

</section>    
</body>
</html>