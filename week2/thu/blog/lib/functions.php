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

/**
 * prevent sql injection
 */
function clean($s) {
    return htmlentities($s);
}

/**
 * redirect
 */
function redirect($url) {
    header("location: " . $url);
}

/**
   * Get current time from created_at
   */
function get_current_date($time){
    return date("M j, Y",strtotime($time));
}


