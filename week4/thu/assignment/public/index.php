<?php

/**
 * Program entry point
 */

require_once '../vendor/autoload.php';

function getCleanURI()
{
    $uri = isset($_SERVER['REQUEST_URI']) ? trim($_SERVER['REQUEST_URI']) : '/';
    $uri = str_ireplace('index.php', '', $uri);
    $uri = trim($uri, '/');

    return $uri;
}

function homePage()
{
    include_once "../homepage.php";
}

function about()
{
    $article = new second_file\Article("Things Fall Apart", "Chinua Achebe");
    echo $article->getAuthor();
}

function profile()
{
    echo "PROFILE PAGE";
}

$uri = getCleanURI();

switch ($uri) {
    case '':
        homePage();
        break;
    case 'about':
        about();
        break;
    case 'profile':
        return profile();
        break;

    default:
        die("404 NOT FOUND");
}

(new week4_assignment\Application())->mount();
