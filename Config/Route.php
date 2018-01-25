<?php

namespace Config;

class Route extends Bootstrap
{    
    public function initRoutes()
    {
        $routes['home'] = array("route"=>'/',"controller"=>"IndexController","action"=>"index");
        $routes['webhook'] = array("route"=>'/webhook',"controller"=>"IndexController","action"=>"subscribe");

        parent::setRoute($routes);
    }
}