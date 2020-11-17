<?php 
    require __DIR__ . '/settings.php';
    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        if(isset($_POST['content'])){
            create_post($con, $_POST);
        }
    }
    $posts = get_posts($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XiReader</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style.css">
    
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

<?php include APP_PATH . '/includes/header.php' ?>

    <section class="container-css section">
        <div class="row">
            <div class="col-md-12">
                <form method="post" role="form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="post Title"/>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control bcontent" name="content" placeholder="Whats on your mind? "></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="user_id" value='1' class="form-control"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control" >Post</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="container-css section">
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

    </section>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  });
</body>
</html>