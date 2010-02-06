<?php

////////////////////////////////////////////////////////////
//
// PushMe PHP example command line v0.1
// Example PHP code to send messages via pushme.to service.
//
// Patryk 'jamzed' Kuzmicz || 2010.01.24
// patryk.kuzmicz@gmail.com
//
////////////////////////////////////////////////////////////

include('pushmeClass.php');

$msg = new Push;

$recipient = $argv[1];
$message = $argv[2];
$sender = $argv[3];

if ( !($recipient) || !($message) || !($sender) ) {
	echo "use: $argv[0] \"recipient\" \"message\" \"sender\"\n";
} else {
	echo $msg->sendMsg($recipient, $message, $sender) ? "Error!\n" : "Sent!\n";
}

?>
