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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .login {
  width: 400px;
  margin: 16px auto;
  font-size: 16px;
}

/* Reset top and bottom margins from certain elements */
.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}

/* The triangle form is achieved by a CSS hack */
.login-triangle {
  width: 0;
  margin-right: auto;
  margin-left: auto;
  border: 12px solid transparent;
  border-bottom-color: #28d;
}

.login-header {
  background: #28d;
  padding: 20px;
  font-size: 1.4em;
  font-weight: normal;
  text-align: center;
  text-transform: uppercase;
  color: #fff;
}

.login-container {
  background: #ebebeb;
  padding: 12px;
}

/* Every row inside .login-container is defined with p tags */
.login p {
  padding: 12px;
}

.login input {
  box-sizing: border-box;
  display: block;
  width: 100%;
  border-width: 1px;
  border-style: solid;
  padding: 16px;
  outline: 0;
  font-family: inherit;
  font-size: 0.95em;
}

.login input[type="email"],
.login input[type="password"] {
  background: #fff;
  border-color: #bbb;
  color: #555;
}

/* Text fields' focus effect */
.login input[type="email"]:focus,
.login input[type="password"]:focus {
  border-color: #888;
}

.login input.login-control {
  background: #28d;
  border-color: transparent;
  color: #fff;
  cursor: pointer;
}

.login input.login-control:hover {
  background: #17c;
}

/* Buttons' focus effect */
.login input.login-control:focus {
  border-color: #05a;
}
    </style>
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
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body">
          <div class="login">
            <div class="login-triangle"></div>
            
            <h2 class="login-header">Log in</h2>

            <form  method='post' action="" class="login-container">
                <p><input type="email" placeholder="Email"></p>
                <p><input type="password" placeholder="Password"></p>
                <p><input class="login-control" type="submit" value="Log in"></p>
                <p><input class="login-control bg-danger" type="button" value="Cancel"  data-dismiss="modal"></p>
            </form>
          </div>

      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>