<?php

namespace Controller;

class IndexController
{
    public function index(){
        echo 'index';
        require __DIR__ . "/../Public/View/home.php";
    }

    public function subscribe(){  
        $token  = $_GET[ 'hub_verify_token' ];
        $mode   = $_GET[ 'hub_mode'         ];

        if( $mode == 'subscribe' && $token == VERIFY_TOKEN ){
            echo $_GET[ 'hub_challenge' ];
        }else{
            echo 'invalid token';
        }   
    }

    public function sendMessage(){
        header( 'Content-Type: application/json; charset=utf-8' );
        
        $json = file_get_contents( 'php://input' );

        $obj = json_decode( $json, true );

        //echo $obj['entry'][0]['messaging'][0]['message'] . "\n";

        if( $obj[ 'entry' ][ 0 ][ 'messaging' ][ 0 ][ 'message' ] ){
            handleMessage( $sender_psid, $received_message );
        }else{
            handlePostback( $sender_psid, $received_postback );
        }

        var_dump($obj);
        
    }
}
