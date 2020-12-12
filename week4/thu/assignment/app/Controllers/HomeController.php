<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index() {

        // var_dump($_SESSION['logged']);
       
        $this->loadView('dashboard', ['title' => 'Wpanalytics']);
    }
}
   