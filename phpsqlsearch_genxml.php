<?php
//Three parts to the querystring: q is address, output is the format, key is the GAPI key
// itsnotbutter key $key = "ABQIAAAAGroKzMDAOLW_ewmTRNc1fBT5wlRzBJLpkK97ZmXPtQ-C8FCrZhTcPIwWnkyTTpNq9o8a5dQbaOmRCA";
// www.dogodeals.com key = ABQIAAAAGroKzMDAOLW_ewmTRNc1fBS2VAnPP1hW_vHnyD0DbvSS6AimCBSnumu0UO7Klw5m-5CeuBTRZv_NNA
$key = "AIzaSyCBNvUlfYqIfqE80v-qwKljOx5UVQPIptk";

// poop.dnsdojo.com key ABQIAAAAGroKzMDAOLW_ewmTRNc1fBQd3utFnaUxpDrw1LFUh7zS6bjILBSGwabWijFFX-dUx-8bqO6uqw5y0Q";
//dogodeals.dnsdojo.com key ABQIAAAAlpQu-IPydOADYfNJbuhihhRf1EURBc1HStnkED4XDw9Qqm7fhhR8WiPOZHrLLNDx6kvOH8gMtnYt0g
//$address = urlencode($_GET["userloc"]);
$latitude = $_GET["lat"];
$longitude = $_GET["lng"];
$miles = $_GET["radius"];
$day = $_GET["day"];
$day = '%' .$day. '%';


// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

//connect to database with justhost vars and settings.

$hostname="dogoadmin.db.8825642.hostedresource.com";
$username="dogoadmin";
$password="zuCH0IloxF";
$dbname='dogoadmin';
//$usertable='your_tablename';
//$yourfield = 'your_field';

$conn = mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
$db = mysql_select_db($dbname, $conn);
if (!$db) {
die ("Can\'t use db : " . mysql_error());
}



//connect to MySQL database original **
//$conn = mysql_connect("localhost","root","");

//$db = mysql_select_db("DEALS");

/*$query = sprintf("SELECT R.rest_name, R.rest_address, E.event_day_of_week, E.event_type, E.event_start_time, E.event_end_time, E.event_category, R.rest_latitude, R.rest_longitude, ( 3959 * ACOS( COS( RADIANS($latitude) ) * COS( RADIANS( R.rest_latitude ) ) * COS( RADIANS( R.rest_longitude ) - RADIANS($longitude) ) + SIN( RADIANS($latitude) ) * SIN( RADIANS( R.rest_latitude ) ) ) ) AS Distance FROM EVENTS_temp_loggedin E, RESTAURANT_2_temp_loggedin R WHERE 1=1 AND R.rest_key = E.rest_id HAVING Distance <= $miles ORDER BY Distance LIMIT 0, 20");
*/
$query = sprintf("SELECT R.rest_name, R.rest_address, R.rest_category, R.rest_desc, R.rest_phone, E.event_day_of_week, E.event_type, E.event_start_time, E.event_end_time, E.event_category, R.rest_latitude, R.rest_longitude, ( 3959 * ACOS( COS( RADIANS('%s') ) * COS( RADIANS( R.rest_latitude ) ) * COS( RADIANS( R.rest_longitude ) - RADIANS('%s') ) + SIN( RADIANS('%s') ) * SIN( RADIANS( R.rest_latitude ) ) ) ) AS Distance FROM EVENTS_temp_loggedin E, RESTAURANT_2_temp_loggedin R WHERE 1=1 AND R.rest_key = E.rest_id AND E.event_day_of_week LIKE ('%s') HAVING Distance <= '%s' ORDER BY Distance LIMIT 0, 20",
	mysql_real_escape_string($latitude),
	  mysql_real_escape_string($longitude),
	  mysql_real_escape_string($latitude),
	  mysql_real_escape_string($day),
	  mysql_real_escape_string($miles));

$result = mysql_query($query);

	if (!$result) {
	  die("Invalid query: " . mysql_error());
	}
	
// :: Use this to output to HTML Table ::
//echo "<table border='1'>
//<tr>
//<th>Restaurant Name</th>
//<th>Restaurant Address</th>
//<th>Restaurant Category</th>
//<th>Restaurant Phone</th>
//<th>Event Day</th>
//<th>Event Type</th>
//<th>Event Start Time</th>
//<th>Event End Time</th>
//<th>Event Category</th>
//<th>Distance in Miles</th>
//</tr>";
//header("Content-type: text/xml");

// :: Use this to output to XML DOM Parent--Node structure
header("Content-type: text/xml");

while($row = @mysql_fetch_assoc($result)) {
  	$node = $dom->createElement("marker");
	$newnode = $parnode->appendChild($node);
	$newnode->setAttribute("Restaurant_Name",$row['rest_name']);
	$newnode->setAttribute("Restaurant_Address",$row['rest_address']);
	$newnode->setAttribute("Restaurant_Category",$row['rest_category']);
	$newnode->setAttribute("Restaurant_Description",$row['rest_desc']);
	$newnode->setAttribute("Restaurant_Phone",$row['rest_phone']);
	$newnode->setAttribute("Event_Day",$row['event_day_of_week']);
	$newnode->setAttribute("Event_Type",$row['event_type']);
	$newnode->setAttribute("Event_Start",$row['event_start_time']);
	$newnode->setAttribute("Event_End",$row['event_end_time']);
	$newnode->setAttribute("Event_Category",$row['event_category']);
	$newnode->setAttribute("latitude",$row['rest_latitude']);
	$newnode->setAttribute("longitude",$row['rest_longitude']);
	$newnode->setAttribute("Distance",$row['Distance']);
 	  }
echo $dom->saveXML();

?>