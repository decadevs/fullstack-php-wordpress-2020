<?php

$email = $_POST['email'];
$password = $_POST['password'];

if (authenticate_user($con, $email, $password)) {


    // Regenerate session id to prevent session fixation attacks
    session_regenerate_id(true);

    $_SESSION['is_logged_in'] = true;
    $_SESSION['current_user'] = $email;
} 
else {
    $error = 'Incorrect username or password. Try again!';
}
