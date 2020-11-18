<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
date_default_timezone_set("Africa/Lagos");
$created_at = date("Y-m-d H:i:s");

if (register_user($con, $name, $email, $password, $created_at)) {
    $successMsg = "Registration Successful";
}
else {
    $error = "Failed to register user";
}