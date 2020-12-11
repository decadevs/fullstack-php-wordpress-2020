<?php

namespace Wpanalytics\Controllers;

use Wpanalytics\Model\User;

/**
 * Class AuthController
 * 
 * @package \Wpanalytics;
 */
class AuthController extends BaseController {

    public function login() {
        $this->loadView('index', ['title' => 'Wpanalytics-Login']);
    }

    public function processLogin() {

        $email = $this->request->param('email');
        $password = $this->request->param('password');

        try {
            $user = User::findByEmail($email);

            if(!$user)  {
               throw new \Exception('unable to login');
            }

            if(!password_verify($password, $user->password)) {
               throw new \Exception('unable to login');
            }

            // set session
            User::updateLastLogin($user->id);
            $this->session->set(USER_SESSION_KEY_NAME, $user->id);
            $this->session->setFlash('success', sprintf( 'Welcome %s!', $user->name));
            $this->redirect('/dashboard');

        } catch (\Exception $e) {
            $this->session->setFlash('error', $e->getMessage());
            $this->redirect('/auth/login');
        }
    }


    public function logout() {
        $this->session->delete();
        $this->redirect('/auth/login?msg=logged-out');
    }

    public function signup() {
        $this->loadView('signup', ['title' => 'Wpanalytics-Signup']);
    }

    public function processReg()
    {
        $email = $this->request->param('email');
        $password = $this->request->param('password');
        $name = $this->request->param('name');

        $old = User::findByEmail($email);
        if($old) {
            $this->session->setFlash('error', 'Email address already in use');
            return $this->redirect('/auth/reg');
        }

        if(!$email || !$password || !$name) {
            $this->session->setFlash('error', 'You must provide all required data');
            return $this->redirect('/auth/reg');
        }

        $result = User::create([
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'name' => $name
        ]);


        if(!$result) {
            $this->session->setFlash('error', 'unable to create user account');
            $this->redirect('/auth/login?msg=error');
            return;
        }

        $this->redirect('/auth/login?msg=success');

    }

}