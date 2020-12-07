<?php
/**
 * Entry point of our program
 */

require_once '../vendor/autoload.php';

(new App\Application())->mount();
