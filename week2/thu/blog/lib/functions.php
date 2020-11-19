<?php
if(!defined('__INCLUDED__')){ die('You can not run this file');}

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
 * validate post
 */
function isValid($field1, $field2 = "dummy", $field3 = "dummy"): bool {
    return !empty($field1) && !empty($field2) && !empty($field3);
}