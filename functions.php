<?php
// Handles messages events
function handleMessage( $sender_psid, $received_message ) {
    $message = [
      "text" => 'You sent the message: "${received_message.text}". Now send me an image!'
    ];

    callSendAPI( $sender_psid, json_encode( $message ) );
}

// Handles messaging_postbacks events
function handlePostback( $sender_psid, $received_postback ) {

}

// Sends response messages via the Send API
function callSendAPI( $sender_psid, $response ) {
  
}