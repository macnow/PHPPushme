<?php

////////////////////////////////////////////////////////////
//
// PushMe PHP Class v0.1
// Very simple class to send messages via pushme.to service.
//
// Patryk 'jamzed' Kuzmicz || 2010.01.24
// patryk.kuzmicz@gmail.com
//
////////////////////////////////////////////////////////////

// FORM in HTML to send messages.
// <form action="http://pushme.to/recipient/" method="POST">
// <input type="hidden" name="_encoding" value="UTF-8"> </input> 
// <textarea name="message"> </textarea>
// <input type="text" name="signature" value=""/>
// <input type="submit" value=" Push "/></form>

// Simple result parser.
// <div id="send_result" style="display:none"><h4>Message was sent successfully.</h4><button onClick="document.location='/recipient/';"><span>Send another one</span></button></div>

Class Push {

var $serverapi = 'http://pushme.to/';

	public function sendMsg($recipient,$message,$signature) {

		// urlencode data
		$recipient = utf8_encode($recipient);
		$message = utf8_encode($message);
		$signature = utf8_encode($signature);

		$posturl = "$this->serverapi$recipient/";
		$ch = curl_init($posturl);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "_encoding=UTF-8&message=$message&signature=$signature");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		$bodyresult = curl_exec($ch); 

		if ( curl_errno($ch) ) {
			// echo "Problem with connection to pushme\n";
			return 1;
		}

		curl_close($ch);

		if ( Push::checkResult($bodyresult) == 0 ) {
			// echo "Message was sent successfully.\n";
			return 0;
		} else { 
			return 1;
		}

	}

	public function checkResult($bodyresult) {
		ereg("<div id=\"send_result\" style=\"display:none\"><h4>(.*)</h4>", $bodyresult, $result);

		if ( $result[1] == 'Message was sent successfully.' ) {
			return 0;
		} else {
			// echo "Unkonown error! Message probably wasn't send... ;-(\n";
			// echo $result[1];
			return 1;
		}

	}

}

?>
