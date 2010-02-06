<?php

////////////////////////////////////////////////////////////
//
// PushMe PHP example code v0.1
// Example PHP code to send messages via pushme.to service.
//
// Patryk 'jamzed' Kuzmicz || 2010.01.24
// patryk.kuzmicz@gmail.com
//
////////////////////////////////////////////////////////////

include('pushmeClass.php');

$msg = new Push;

$sender = "sender";
$recipient = "recipient";
$message = "Message text ;-)";

echo $msg->sendMsg($recipient, $message, $sender) ? "Error!\n" : "Sent!\n";

?>
