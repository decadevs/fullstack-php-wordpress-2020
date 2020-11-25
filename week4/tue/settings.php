<?php 

spl_autoload_register(function($className) {

    $className = strtolower($className);
    $paths = str_replace('\\', '/', $className);

    $fullPath = __DIR__ .'/includes/' .  $paths . '.php';

    require_once  $fullPath;
   
});
