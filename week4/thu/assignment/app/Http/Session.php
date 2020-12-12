<?php

namespace App\Http;

use \Aura\Session\SessionFactory;

class Session
{
    protected $store = null;

    private static $instance = null;

    private function __construct()
    {
        $sessionFactory = new SessionFactory;
        $sess = $sessionFactory->newInstance($_COOKIE);

        $this->store = $sess->getSegment('App\WpAnalytics');
    }

    public static function getInstance()
    {
        if (static::$instance == null)
        {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function set($key, $value) {
        $this->store->set($key, $value);
    }

    public function get($key) {
        return $this->store->get($key);
    }

    public function setFlash($key, $value) {
        $this->store->setFlash($key, $value);
    }

    public function getFlash($key) {
        return $this->store->getFlash($key);
    }

    public function delete() {
        $this->store->clear();
    }
}