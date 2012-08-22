<?
include("include/session.php");

/**
 * Main.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */

?>


<html>
<title>Jpmaster77's Login Script</title>
<body>

<table>
<tr><td>


<?
/**
 * User has already logged in, so display relavent links, including
 * a link to the admin center if the user is an administrator.
 */
if($session->logged_in){
   echo "<h1>Logged In</h1>";
   echo "Welcome <b>$session->username</b>, you are logged in. <br><br>"
       ."[<a href=\"userinfo.php?user=$session->username\">My Account</a>] &nbsp;&nbsp;"
       ."[<a href=\"useredit.php\">Edit Account</a>] &nbsp;&nbsp;"
       ."[<a href=\"edit_event.php\">Edit Event or Restaurant info</a>] &nbsp;&nbsp;"
       ."[<a href=\"add_event.php\">Add Restaurant and Event info</a>] &nbsp;&nbsp;";
       
$results =  $database->getEvent($session->username);
//       $results = $database->eventdata
while($row = mysql_fetch_array($results))
  {
  $name = $row['rest_name'];
  	$add = $row['rest_address'];
	$cat= $row['rest_category'];
	$phone=$row['rest_phone'];
	$dow=$row['event_day_of_week'];
	$type=$row['event_type'];
	$start=$row['event_start_time'];
	$end=$row['event_end_time'];
	$e_cat=$row['event_category'];
	$e_id=$row['event_id'];

  
 ?>

 <form action="process.php" method="POST">
<table align="left" border="0" cellspacing="0" cellpadding="3">
<tr><td>
Restaurant Name </td><td><input type="text" name="r_name" value="<? echo $name; ?>"></td></tr>
<tr><td>Restaurant Address </td><td><input type="text" name="r_address" value="<? echo $add; ?>"></td></tr>
<tr><td>Restaurant Category </td><td><input type="text" name="r_cat" value="<? echo $cat; ?>"></td></tr>
<tr><td>Restaurant Phone </td><td><input type="text" name="r_phone" value="<?echo $phone; ?>"></td></tr>
<tr><td>Event Day </td><td><input type="text" name="e_day" value="<? echo $dow; ?>"></td></tr>
<tr><td>Event Type </td><td><input type="text" name="e_type" value="<? echo $type; ?>"></td></tr>
<tr><td>Event Start Time </td><td><input type="text" name="e_starttime" value="<? echo $start; ?>"></td></tr>
<tr><td>Event End Time </td><td><input type="text" name="e_endtime" value="<? echo $end; ?>"></td></tr>
<tr><td>Event Category </td><td><input type="text" name="e_cat" value="<? echo $e_cat; ?>"></td></tr>
<input type="hidden" name="event_id" value="<? echo $e_id; ?>">
<input type="hidden" name="subeditEvent" value="1">
<td align="right"><input type="submit" value="Submit Change"></td>
   
   <?
/**
   <tr><td>Restaurant Phone </td><td><input type="text" name="Restaurant Phone" value=" <?echo $row['rest_phone']; ?>"></td></tr>
<tr><td>Event Day </td><td><input type="text" name="Event Day" value="<? echo$row['event_day_of_week']; ?>"></td></tr>
<tr><td>Event Type </td><td><input type="text" name="Event Type" value=" <? echo$row['event_type']; ?>"></td></tr>
<tr><td>Event Start Time </td><td><input type="text" name="Event Start Time" value="<? echo $row['event_start_time']; ?>"></td></tr>
<tr><td>Event End Time </td><td><input type="text" name="Event End Time" value="<? echo$row['event_end_time']; ?>"></td></tr>
<tr><td>Event Category </td><td><input type="text" name="Event Category" value="<? echo$row['event_category']; ?>"></td></tr>
*/

   }
}
   else{
   	echo "Not Logged in!";
   }
   ?>
    </td></tr></table></form>
 
</body>
</html>