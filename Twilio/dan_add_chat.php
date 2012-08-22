<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	
	$subscriber = $_POST["From"];
	$message = $_Post["Body"];

	if ($message == "cancel") {
	//cancel subscript from database.. database code goes here
	$reply = "Your subscription is cancelled.";
	}
//	else {
//	//add subscriber to db and chat
//	$reply = "Thanks for the message. Text cancel to end the chat";

//	}

	if (  strtoupper(substr($message, 0, 4)) == "YELP: BAR") {
	//subscribe to the yelp channel now pass the following to yelp plug
	$reply = "The closest bar to you based on your facebook preferences is: Murphy's. Visit yelp.com for more info"
	}



?>
<Response>
	<Sms><?php echo $reply; ?></Sms>
</Response>
