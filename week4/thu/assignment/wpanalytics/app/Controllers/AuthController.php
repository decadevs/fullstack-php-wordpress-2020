<?php

namespace App\Controllers;

/**
 * Class AuthController
 *
 * @package \App\Controllers
 */
class AuthController extends BaseController
{

    public function param($key) {
        return isset($_GET[$key]) ? $_GET[$key] : '';
    }
    public function login() {
        $this->loadView('login');
    }

    public function store() {

        $email = $this->request->param('email');
        $password = $this->request->param('password');

        $this->redirect('/');
    }
}
