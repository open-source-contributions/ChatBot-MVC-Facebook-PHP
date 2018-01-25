<?php

namespace Config;

require_once __DIR__ . '/../vendor/autoload.php';

class Bootstrap
{
    public $routes;

    public function __construct()
    {   
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    protected function getUrl()
    { 
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }

    protected function run($url)
    {
        
        array_walk($this->routes, function ($route) use ($url){
            if($url == $route['route'] && $route['method'] == ( count($_GET) > 1 ? 'get' : 'post' ) )
            {
                $class = "\\Controller\\" . $route['controller'];
                $controller = new $class;
                $action = $route['action'];
                $controller->$action();
            }
        });
        unset( $_GET );
    }

    protected function setRoute(array $routes)
    {
        $this->routes = $routes;
    }
}