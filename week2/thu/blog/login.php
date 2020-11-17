<?php

require __DIR__ . '/settings.php';

session_start();

$con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

$error='';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['password'] && $_POST['name']) {

    $name = clean($_POST['name']);
    $password = hash_pwd(clean($_POST['password']));

    $query = sprintf("SELECT id, name, password FROM users 
    WHERE name='%s' AND password='%s'",
    $name,
    $password);

    $result = mysqli_query($con, $query);

    if (!$result) {

        $error  = 'Please enter correct username or password';

    } else {

        if ($row = mysqli_fetch_assoc($result)){

            if ($row['name'] == $name && $row['password'] == $password) {
    
                session_regenerate_id(true);

                $_SESSION['username'] = $name;

                $_SESSION['user_id'] = $row['id'];
        
                $_SESSION['is_logged_in'] = true;
        
                redirect("/");
            }
        } else {
            $error  = 'Please enter correct username or password';
        }

    }
    

}

?>

<?php include APP_PATH . '/includes/header.php' ?>

<section class="container section">

    <h3 class="form-head">Login</h3><br/>

    <?php  if (!empty($error)) : ?>
        <p id="warning" class="form-text"><?php __($error) ?></p>
    <?php  endif; ?>

    <form method=POST>
        <div class="form-group">
            <label for="formGroupExampleInput">Username</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Username" name="name" Required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" Required>
        </div>
        <button type="submit" class="btn btn-outline-*" id="button">Submit</button>
    </form>

</section>




<?php include APP_PATH . '/includes/footer.php' ?>