<?php 
    require __DIR__ . '/settings.php';
    session_start();
    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    $isLogedIn = $_SESSION['user_islogedin'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // The request is using the POST method
        $post = array(
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'user_id' => $_SESSION['user_id']
        );
        create_post($con, $post);
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
</head>
<body>

<?php include APP_PATH . '/includes/header.php' ?>

<section class="container section">
    <?php
    if ($_SESSION['user_email'] === "Oye@gmail.com" && $isLogedIn) { ?>
    <div>
        <form id="form" action="index.php" method="post" enctype="multipart/form-data">
            <textarea class="post-title" placeholder="enter post title here..." name="title" id="title" cols="30" rows="10"></textarea>
            <textarea class="text-post" placeholder="enter post Content here..." name="content" id="content" cols="30" rows="10"></textarea>
            <input type="submit" value="Publish Post" class="btn">
        </form>
    </div>
    <?php } ?>
    <?php foreach($posts as $post): ?>
    <div class="post">
        <h1 class="post-title"><a href="post.php?post_id=<?php __($post['id']) ?>"><?php __($post['title']) ?></a></h1>
        <p class="post-content"><?php __($post['content']) ?></p>
   
        <div class="post-meta">
            <div>Published on <?php __($post['created_at']) ?> by @<?php 
            $user_id = $post['user_id'];
            $user = get_user($con, $user_id);
            echo __($user['name']);
            ?> </div>
            <div>2 likes    <a href="post.php?post_id=<?php __($post['id']) ?>" ><?php
            $post_id = $post['id'];
            
            $comment_count = get_comment_count($con, $post_id);
            if ($comment_count['count'] < 2) {
                echo $comment_count['count'];
                echo " comment";
            }else{
                echo $comment_count['count'];
                echo " comments";
            }
            ?></a> </div>
        </div>
    </div>
    <?php endforeach; ?>

</section>
</body>
</html>