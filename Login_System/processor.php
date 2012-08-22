<?php
include("include/session.php");
/*
class Processor
{
	function CheckRefer(){
		if(isset($_POST['subaddevent'])){
			$this->procAddEvent();
		}
		else if(isset($_POST['subaddrest'])){
			$this->procAddRest();
		}
		else{
			header("Location: main.php");
		}
	}

function procAddRest(){
*/		

$myInputs = $_POST["myInputs"];

/*
$monday = $_POST["monday"];
$tuesday = $_POST["tuesday"];
$wednesday = $_POST["wednesday"];
$thursday = $_POST["thursday"];
$friday = $_POST["friday"];
$saturday = $_POST["saturday"];
$sunday = $_POST["sunday"];
*/
$days = $_POST["days"];
$starter = $_POST["starter"];
$ender = $_POST["ender"];
$rest = trim($_POST["field_1"]);
$key = "ABQIAAAAGroKzMDAOLW_ewmTRNc1fBS2VAnPP1hW_vHnyD0DbvSS6AimCBSnumu0UO7Klw5m-5CeuBTRZv_NNA";

if(isset($_POST['subaddrest'])){
$add = trim($_POST["field_2"]);
$phone = $_POST["field_3"];
$cat = $_POST["field_4"];
$desc = $_POST["field_5"];
$email = $_POST["field_6"];
$cuisine = $_POST["field_7"];
$outdoor = $_POST["field_8"];
}
$userdude = $session->username;
$timestamp = $session->time;



if($session->logged_in)
{
if(isset($_POST['subaddrest'])){
	$query= "INSERT INTO RESTAURANT_2_temp_loggedin (timestamp, username, rest_name, rest_address, rest_phone, rest_category, rest_desc, rest_email, rest_cuisine, rest_outdoor) VALUES ('$timestamp', '$userdude', '$rest', '$add', '$phone', '$cat', '$desc', '$email', '$cuisine', '$outdoor')";

 
 $database->query($query);
}

$restidQ = "SELECT rest_key FROM RESTAURANT_2_temp_loggedin WHERE rest_name IN ('$rest') AND username IN ('$userdude')";

 	$restkey_result = $database->query($restidQ);

 	
 	$restkey_array = mysql_fetch_array($restkey_result);
 	$restkey = $restkey_array[0];

$mapaddress = urlencode("$add");

      // Desired address
      $url = "http://maps.google.com/maps/geo?q=$mapaddress&output=xml&key=$key";

      // Retrieve the URL contents
      $page = file_get_contents($url);

      // Parse the returned XML file
      $xml = new SimpleXMLElement($page);

      // Parse the coordinate string
      list($longitude, $latitude, $altitude) = explode(",", $xml->Response->Placemark->Point->coordinates);

$sql2 = "UPDATE RESTAURANT_2_temp_loggedin SET rest_latitude=$latitude, rest_longitude=$longitude WHERE rest_key=$restkey";
$result2 = mysql_query($sql2) or die(mysql_error());



for($counter=0;!empty($myInputs[$counter]);$counter++)
{
	$totalweek = '';
$inputter = $myInputs[$counter][0];
	$cat = $myInputs[$counter][1];
	$starttime = $starter[$counter];
	$endtime = $ender[$counter];
	//countermult is the counter reference used for the days[] which indexed at 1
	$countercheck = $counter + 1;
	$counterstep = $countercheck*7;
	//loop to get days based on 7 day week where blank days are 0


//	for($countermult=$counterstep;$countermult>$counterstep-7;$countermult--)
for($i=6; $i>0; $i--)
		{

			if($days[($countercheck*7)-$i] != "NULL")
			{
		$totalweek = $totalweek . substr($days[($countercheck*7)-$i], 0, 3) . ',';
			//echo $countermult;
			//echo "<br>";
			//echo $days[$countermult];
			//echo "<br>";
			//echo $totalweek;
			}
		
	
		}	
		//echo $totalweek;
	

//		$totalweek += substr($days[$i*$countercheck],0,2) . ",";
			
			
		$totalweek = substr($totalweek, 0, -1);
		$mondayQ = $days[($countercheck*7) - 6];
		$mondayS = substr($mondayQ,0,1);
		
		$tuesdayQ = $days[($countercheck*7) - 5];
		$tuesdayS = substr($tuesdayQ,0,2);
		
		$wednesdayQ = $days[($countercheck*7) - 4];
		$wednesdayS = substr($wednesdayQ,0,1);
		
		$thursdayQ = $days[($countercheck*7) - 3];
		$thursdayS=substr($thursdayQ,0,2);
		
		$fridayQ = $days[($countercheck*7) - 2];
		$fridayS = substr($fridayQ,0,1);
		
		$saturdayQ = $days[($countercheck*7) - 1];
		$saturdayS = substr($saturdayQ,0,2);
		
		$sundayQ = $days[($countercheck*7)];
		$sundayS = substr($sundayQ,0,2);
		
		//$totalweek = $mondayS . ',' . $tuesdayS . ',' . $wednesdayS . ',' . $thursdayS . ',' . $fridayS . ',' . $saturdayS . ',' . $sundayS;
		//echo $totalweek;
		
		
	$query2 = "INSERT INTO EVENTS_temp_loggedin (timestamp, username, rest_id, event_day_of_week, event_type, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday, event_start_time, event_end_time, event_category) VALUES ('$timestamp', '$userdude', '$restkey', '$totalweek', '$inputter', '$mondayQ', '$tuesdayQ', '$wednesdayQ', '$thursdayQ', '$fridayQ', '$saturdayQ', '$sundayQ', '$starttime', '$endtime', '$cat')";
 		$database->query($query2);			
}

}
include("confirm.html");
//header("Location: ".$session->referrer);
?>
<script type=text/javascript> alert('Thank you for your entry. The information you provided will be added to our database momentarily.'); </script>