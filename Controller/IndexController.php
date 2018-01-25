<?php

namespace Controller;

class IndexController
{
    public function index(){
        echo 'index';
    }

    public function subscribe(){
        $token = $_GET['hub_verify_token'];
        $mode = $_GET['hub_mode'];

        if( $mode == 'subscribe' && $token == VERIFY_TOKEN ){

            echo 'Token Verified!';    

        }
    }

    public function messageSender(){
        header('Content-Type: application/json; charset=utf-8');
        
        $json = file_get_contents('php://input');

        $obj = json_decode($json, true);

        echo $obj['entry'][0]['messaging'][0]['message'] . "\n";
    }
}
