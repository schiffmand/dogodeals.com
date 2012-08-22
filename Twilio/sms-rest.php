<?php

	// include the PHP TwilioRest library
	require "Services/Twilio.php";

	// set our AccountSid and AuthToken
	$AccountSid = "AC8d9c7c31d70e8af674b795e3fdfc37f1";
	$AuthToken = "f2eeb4dae6488feb76675d3dd2d4774c";

	// instantiate a new Twilio Rest Client
	$client = new Services_Twilio($AccountSid, $AuthToken);

	// make an associative array of people we know, indexed by phone number
	$people = array(
		"+12017232000"=>"Dan Schiffman",
		"+16035487418"=>"Amanda O'Brien",
		"+14158675311"=>"Virgil",
	);

	// iterate over all our friends
	foreach ($people as $number => $name) {

		// Send a new outgoinging SMS by POSTing to the SMS resource */
		$sms = $client->account->sms_messages->create(
			"YYY-YYY-YYYY",
			$number,
			"Hey $name, Monkey Party at 6PM. Bring Bananas!"
		);

		echo "Sent message to $name";
    }
?>
