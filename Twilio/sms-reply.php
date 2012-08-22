<?php

	// make an associative array of senders we know, indexed by phone number
	$people = array(
		"+12017232000"=>"Dan Schiffman",
		"+16035487418"=>"Amanda O'Brien",
		"+14158675311"=>"Virgil",
	);

	// if the sender is known, then greet them by name
	// otherwise, consider them just another monkey
	if(!$name = $people[$_REQUEST['From']])
		$name = "Monkey";

	// now greet the sender
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
	<Sms><?php echo $name ?>, thanks for the message!</Sms>
</Response>
