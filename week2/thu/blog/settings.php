<?php 
define('__INCLUDED__', true);

/** PATH */
define('APP_PATH', __DIR__);
define('APP_LIB_PATH', __DIR__ . '/lib/');
define('WEB_ROOT', '/fullstack-php-wordpress-2020/week2/thu/blog/');


/**
 * Database config
 */
define('DB_HOST', 'localhost:3306');
define('DB_PASS', '');
define('DB_USER', 'root');
define('DB_NAME', 'decagon');

define('APP_KEY', '02mls0924oi230032092309oi230923');



require APP_LIB_PATH .  '/functions.php';
require APP_LIB_PATH .  '/db/mysql.php';
require APP_LIB_PATH .  '/url.php';