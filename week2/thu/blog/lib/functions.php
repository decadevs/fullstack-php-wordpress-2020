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
function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}