<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rapleaf Person API Sample - PHP</title>
<body style="padding-left:50px;padding-right:50px;background-color:#ddeedd;">
<h1>Rapleaf Person API Sample - PHP</h1>

<form action="rapleaf_main.php" method="post">
	<table>
	<tr><td>Email: </td><td><input type="text" name="email" size="40"/></td></tr>
	<tr><td><a href="http://www.rapleaf.com/developer/api_key">API Key:</a> </td><td><input type="text" name="api_key" size="40" /></td></tr>	
	</table><br />
	<input type="submit" value="Get All Details!" />
</form><br />
<a href="http://www.rapleaf.com/developer/api_key">Get API key here.</a>
<hr />

<?php
// this is including the library PHP file.
require_once 'rapleaf_personlib.php';

if (sizeof($_POST) > 1) {
	
	// this is where the API key goes in. Intialize the profile.
	$profile = new RapleafProfile($_POST['api_key']);
	
	// this is the most important step. this gets ALL the details stored into $result.
	// Note that this library does not support a partial key-based return.
	$result = $profile->getData($_POST['email']);

	if ($result['status']=='200') { # OK
		
		$basics = $result['basics'];
		echo "<strong>BASIC DETAILS </strong><br />";
		echo "Name : "; echo $basics['name'];echo " <br />";
		echo "Age: "; echo $basics['age'];echo " <br />";
		echo "Location : "; echo $basics['location'];echo " <br />";
		echo "Gender : "; echo $basics['gender'];echo " <br />";
		echo "EKC : "; echo $basics['earliest_known_activity'];echo " <br />";
		echo "LKC : "; echo $basics['latest_known_activity'];echo " <br />";
		echo "No of Friends : "; echo $basics['num_friends'];echo " <br />";
		//show universities
		echo "<strong>UNIVERSITIES </strong><br />";
		foreach ($basics['universities'] as $university) { 
			echo $university.'<br />'; 
		}
		echo "<strong>OCCUPATIONS </strong><br />";
		//show occupations
		foreach ($basics['occupations'] as $occupation) { 
			if($occupation['job_title']!='') echo 'job title : ' .  $occupation['job_title'] .'<br />'; 
			else echo 'job title : null <br />';
			if($occupation['company']!='') echo 'company : ' .  $occupation['company'] .'<br />'; 
			else echo 'company : null <br />';
		}
		echo "<hr />";
		echo "<strong>PRIMARY MEMBERSHIPS </strong><br />";
		$pmemberships = $result['memberships-primary'];
		//show primary memberships
		foreach ($pmemberships as $pmembership) { 
			echo $pmembership['site'];echo "  . ";
			echo $pmembership['exists'];echo "  . ";
			echo $pmembership['profile_url'];echo "  . <br />";
		}
		
		echo "<hr />";
		echo "<strong>SUPPLEMENTAL DETAILS </strong><br />";
		$smemberships = $result['memberships-supplemental'];
		//show supplemental memberships
		foreach ($smemberships as $smembership) { 
			echo $smembership['site'];echo "  . ";
			echo $smembership['exists'];echo "  . ";
			echo $smembership['profile_url'];echo "  . <br />";
		}
		
		echo "<hr />";
		echo "<strong>REPUTATION</strong><br />";
		$reputation = $result['reputation'];
		//show reputations
		echo "Score : ";echo $reputation['score'];echo " <br />";
		echo "Commerce Score : ";echo $reputation['commerce_score'];echo " <br />";
		echo "Percent Positive : ";echo $reputation['percent_positive'];echo " <br />";
		echo "Rapleaf Profile URL : ";echo $reputation['rapleaf_profile_url'];echo " <br />";
		echo "Badges URLs <br />";
		foreach ($reputation['badges'] as $badge) { 
			echo $badge;echo " <br />";
		}		
			
	} else {
		echo $result['status'].': '.$result['error'];
	}

}
?>

</body>
</html>