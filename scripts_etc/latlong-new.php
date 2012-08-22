<?php
//Three parts to the querystring: q is address, output is the format, key is the GAPI key
$key = "ABQIAAAAGroKzMDAOLW_ewmTRNc1fBT5wlRzBJLpkK97ZmXPtQ-C8FCrZhTcPIwWnkyTTpNq9o8a5dQbaOmRCA";
$address = urlencode($_GET["userloc"]);
//$address = $_GET["userloc"];

//If you want an extended data set, change the output to "xml" instead of csv
$url = "http://maps.google.com/maps/geo?q=".$address."&output=csv&key=".$key;
//Set up a CURL request, t
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_HEADER,0); //Change this to a 1 to return headers
//curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
 
$data = curl_exec($ch);
curl_close($ch);

//Check our Response code to ensure success
if (substr($data,0,3) == "200")
{
$data = explode(",",$data);
 
$precision = $data[1];
$latitude = $data[2];
$longitude = $data[3];
echo "Latitude: " .$latitude. "<br>";
echo "Longitude: ".$longitude. "<br>";

 
} else {
echo "Error in geocoding! Http error ".substr($data,0,3);
}
?>