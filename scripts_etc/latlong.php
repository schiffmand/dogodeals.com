<html><body><center>
Your latitude/longitude is 
<?php function geoLocateUser() {
$location = $_GET["userLoc"]; 
  $location = $this->urlEncode(' ', '+', $location); 
$key = "ABQIAAAAGroKzMDAOLW_ewmTRNc1fBT5wlRzBJLpkK97ZmXPtQ-C8FCrZhTcPIwWnkyTTpNq9o8a5dQbaOmRCA";


// encode url here...

 

  $request  = 'http://maps.google.com/maps/geo?';

  $request .= 'q='.$location.'&';

  $request .= 'key='.$key.'&';

  $request .= 'output='.$config_ga['format'].'&';

  $request .= 'oe=utf8';

 

  $response  = file_get_contents($request);

 

  $result = simplexml_load_string($response);

 

  $latLong = (string)$result->Response->Placemark->Point->coordinates;

 

  return $latLong;
}
geoLocateUser();
// End of geoLocateUser()
?>