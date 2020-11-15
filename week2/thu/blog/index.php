<?php 
    require __DIR__ . '/settings.php';
    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    $posts = get_posts($con);

    // $data = array(
    //     'name' => 'Olatunji',
    //     'password' => 'password',
    //     'email' => 'olatunji@gmail.com'
    // );
    // create_user($con, $data);

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
<section>
        
</section>

<section class="container section">
    <div>
        <form action="">
            <textarea class="text-post" name="text" id="text" cols="30" rows="10"></textarea>
            <input type="submit" value="Publish Post" class="btn">
        </form>
    </div>
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
            <div>2 likes    1 comment</div>
        </div>
    </div>
    <?php endforeach; ?>

</section>
    
</body>
</html>