<?php
require __DIR__ . '/settings.php';
    $con = con();
    
    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($name) || strlen($name) < 5) $errors[] = "Name must be atleast 5 characters long";

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Please provide a valid email";

        if(strlen($password) < 5) $errors[] = "Password must be atleast 5 characters long";


        if(!$errors){
            $data = array("name"=>$name, "email"=>$email, "password"=>hash_pwd($password));
            create_new_user($con, $data);
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

        <div class="login-header"> JOIN OUR AMAZING COMMUNITY </div>
            <?php if($errors){
                foreach($errors as $error){
                    __('<span class="error">'.$error.'</span><br />');
                }
            }?>
        <div class="input-section">
            <input id="name" type="name" name="name" placeholder="Name" />

        </div>

        <div class="input-section">
            <input id="email" type="email" name="email" placeholder="Email" />

        </div>

        <div class="input-section">
            <input id="password" type="password" name="password" placeholder="password" />

        </div>

        <button class="submit-btn" name="signup"> sign up </button>
    </form>
</section>




</body>
</html>