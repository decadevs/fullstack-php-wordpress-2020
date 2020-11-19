<?php
    require __DIR__ . '/settings.php';
    session_start();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $con = con();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = get_user($con, $username);

        if($_POST['password'] === $password){
            session_regenerate_id(true); //prevent session fixation attack
            $_SESSION['isLoggedIn'] =  true;
            redirect(WEB_ROOT);
             exit;
        } 
        else {
          echo "invalid login credential";
        }
    }
