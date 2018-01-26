<?php

namespace Config;

class Route extends Bootstrap
{    
    public function initRoutes()
    {
        $routes['home'       ]  = array("method" => "get", "route"=>'/',"controller"=>"IndexController","action"=>"index");
        $routes['webhookGet' ]  = array("method" => "get", "route"=>'/webhook',"controller"=>"IndexController","action"=>"subscribe");
        $routes['webhookPost']  = array("method" => "post", "route"=>'/webhook',"controller"=>"IndexController","action"=>"sendMessage");

        parent::setRoute( $routes );
    }
}