<?php
if(!defined('__INCLUDED__')) die('You can not run this file');


function die_with_error($errorMessage) {
    require_once APP_PATH . '/500.php';
    exit;
}

/**
 * Hash password
 */
function hash_pwd($str): string {
    return sha1(APP_KEY . $str);
}

function __($s) {
    $banned = ['crazy', 'mad'];
    foreach($banned as $ban) {
        $s = str_ireplace($ban, '***', $s);
    }
    
    echo $s;
}

function clean($str) : string{
    return htmlspecialchars(strip_tags($str));
}

function logout(){
    // empty the $_SESSION array
    $_SESSION = array();
    // invalidate the session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-86400, '/');
    }
    // end session
    session_destroy();
    header('Location: index.php');
    exit;
}