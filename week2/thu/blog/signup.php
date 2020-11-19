<?php
    require __DIR__ . '/settings.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $con = con();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $error = false;

        if(!isValid($username, $email, $password)){
          echo "all fields required";
          $error = true;
        }

        $user = get_user($con, $username);

        if(!is_null($user)){
          echo "User already exists";
          $error = true;
        }

        if(!$error){
            $hashpassword = password_hash($password);
            $securepassword = APP_KEY.$hashpassword;
            $row = create_user($con, $username, $email, $password);
            if(!empty($row)){
              session_start();
              session_regenerate_id(true); //prevent session fixation attack
              $_SESSION['isLoggedIn'] =  true;
              redirect(WEB_ROOT);
              exit;
            }
            echo "error creating user. try again shortly";
        }
    }

    redirect(WEB_ROOT);
    exit;
