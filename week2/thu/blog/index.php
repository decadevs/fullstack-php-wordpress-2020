<?php 
    require __DIR__ . '/settings.php';
    session_start();

    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isValid($_POST['content'], $_POST['title'])){
        create_post($con, $_POST);
    }
 
    $posts = get_posts($con);
    $postCount = count_post($con);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>XiReader</title>
      <?php include APP_PATH . '/includes/assets/css-links.php'; ?>
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="assets/css/login.css">
  </head>
  <body>

    <?php include APP_PATH . '/includes/header.php' ?>

    <section class="container section">
        <?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']): ?>
        <div class="form-area">
            <form action="" method="post">
                <input type="text" name="title" id="" placeholder="post title">
                <textarea name="content" placeholder="Whats on your mind? "></textarea>
                <input type="hidden" name="user_id" value='1'>
                <button type="submit">Post</button>
            </form>
        </div>
        <?php endif; ?>

        <div class="post-area">
            <?php __($postCount); $postCount > 1 ? __(" posts") : __(" post"); ?>
            <?php foreach($posts as $post): ?>
            <div class="post">
                <h1 class="post-title"><a href="post.php?post_id=<?php __($post['id']) ?>"><?php __($post['title']) ?></a></h1>
                <p class="post-content"><?php __($post['content']) ?></p>
        
                <div class="post-meta">
                    <div>Published on <?php __($post['created_at']) ?> by @aj </div>
                    <div>2 likes  
                        <?php 
                            $countComment = count_comments($con, $post["id"]); 
                            __($countComment);
                            $countComment > 1 ? __(" Comments") :  __(" Comment");
                        ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!--Login Modal -->
    <?php include APP_PATH . '/includes/login-ui.php'; ?>

    <!--Sign up Modal -->
    <?php include APP_PATH . '/includes/signup-ui.php'; ?>
    <!-- bootstrap dependency -->
    <?php include APP_PATH . '/includes/assets/js-source.php'; ?>
  </body>
</html>