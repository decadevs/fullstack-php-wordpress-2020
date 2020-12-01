<?php


class HomepageController {

    public static function index($greeting) {
        echo $greeting. ', joe';
    }
}


function getCleanURI(): string {
    $uri = isset($_SERVER['PHP_SELF']) ? trim($_SERVER['PHP_SELF']) : '/';
    $uri = str_ireplace('index.php', '', $uri);
    $uri = trim($uri, '/');

    
    
    return $uri;
}


function homePage() {
    include_once '../homepage.php';
}


function usersApi() {
    header('Content-type: application/json');
    echo json_encode($_GET);
    exit;

}

$uri = getCleanURI();


$routes = [
    '' => 'homePage',
    'api' => 'usersApi'
];

/*foreach($routes as $url=>$handler) {
    if($uri === $url) {
        call_user_func($handler);
        exit;
    }
}*/

$homepage = new HomepageController;
call_user_func([$homepage, 'index'], 'Hi');