<?php

/**
 * Entry point of our program
 */

 require_once '../vendor/autoload.php';

 use Wpanalytics\application;

 $app = new Application();
 $app->mount();
