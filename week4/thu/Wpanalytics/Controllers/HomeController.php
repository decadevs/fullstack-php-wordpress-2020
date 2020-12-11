<?php

namespace Wpanalytics\Controllers;

/**
 * Class HomeController
 *
 * @package \Wpanalytics\Controllers
 */
class HomeController extends BaseController
{
    public function index() {
        $this->checkLogin();
        $this->loadView('home', ['title' => 'Wpanalytics']);
    }

    public function author() {

        $this->loadView('author', ['title' => 'Wpanalytics-Author']);
    }

    public function authorpost() {

        $this->loadView('authorpost', ['title' => 'Wpanalytics-authorpost']);
    }
}