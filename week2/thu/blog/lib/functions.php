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

function redirect($path){

    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';

    header("Location: $protocol://" .$_SERVER['HTTP_HOST'].$path);
}

function get_comment_date($time){
    return date("M j, Y",strtotime($time));
}

function get_comment_time($time){
    return date("g:i a",strtotime($time));
}

function isloggedin(){

     if(isset($_SESSION['user'])){
         return true;
     }

     return false;
}