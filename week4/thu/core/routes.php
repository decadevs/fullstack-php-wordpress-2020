<?php

Use \Wpanalytics\Router;

Route::get('auth/login', 'AuthController@index');
Route::get('/', 'Homepage@index');
Route::get('/', 'Homepage@index');

// function getCleanURI(): string {
//     $uri = isset($_SERVER['PHP_SELF']) ? trim($_SERVER['PHP_SELF']) : '/';
//     $uri = str_ireplace('index.php', '', $uri);
//     $uri = trim($uri, '/');
//     return $uri;
// }

// function homePage() {
//     include_once '../homepage.php';
// }

// function aboutPage() {
//     include_once '../aboutpage.php';
// }

// $uri = getCleanURI();

// $routes = [
//     '' => 'homePage',
//     'about' => 'aboutPage'
// ];

// foreach($routes as $url=>$handler) {
//     if($uri === $url) {
//         call_user_func($handler);
//         exit;
//     }
// }