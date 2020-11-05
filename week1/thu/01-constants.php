<?php
    /**
     * How to define a constant
     */
    define('DB_HOST', 'localhost');
    // echo DB_HOST;
    // define('DB_HOST', '127.0.0.1');
    // echo DB_HOST;
    if(!defined('DB_HOST')) define('DB_HOST', '127.0.0.1');
    // echo DB_HOST;
    // echo "\n";
    // var_dump(__DIR__);
    // echo "\n";
    // var_dump(__FILE__);
    // echo "\n";
    // var_dump(__LINE__);
    // var_dump(PHP_EOL);
    // var_dump(PHP_INT_MAX);
    var_dump(PHP_OS);
    var_dump(PHP_OS_FAMILY);
?>