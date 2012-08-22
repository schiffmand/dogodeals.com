<?php
//Three parts to the querystring: q is address, output is the format, key is the GAPI key
$key = "ABQIAAAAlpQu-IPydOADYfNJbuhihhRf1EURBc1HStnkED4XDw9Qqm7fhhR8WiPOZHrLLNDx6kvOH8gMtnYt0g";


//$address = urlencode($_GET["userloc"]);
$address = $_GET["userloc"];
$miles = $_GET["miles"];
$hostname='dogoadmin.db.8825642.hostedresource.com';
$username='dogoadmin';
$password='zuCH0IloxF';
$dbname='dogoadmin';
//$usertable='your_tablename';
//$yourfield = 'your_field';

$conn = mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
$db = mysql_select_db($dbname);
//$query = "SELECT rest_key, rest_address from RESTAURANT_2_temp_loggedin"


//$result = mysql_query($query) or die(mysql_error());

      $mapaddress = urlencode("$address");

      // Desired address
      $url = "http://maps.google.com/maps/geo?q=$mapaddress&output=xml&key=$key";

      // Retrieve the URL contents
      $page = file_get_contents($url);

      // Parse the returned XML file
      $xml = new SimpleXMLElement($page);

      // Parse the coordinate string
      list($longitude, $latitude, $altitude) = explode(",", $xml->Response->Placemark->Point->coordinates);

      // Output the coordinates
      echo "Address: $address, latitude: $latitude, longitude: $longitude <br />";

//echo "List parsing:: "


   
//$sqlMi = "SELECT R.rest_name,R.rest_address, R.rest_category, R.rest_phone, E.event_day_of_week, E.event_type, E.event_start_time, E.event_end_time, E.event_category FROM EVENTS e, RESTAURANT_2 R WHERE 1=1 AND 3963.191 * ACOS((SIN(PI() * $latitude / 180) * SIN(PI() * R.rest_latitude / 180)) + (COS(PI() * $longitude /180) * cos(PI() * R.rest_latitude / 180) * COS(PI() * R.rest_longitude / 180 - PI() * $longitude / 180)) ) <= $miles";

$sqlMi = "SELECT R.rest_name,R.rest_address, R.rest_category, R.rest_phone, E.event_day_of_week, E.event_type, E.event_start_time, E.event_end_time, E.event_category, ( 3959 * ACOS( COS( RADIANS($latitude) ) * COS( RADIANS( R.rest_latitude ) ) * COS( RADIANS( R.rest_longitude ) - RADIANS($longitude) ) + SIN( RADIANS($latitude) ) * SIN( RADIANS( R.rest_latitude ) ) ) ) AS Distance FROM EVENTS_temp_loggedin E, RESTAURANT_2_temp_loggedin R WHERE 1=1 AND R.rest_key = E.rest_id HAVING Distance <= $miles ORDER BY Distance LIMIT 0, 20";

$result2 = mysql_query($sqlMi) or die(mysql_error());
echo "<table border='1'>
<tr>
<th>Restaurant Name</th>
<th>Restaurant Address</th>
<th>Restaurant Category</th>
<th>Restaurant Phone</th>
<th>Event Day</th>
<th>Event Type</th>
<th>Event Start Time</th>
<th>Event End Time</th>
<th>Event Category</th>
<th>Distance in Miles</th>
</tr>";


while($row = mysql_fetch_array($result2))
  {
  	echo "<tr>";
	echo "<td>" . $row['rest_name'] . "</td>";
	echo "<td>" . $row['rest_address'] . "</td>";
	echo "<td>" . $row['rest_category'] . "</td>";
	echo "<td>" . $row['rest_phone'] . "</td>";
	echo "<td>" . $row['event_day_of_week'] . "</td>";
	echo "<td>" . $row['event_type'] . "</td>";
	echo "<td>" . $row['event_start_time'] . "</td>";
	echo "<td>" . $row['event_end_time'] . "</td>";
	echo "<td>" . $row['event_category'] . "</td>";
	echo "<td>" . $row['Distance'] . "</td>";
 	echo "</tr>";
  }
echo "</table>";

mysql_close($conn);
?>