<?php 
    require __DIR__ . '/settings.php';
    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    $post_id = (isset($_GET['post_id'])) ? abs(intval($_GET['post_id'])) : 0;

    $post = get_post($con, $post_id);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['content'])){
            $user_id = 1;
            create_comment($con, $_POST, $user_id, $post_id);
        }
         
    } 

    if(!$post_id || !$post) {
        header("Location: index.php");
        exit;
    }

    $postComments = get_comments($con, $post_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php __($post['title']) ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include APP_PATH . '/includes/header.php' ?>


<section class="container-css section">
    <div class="post">
        <h1 class="post-title"><a href=""><?php __($post['title']) ?></a></h1>
        <p class="post-content"><?php __($post['content']) ?></p>
   
        <div class="post-meta">
            <div>Published on 12/01/2020 by @aj </div>
            <div>2 likes    1k comment</div>
        </div>
    </div>

    <div class="detailBox margin">
        <div class="titleBox"><label>Comment Box</label></div>

        <div class="actionBox">
            <?php if(!empty($postComments)): ?> 
            <ul class="commentList">
                <?php foreach ($postComments as $postComment): ?>   
                <li>
                    <div class="commenterImage">
                        <img src="http://placekitten.com/50/50" />
                    </div>
                    <div class="commentText">
                        <p class=""><?php __($postComment['content']) ?></p> <span class="date sub-text"><?php __($postComment['created_at']) ?></span>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?> 
            <form class="form-inline" method="post" role="form">
                <div class="form-group">
                    <textarea class="form-control bcontent w-100" name="content" placeholder="Your comments" rows="1"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control" >Comment</button>
                </div>
            </form>
        </div>
    </div>
</section>
    
</body>
</html>