<?
include("include/session.php");

 if($session->logged_in){
 	$rest_list = $database->getRestaurants($session->username);
//$rest_array = mysql_fetch_assoc($rest_list);
 //var_dump($rest_array);
 echo "<br>";
 var_dump($rest_list);
 echo "<br>";
 while($row=mysql_fetch_assoc($rest_list)){
 	echo $row["rest_name"];
 	echo $row["username"];
 }
 }
 else{
 }
 

?>	
