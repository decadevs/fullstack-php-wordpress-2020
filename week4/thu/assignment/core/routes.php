<?php

function getUri(){
    $uri = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : "/";
    $uri = trim(str_replace('index.php', '', $uri), '/');

    return $uri;
}


$uri = getUri();

echo $uri. "<br />"; 

function homePage(){
    echo "this is the homepage";
}

function about(){
    echo "this is the about page";
}

function contact(){
    echo "this is a contact page";
}

function service(){
    require PUBLIC_PATH . '/services.php';
}

function notfound(){
    echo "this page is not found";
}



$routes = [

    '' => 'homePage',
    'about' => 'about',
    'contact' => 'contact',
    'service' => 'service' 
];

foreach($routes as $url => $handler){
    if($uri == $url){
        call_user_func($handler);
        exit;
    }

}
call_user_func('notfound');

