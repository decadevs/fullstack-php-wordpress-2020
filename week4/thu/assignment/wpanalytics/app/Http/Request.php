<?php

namespace App\Http;

/**
 * Class Request
 *
 * @package \App\Http
 */
class Request
{
    public function param($key) {
        if(isset($_GET[$key])) return $_GET[$key];
        if(isset($_POST[$key])) return $_POST[$key];
        return '';
    }

    public function files() {
        return $_FILES;
    }
}
