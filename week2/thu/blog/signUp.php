<?php
require __DIR__ . '/settings.php';

$con = con();

if(!$con) {
    die_with_error("Error connecting to Database Server");
}

include APP_PATH . '/includes/htmlhead.php';

if($_POST){

    $err = "";
    $success = "";
    $userData = [];
    if(empty($_POST['userName']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm'])){
        $err .= "All fields are required\n";
    }
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $err = "Invalid email address\n";
    }
    elseif(isset($_POST['password']) && $_POST['password'] !== $_POST['confirm']){
        $err .= "Confirm password and password does not match\n";
    }

    if(!$err){
       $userData['name'] = clean($_POST['userName']);
        $userData['email'] = clean($_POST['email']);
        $userData['password'] = hash_pwd(clean($_POST['password']));

        $existEmail = get_email($con, $userData['email']);

        if(!$existEmail){
            $userStatus = create_user($con, $userData);
            if($userStatus){$success = 'Registration successful';}
            else{$err .= "Registration fail, try again later";}
        }
        else{
            $err .= "Account already exist\n";
        }
    }
}

?>

<body>
<?php include APP_PATH . '/includes/header.php' ?>

<section class="containers section">
   <?php
   if(!empty($err)){
       echo '<div class="alert alert-danger" role="alert">'.nl2br($err).'</div>';
   }
   if(empty($err) && !empty($success)){
       echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
   }
   ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="userName">Name</label>
            <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <label for="email">Enter Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
        </div>

        <div class="form-group">
            <label for="passowrd">Enter Password</label>
            <input type="password" class="form-control" id="passowrd" name="password" placeholder="Enter Password">
        </div>

        <div class="form-group">
            <label for="confirm">Confirm Password</label>
            <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password">
        </div>

        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</section>

</body>
</html>

