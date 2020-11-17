<?php
require __DIR__ . '/settings.php';
    $con = con();
    
    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $verifiedUser = authenticate($con, $email, $password);

        if($verifiedUser){
            $_SESSION['user'] = $verifiedUser;
            
            redirect("/index.php");
        }else{
            $error = "wrong password and email combination";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php __($post['title']) ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
    
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include APP_PATH.'/includes/header.php' ?>

<section class="container section">
    <form id="login-form" method="POST" action="">

        <div class="login-header"> LOGIN </div>
            <?php 
            if($error){
            __("<span class='error'> $error </span>");
            } 
            ?>
        <div class="input-section">
            <input id="email" type="email" name="email" placeholder="Email" required/>

        </div>

        <div class="input-section">
            <input id="password" type="password" name="password" placeholder="password" required />

        </div>

        <button class="submit-btn" name="login"> Login </button>
    </form>
</section>




</body>
</html>