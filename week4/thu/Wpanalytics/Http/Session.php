<?php

namespace Wpanalytics\Http;

use \Aura\Session\SessionFactory;

/**
 * Class Session
 *
 * @package \Wpanalytics\Http
 */
class Session
{
    protected $store = null;

    private static $instance = null;

    private function __construct()
    {
        $sessionFactory = new SessionFactory;
        $sess = $sessionFactory->newInstance($_COOKIE);

        $this->store = $sess->getSegment('Wpanalytics\WpAnalytics');
    }

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new Session();
        }

        return self::$instance;
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