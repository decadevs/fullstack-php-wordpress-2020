<?php

namespace Wpanalytics\Controllers;

/**
 * Class AuthController
 * 
 * @package \Wpanalytics;
 */
class AuthController extends BaseController {

    public function login() {
        $this->loadView('index', ['title' => 'Wpanalytics-Login']);
    }

    public function logout() {
        $this->loadView('index', ['title' => 'Wpanalytics-Login']);
    }

    public function signup() {
        $this->loadView('signup', ['title' => 'Wpanalytics-Signup']);
    }

    public function signin() {
        $this->loadView('home', ['title' => 'Wpanalytics-Dashboard']);
    }
}