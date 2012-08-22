<?php
//Three parts to the querystring: q is address, output is the format, key is the GAPI key
$key = "ABQIAAAAGroKzMDAOLW_ewmTRNc1fBT5wlRzBJLpkK97ZmXPtQ-C8FCrZhTcPIwWnkyTTpNq9o8a5dQbaOmRCA";
//$address = urlencode($_GET["userloc"]);
//$address = $_GET["userloc"];
//connect to MySQL database
$conn = mysql_connect("dogoadmin.db.8825642.hostedresource.com","dogoadmin","zuCH0IloxF");
$hostname='dogoadmin.db.8825642.hostedresource.com';
$username='dogoadmin';
$password='zuCH0IloxF';
$dbname='dogoadmin';
$db = mysql_select_db("dogoadmin");
$query = "SELECT rest_key, rest_address from RESTAURANT_2";
$result = mysql_query($query) or die(mysql_error());

while (list($rest_key, $rest_address) = mysql_fetch_row($result))
   {
      $mapaddress = urlencode("$rest_address");

      // Desired address
      $url = "http://maps.google.com/maps/geo?q=$mapaddress&output=xml&key=$key";

      // Retrieve the URL contents
      $page = file_get_contents($url);

      // Parse the returned XML file
      $xml = new SimpleXMLElement($page);

      // Parse the coordinate string
      list($longitude, $latitude, $altitude) = explode(",", $xml->Response->Placemark->Point->coordinates);

      // Output the coordinates
      echo "Key: $rest_key, Address: $rest_address, latitude: $latitude, longitude: $longitude <br />";

//echo "List parsing:: "

$sql2 = "UPDATE RESTAURANT_2 SET rest_latitude=$latitude, rest_longitude=$longitude WHERE rest_key=$rest_key";
$result2 = mysql_query($sql2) or die(mysql_error());

   }

mysql_close($conn);
?>