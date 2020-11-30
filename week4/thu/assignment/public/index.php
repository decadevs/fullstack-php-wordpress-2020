<?php

require_once '../vendor/autoload.php';




function getCleanURI(): string {
    $uri = isset($_SERVER['PHP_SELF']) ? trim($_SERVER['PHP_SELF']) : '/';
    $uri = str_ireplace('index.php', '', $uri);
    $uri = trim($uri, '/');

    
    
    return $uri;
}
$uri = getCleanURI();
switch($uri){
    case '':
        echo 'Welcome';
    break;

    case 'add':
        $sum=new maths\Add();
        $sum->sum([2,3,4,6]);

    break;

    case 'subtract':
        $sub=new maths\Subtract();
        $sub->subtraction([20,3,4,6]);

    break;

    default:
        die('404 NOT FOUND');
}


