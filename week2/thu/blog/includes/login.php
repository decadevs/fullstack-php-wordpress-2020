<?php

$email = $_POST['email'];
$password = $_POST['password'];

if (authenticate_user($con, $email, $password)) {
    $_SESSION['is_logged_in'] = true;
} else {
    $error = 'Incorrect username or password. Try again!';
}
