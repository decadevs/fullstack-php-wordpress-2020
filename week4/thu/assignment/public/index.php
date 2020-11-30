<?php

require_once '../vendor/autoload.php';

function getCleanURI(): string {
    $uri = isset($_SERVER['PHP_SELF']) ? trim($_SERVER['PHP_SELF']) : '/';
    $uri = str_ireplace('index.php', '', $uri);
    $uri = trim($uri, '/');
    return $uri;
}

$uri = getCleanURI();

function homePage(){
  (new App\Greeting())->index('Hello','Warami') . PHP_EOL;
  echo "Welcome to my blog";

}

function about(){
    echo "you can find out about me here";
}

function contact(){
    echo "contact me here";
}

function notFound(){
    echo "404 PAGE NOT FOUND";
}

function blog(){
  (new App\Author())->firstWriteUp();
}

$routes = [

    '' => 'homePage',
    'about' => 'about',
    'contact' => 'contact',
    'blog' => 'blog'
];

foreach($routes as $url => $handler){
    if($uri === $url){
        call_user_func($handler);
        exit;
    }

}

call_user_func('notFound');
