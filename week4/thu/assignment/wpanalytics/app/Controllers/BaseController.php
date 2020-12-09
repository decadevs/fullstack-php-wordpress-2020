<?php

namespace App\Controllers;

use App\Http\Request;

abstract class BaseController
{
    protected $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function loadView($name, $data = []) {

        $view = VIEW_PATH . '/'. $name . '.php';
        if(!file_exists($view)) throw new \Exception($view . ' not found');

        ob_start();
        extract($data);
        require_once $view;
        $content =  ob_get_contents();
        ob_clean();

        echo $content;
    }

    public function redirect($to) {
        header('Location:' . $to);
        exit;
    }
}

