<?php

namespace Wpanalytics;

/**
 * Class Router
 * 
 * @package \Wpanalytics;
 */
class Router {

    protected $serverInfo;

    protected $requestedUrl = '/';

    protected $requestMethod = 'get';

    protected static $routes = [];

    protected static $allowedHttpMethods = ['get', 'post', 'put', 'patch', 'delete'];

    public function __construct() {
        $this->serverInfo = $_SERVER;
    }

    private function getRequestedUrl(): string {
        $requestedUrl = isset($this->serverInfo['PATH_INFO']) ? $this->serverInfo['PATH_INFO'] : '/';
        $url =  trim($requestedUrl, '/');
        if(!static::startsWith($url, '/')) {
            $url = '/' .  $url;
        }
        return $url;
    }

    public function executeUrl() {
        $this->requestedUrl =  $this->getRequestedUrl();
        $url = $this->getRequestedUrl();

        $reqMethod = strtolower($_SERVER['REQUEST_METHOD']);

        $foundRoute = null;
        foreach(static::$routes as $route) {
            if(!static::startsWith($route['path'], '/')) {
                $route['path'] = '/' . $route['path'];
            }
            if($route['path'] === $url && $route['method'] === $reqMethod) {
                $foundRoute = $route;
                break;
            }
        }

        if($foundRoute) {

            $parts = explode('@', $foundRoute['callback']);

            $controller= 'Wpanalytics\Controllers\\'.$parts[0];
            return call_user_func(array(new $controller, $parts[1]), array());
        }

        $controller = 'Wpanalytics\Controllers\NotFoundController';

        return call_user_func(array(new $controller, 'index'), array());
    }

    private static function startsWith($str, $char) : bool {
        return substr($str, 0, 1) === $char;
    }

    public static function __callStatic($name, $arguments)
    {
        if(in_array($name, static::$allowedHttpMethods)) {
            static::addRoute($arguments[0], $arguments[1], $name);
            return;
        }
        throw new \BadMethodCallException('Method not found: ' . $name);
    }

    protected static function addRoute($path, $callback, $method='get') {
        $found = false;
        foreach(static::$routes as $route) {
            if($route['path'] === $path && $method === $route['method']) {
                $found = true;
                break;
            }
        }
        if(!$found) {
            static::$routes[] = ['path' => $path, 'callback' => $callback, 'method' => $method];
        }

    }

}