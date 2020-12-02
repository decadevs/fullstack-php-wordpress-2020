<?php
     
    require_once '../vendor/autoload.php';
    //echo str_ireplace('\\', '/', PUBLIC_PATH);
    //(new WP_App\Application())->mount();

    $uri = getURI();
    //echo $uri;
    $routes = ['signin' => "homepage", 'register' => 'signup', 'dashboard' => 'dashboard'];
    $app = new WP_App\Application();

    foreach($routes as $route=>$link){
        if($route === $uri){
            call_user_func([$app, $link]);
            exit;
        }
    }
        echo '404 Not found';
    
    function getURI() : string{
        $uri = isset($_SERVER['PHP_SELF']) ? trim($_SERVER['PHP_SELF']) : '/';
        $uri = str_ireplace('index.php', '', $uri);
        $uri = trim($uri, '/');
        return $uri;
    }

    