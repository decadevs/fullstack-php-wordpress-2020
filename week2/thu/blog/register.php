<?php

require __DIR__ . '/settings.php';

session_start();

$con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    $posts = get_posts($con);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if ($_POST['name'] && $_POST['password'] ==  $_POST['password_check'] ) {

        $name = clean($_POST['name']);
        $email = clean($_POST['email']);

        $data = ['name' => clean($_POST['name']), 'password' => hash_pwd(clean($_POST['password'])), 'email' => clean($_POST['email'])];

        $query = sprintf("SELECT name, email FROM users 
        WHERE name='%s'",
        $name);

        $email_query = sprintf("SELECT name, email FROM users 
        WHERE email='%s'",
        $email);

        $result = mysqli_query($con, $query);
        $email_result = mysqli_query($con, $email_query);


        if (!$result && !$email_result) {

            $error  = 'Connection error';

        } else {

            if ($row = mysqli_fetch_assoc($result)){

                if ($row) {

                    $error  = 'Please username has been taken';  
                }
            } elseif ($row = mysqli_fetch_assoc($email_result)) {

                if ($row) {

                    $error  = 'Please email has been taken';  
                }
            } else {
                
                $id = create_user($con, $data);

                session_regenerate_id(true);

                $_SESSION['username'] = $name;

                $_SESSION['user_id'] = $id;

                $_SESSION['is_logged_in'] = true;

                redirect("/");

            }

        }

    } else {

        $error = 'Please type your password correctly';
    }
}

?>

<?php include APP_PATH . '/includes/header.php' ?>



<section class="container section">

    <h3 class="form-head">Register</h3><br/>

    <?php  if (!empty($error)) : ?>
        <p id="warning" class="form-text"><?php __($error) ?></p>
    <?php  endif; ?>

    <form method=POST>
        <div class="form-group">
            <label for="formGroupExampleInput">Username</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Username" name="name" Required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@email.com" name="email" Required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" Required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Retype-Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password_check" Required>
        </div>
        <button type="submit" class="btn btn-outline-*" id="button">Submit</button>
    </form>

</section>








<?php include APP_PATH . '/includes/footer.php' ?>