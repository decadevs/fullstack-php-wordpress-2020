<?php
    session_start();
    require __DIR__ . '/settings.php';
    $con = con();
    $error = "";
    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $password = hash_pwd(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
        $verified_user = get_user($con, $name, $password) ;
        
        if($verified_user!= false){
            session_regenerate_id('true');
            $_SESSION['is_log_in'] = true;
            $_SESSION['id']=$verified_user['id'];
        
            header("location: post.php");
        
        }else{
            $error = "Name and password do not match";
            
        } 
        
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">   
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        
        <div class="header">
            <h2>Login</h2>
        </div>
        <form method="post"  class="form">
        <div class="error"><?php echo $error; ?></div>
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="passwword" required>
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="register_btn">Login</button>
            </div>
            <p>
                Don't have an account? <a href="register.php">Register Here</a>
            </p>
        </form>
    </body>
</html>