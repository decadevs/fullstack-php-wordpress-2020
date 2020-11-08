<?php 
//https://www.php.net/manual/en/language.constants.predefined.php
// https://www.php.net/manual/en/reserved.constants.php
/**
 * How to define a constant
 */

define('DB_HOST', 'localhost');


// check if a constant has been defined
if(!defined('DB_HOST')) define('DB_HOST', '127.0.0.1');

// defined by PHP
//var_dump(__DIR__);
//var_dump(__FILE__);
//var_dump(__LINE__);
// var_dump(PHP_EOL);
// var_dump(PHP_INT_MAX);