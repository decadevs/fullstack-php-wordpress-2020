<?php 
define('__INCLUDED__', true);

/** PATH */
define('APP_PATH', __DIR__);
define('APP_LIB_PATH', __DIR__ . '/lib/');


/**
 * Database config
 */
define('DB_HOST', 'localhost:4300');
define('DB_PASS', 'root');
define('DB_USER', 'root');
define('DB_NAME', 'decagon');

define('APP_KEY', '02mls0924oi230032092309oi230923');



require APP_LIB_PATH .  '/functions.php';
require APP_LIB_PATH .  '/db/mysql.php';