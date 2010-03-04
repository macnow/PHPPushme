<?php

////////////////////////////////////////////////////////////
//
// PushMe PHP example code v0.1
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

$sender = "sender";
$recipient = "recipient";
$message = "Message text ;-)";
$from = "YourServer";

echo $msg->sendMsg($recipient, $message, $sender, $from) ? "Error!\n" : "Sent!\n";

?>
