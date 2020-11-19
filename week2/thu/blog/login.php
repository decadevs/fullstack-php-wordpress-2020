<?php
session_start();
    require __DIR__ . '/settings.php';

    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    if($_POST){
        $err = "";
        if(empty($_POST['email']) || empty($_POST['password'])){
            $err .= "All fields are required\n";
        }
        elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $err .= "Invalid email address\n";
        }

        if(!$err){
            $email = clean($_POST['email']);
            $password = hash_pwd(clean($_POST['password']));

            $auth = get_email($con, $email);

            if($auth && $auth['password'] === $password){
                $_SESSION['id'] = $auth['id'];
                header("Location: index.php");
                exit;
            }
            else{
                $err .= "Email or password incorrect\n";
            }
        }
        
    }

    include APP_PATH . '/includes/htmlhead.php'

?>

<body>

<?php include APP_PATH . '/includes/header.php' ?>

<section class="containers section">

    <?php
        if(!empty($err)){
            echo '<div class="alert alert-danger" role="alert">'.nl2br($err).'</div>';
        }
    ?>

    <form action="" method="post">

        <div class="form-group">
            <label for="email">Enter Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
        </div>

        <div class="form-group">
            <label for="password">Enter Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</section>

</body>
</html>
