<?php

////////////////////////////////////////////////////////////
//
// PushMe PHP example command line v0.1
// Example PHP code to send messages via pushme.to service.
//
// Patryk 'jamzed' Kuzmicz || 2010.01.24
// patryk.kuzmicz@gmail.com
//
// Maciej Nowakowski || 2010.03.04
// macnow@gmail.com
// Added "from" option
////////////////////////////////////////////////////////////

include('pushmeClass.php');

$msg = new Push;

$recipient = $argv[1];
$message = $argv[2];
$sender = $argv[3];
$from = $argv[4];

if ( !($recipient) || !($message) || !($sender) ) {
	echo "use: $argv[0] \"recipient\" \"message\" \"sender\" \"(from)\"\n";
} else {
	echo $msg->sendMsg($recipient, $message, $sender, $from) ? "Error!\n" : "Sent!\n";
}

?>
