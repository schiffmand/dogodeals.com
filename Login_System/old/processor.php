<?php
include("include/session.php");

$myInputs = $_POST["myInputs"];
$totalweek = "";
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
$rest = trim($_POST["field_1"]);
$add = trim($_POST["field_2"]);
$phone = $_POST["field_3"];
$cat = $_POST["field_4"];
$desc = $_POST["field_5"];
$email = $_POST["field_6"];
$userdude = $session->username;
$time = $session->time;

if($session->logged_in)
{
	$query= "INSERT INTO RESTAURANT_2_temp_loggedin (timestamp, username, rest_name, rest_address, rest_phone, rest_category, rest_desc, rest_email) VALUES ('$time', '$userdude', '$rest', '$add', '$phone', '$cat', '$desc', '$email')";

 $restidQ = "SELECT rest_key FROM RESTAURANT_2_temp_loggedin WHERE rest_name IN ('$rest') AND username IN ('$userdude') AND rest_address in ('$add')";

 $database->query($query);
 	$restkey_result = $database->query($restidQ);

 	
 	$restkey_array = mysql_fetch_array($restkey_result);
 	$restkey = $restkey_array[0];


for($counter=0;!empty($myInputs[$counter]);$counter++)
{
	$inputter = $myInputs[$counter];
	//countermult is the counter reference used for the days[] which indexed at 1
	$countercheck = $counter + 1;
	$counterstep = $countercheck*7;
	//loop to get days based on 7 day week where blank days are 0

/*
	for($countermult=$counterstep;$countermult>$counterstep-7;$countermult--)
		{

			if(!empty($days[$countermult]))
			{
		$totalweek += substr($days[$countermult], 0, 2) . ",";
			echo $countermult;
			echo "<br>";
			echo $days[$countermult];
			echo "<br>";
			echo $totalweek;
			}
		
	
		}	
*/	

//		$totalweek += substr($days[$i*$countercheck],0,2) . ",";
			
			
	//	$totalweek = substr($totalweek, 0, -1);
		$mondayQ = $days[($countercheck*7) - 6];
		$tuesdayQ = $days[($countercheck*7) - 5];
		$wednesdayQ = $days[($countercheck*7) - 4];
		$thursdayQ = $days[($countercheck*7) - 3];
		$fridayQ = $days[($countercheck*7) - 2];
		$saturdayQ = $days[($countercheck*7) - 1];
		$sundayQ = $days[($countercheck*7)];
		
	$query2 = "INSERT INTO EVENTS_temp_loggedin (timestamp, username, rest_id, event_day_of_week, event_type, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday) VALUES ('$time', '$userdude', '$restkey', '$totalweek', '$inputter', '$mondayQ', '$tuesdayQ', '$wednesdayQ', '$thursdayQ', '$fridayQ', '$saturdayQ', '$sundayQ')";
 		$database->query($query2);			
}

}
include("confirm.html");
?>
<script type=text/javascript> alert('Thank you for your entry. The information you provided will be added to our database momentarily.'); </script>