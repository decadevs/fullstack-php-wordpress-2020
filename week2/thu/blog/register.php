<?php
    session_start();
    require __DIR__ . '/settings.php';
    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }
    $errors   = [];
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password_1 = filter_var($_POST['password_1'], FILTER_SANITIZE_STRING);
        $password_2 = filter_var($_POST['password_2'], FILTER_SANITIZE_STRING);
        if (empty($name)) { 
            array_push($errors, "Name is required"); 
        }
        if (empty($email)) { 
            array_push($errors, "Email is required"); 
        }
        if (empty($password_1)) { 
            array_push($errors, "Password is required"); 
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }
        if (count($errors) == 0) {
            create_user($con, ['name'=>$name, 'password'=>$password_1, 'email'=>$email]);
            $_SESSION['success']  = "New user successfully created!!";
            $_SESSION['login_user'] = $name;
            $_SESSION['id']=mysqli_insert_id($con);
			header('location: post.php');
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
            <h2>Register</h2>
        </div>
        <form method="post" class="form">
        <?php echo display_error(); ?>
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" name="name" id ="name" value="<?php echo $name; ?>">
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">
                <label for="password_1">Password</label>
                <input type="password" name="password_1" id="password_1">
            </div>
            <div class="input-group">
                <label for="password_2">Confirm password</label>
                <input type="password" name="password_2" id="password_2">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="register_btn">Register</button>
            </div>
            <p>
                Already a member? <a href="login.php">Sign in</a>
            </p>
        </form>
    </body>
</html>