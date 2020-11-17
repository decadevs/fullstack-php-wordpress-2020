<?php
    require __DIR__ . '/settings.php';
    session_start();
    $_SESSION['user_islogedin'] = false;
    $message = '';

    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // The request is using the POST method
        
        $user = array(
            'email' => clean($_POST['email']),
            'password' => sha1(clean($_POST['password'])),
        );
        
        $userData = user_valid($con, $user['email']);

        if ($userData['password'] === $user['password']) {
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['user_name'] = $userData['name'];
            $_SESSION['user_email'] = $userData['email'];
            $_SESSION['user_islogedin'] = true;
            header("location: index.php");
        }else {
            $message = "Incorrect email or password";
        }
        
    }
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
    <div class="form">
        <form class="login-form" action="login.php" method="post" enctype="multipart/form-data">
            <div class="message"><?php echo $message ?></div>
            <h1 class="login-title">Login Here</h1>
            <br>
            <input type="text" name="email" class="login-input" placeholder="enter email address">
            <input type="password" name="password" class="login-input" placeholder="enter password">
            <input type="submit" value="Login" class="login-btn">
        </form>
    </div>
</section>

</body>
</html>