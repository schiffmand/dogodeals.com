<?php
$counter=1;


$myInputs = $_POST["myInputs"];
$monday = $_POST["monday"];
$tuesday = $_POST["tuesday"];
$wednesday = $_POST["wednesday"];
$thursday = $_POST["thursday"];
$friday = $_POST["friday"];
$saturday = $_POST["saturday"];
$sunday = $_POST["sunday"];
$rest = $_POST["field_1"];
$add = $_POST["field_2"];
$phone = $_POST["field_3"];
$cat = $_POST["field_4"];
$desc = $_POST["field_5"];
$email = $_POST["field_6"];

$count=1;
//foreach ($myInputs as $eachInput) {
 //    $inputs[$count]= $eachInput;
  //   $count = $count + 1;
 //    echo "<br><br>";
//}
//foreach ($monday as $key => $value) {
// echo "Key: $key; Value: $value<br>";

//	$mondays[$count] = $eachMonday;
//	$count=$count +1;
//}
 
//var counter=1
 for($counter=1;$counter<=count($myInputs);$counter++){
 $totaldow = NULL;
 	echo $myInputs[$counter];
 	$inputter = $myInputs[$counter];
 	echo "<br>";
 	//echo $monday[$counter];
 	$mondayQ = $monday[$counter]{0};
 //	echo $mondayQ;
	//echo $tuesday[$counter];
	$tuesdayQ = $tuesday[$counter]{0}.$tuesday[$counter]{1};
//	echo $tuesdayQ;
// 	echo $wednesday[$counter];
$wednesdayQ = $wednesday[$counter]{0};
//echo $wednesdayQ;
// 	echo $thursday[$counter];
$thursdayQ =  $thursday[$counter]{0}.$thursday[$counter]{1};
//echo $thursdayQ;
// 	echo $friday[$counter];
$fridayQ = $friday[$counter]{0};
//echo $fridayQ;
// 	echo $saturday[$counter];
$saturdayQ = $saturday[$counter]{0}.$saturday[$counter]{1};
//echo $saturdayQ;
// 	echo $sunday[$counter];
$sundayQ = $sunday[$counter]{0}.$sunday[$counter]{1};
//echo $sundayQ;
$totaldow = $mondayQ . ',' . $tuesdayQ . ',' . $wednesdayQ . ',' . $thursdayQ . ',' . $fridayQ . ',' . $saturdayQ . ',' . $sundayQ;
echo $totaldow;
 	echo "<br>";
 	$query= "INSERT INTO RESTAURANT_2 (rest_name, rest_address, rest_phone, rest_cat, rest_description, rest_email) VALUES ('$rest', '$add', '$phone', '$cat', '$desc', '$email')";
 	$rest_id_query = "SELECT rest_id from RESTAURANT_2 where rest_name in ('$rest') AND rest_address in ('$add')";
 	$query2 = "INSERT INTO EVENTS_temp (rest_id, event_day_of_week, event_type, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday) VALUES ('$rest_id', '$totaldow', '$inputter', '$mondayQ', '$tuesdayQ', '$wednesdayQ', '$thursdayQ', '$fridayQ', '$saturdayQ', '$sundayQ')";
 	
 
 }
 	
 	

//$where_form_is="http://".$_SERVER['SERVER_NAME'].strrev(strstr(strrev($_SERVER['PHP_SELF']),"/"));

// Checkbox handling
//$field_8_opts = $_POST['field_8'][0].",". $_POST['field_8'][1].",". $_POST['field_8'][2].",". $_POST['field_8'][3].",". $_POST['field_8'][4].",". $_POST['field_8'][5].",". $_POST['field_8'][6];

/*include("config.inc.php");
$link = mysql_connect($db_host,$db_user,$db_pass);
if(!$link) die ('Could not connect to database: '.mysql_error());
mysql_select_db($db_name,$link);
$query = "INSERT into `".$db_table."` (field_1,field_2,field_3,field_4,field_5,field_6,field_7,field_8) VALUES ('" . $_POST['field_1'] . "','" . $_POST['field_2'] . "','" . $_POST['field_3'] . "','" . $_POST['field_4'] . "','" . $_POST['field_5'] . "','" . $_POST['field_6'] . "','" . $_POST['field_7'] . "','" . $_POST['field_8'] . "')";
mysql_query($query);
mysql_close($link);
*/
//include("confirm.html");

?>