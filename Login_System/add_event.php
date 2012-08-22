<?php
include("include/session.php");

?>
	<html>
	<head>
		<title>Restaurant Add Form</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"><link href="style.css" rel="stylesheet" type="text/css">

 	    <!-- expand/collapse function -->
	    <SCRIPT type=text/javascript>
		<!--
		function collapseElem(obj)
		{
			var el = document.getElementById(obj);
			el.style.display = 'none';
		}


		function expandElem(obj)
		{
			var el = document.getElementById(obj);
			el.style.display = '';
		}


		//-->
		</SCRIPT>
		<!-- expand/collapse function -->


		<!-- expand/collapse function -->
		    <SCRIPT type=text/javascript>
			<!--

			// collapse all elements, except the first one
			function collapseAll()
			{
				var numFormPages = 1;

				for(i=2; i <= numFormPages; i++)
				{
					currPageId = ('mainForm_' + i);
					collapseElem(currPageId);
				}
			}


			//-->
			</SCRIPT>
		<!-- expand/collapse function -->


		 <!-- validate -->
		<SCRIPT type=text/javascript>
		<!--
			function validateField(fieldId, fieldBoxId, fieldType, required)
			{
				fieldBox = document.getElementById(fieldBoxId);
				fieldObj = document.getElementById(fieldId);

				if(fieldType == 'text'  ||  fieldType == 'textarea'  ||  fieldType == 'password'  ||  fieldType == 'file'  ||  fieldType == 'phone'  || fieldType == 'website')
				{	
					if(required == 1 && fieldObj.value == '')
					{
						fieldObj.setAttribute("class","mainFormError");
						fieldObj.setAttribute("className","mainFormError");
						fieldObj.focus();
						return false;					
					}

				}


				else if(fieldType == 'menu'  || fieldType == 'country'  || fieldType == 'state')
				{	
					if(required == 1 && fieldObj.selectedIndex == 0)
					{				
						fieldObj.setAttribute("class","mainFormError");
						fieldObj.setAttribute("className","mainFormError");
						fieldObj.focus();
						return false;					
					}

				}


				else if(fieldType == 'email')
				{	
					if((required == 1 && fieldObj.value=='')  ||  (fieldObj.value!=''  && !validate_email(fieldObj.value)))
					{				
						fieldObj.setAttribute("class","mainFormError");
						fieldObj.setAttribute("className","mainFormError");
						fieldObj.focus();
						return false;					
					}

				}



			}

			function validate_email(emailStr)
			{		
				apos=emailStr.indexOf("@");
				dotpos=emailStr.lastIndexOf(".");

				if (apos<1||dotpos-apos<2) 
				{
					return false;
				}
				else
				{
					return true;
				}
			}


			function validateDate(fieldId, fieldBoxId, fieldType, required,  minDateStr, maxDateStr)
			{
				retValue = true;

				fieldBox = document.getElementById(fieldBoxId);
				fieldObj = document.getElementById(fieldId);	
				dateStr = fieldObj.value;


				if(required == 0  && dateStr == '')
				{
					return true;
				}


				if(dateStr.charAt(2) != '/'  || dateStr.charAt(5) != '/' || dateStr.length != 10)
				{
					retValue = false;
				}	

				else	// format's okay; check max, min
				{
					currDays = parseInt(dateStr.substr(0,2),10) + parseInt(dateStr.substr(3,2),10)*30  + parseInt(dateStr.substr(6,4),10)*365;
					//alert(currDays);

					if(maxDateStr != '')
					{
						maxDays = parseInt(maxDateStr.substr(0,2),10) + parseInt(maxDateStr.substr(3,2),10)*30  + parseInt(maxDateStr.substr(6,4),10)*365;
						//alert(maxDays);
						if(currDays > maxDays)
							retValue = false;
					}

					if(minDateStr != '')
					{
						minDays = parseInt(minDateStr.substr(0,2),10) + parseInt(minDateStr.substr(3,2),10)*30  + parseInt(minDateStr.substr(6,4),10)*365;
						//alert(minDays);
						if(currDays < minDays)
							retValue = false;
					}
				}

				if(retValue == false)
				{
					fieldObj.setAttribute("class","mainFormError");
					fieldObj.setAttribute("className","mainFormError");
					fieldObj.focus();
					return false;
				}
			}
		//-->
		</SCRIPT>
	   
<?
 if($session->logged_in){
 	$rest_list = $database->getRestaurants($session->username);
//$rest_assoc = mysql_fetch_assoc($rest_list);
// var_dump($rest_list);
//$row = mysql_fetch_array($rest_list))
  //$rester = mysql_fetch_array($database->getRestaurants($session->username));
  //	var_dump($rest_list);
 $name="field_1";
 	$html = '<select name="'.$name.'">';
  while($row = mysql_fetch_array($rest_list))
  {
	$html .= '<option value='.$row['rest_name'].'>'.$row['rest_name'].'</option>';
			}
	$html .= '</select>';

  	
	
  
  
  echo "<BR>";
/* foreach($rest_assoc as $resting){
  	echo $resting;
  	echo "<BR>";
  }
  */
  	//  	var_dump($rest_assoc);
  	/*
function generateSelect($name = '', $options) {
	$html = '<select name="'.$name.'">';
	//foreach ($options as $option) {
		while($option = mysql_fetch_array($options)){
		$html .= '<option value='.$option.'>'.$option.'</option>';
	}
	$html .= '</select>';
	return $html;
}
echo $html;
*/
?>	
	</head>

	<body onLoad="collapseAll()">

	<div id="mainForm">




		<div id="formHeader">
				<h2 class="formInfo">DoGo Deals</h2>
				<p class="formInfo"></p>
		</div>


		<BR/><!-- begin form -->
		<form method=post enctype=multipart/form-data action=processor.php onSubmit="return validatePage1();"><ul class=mainForm id="mainForm_1">

				<li class="mainForm" id="fieldBox_1">
					<label class="formFieldQuestion">Restaurant Name&nbsp;*&nbsp;<a class=info href=#><img src=imgs/tip_small.png border=0><span class=infobox>Restaurant Name</span></a></label>
					<? echo $html;
						?>
					</li>
<input type="hidden" name="subaddevent" value="1">

				
<script src="addInput.js" language="Javascript" type="text/javascript"></script>
     <div id="dynamicInput"><b>
          Promotion</b><font size="1"> ie: Live Jazz, $2 appetizers, $1 drafts, $35 prixe fix menu, Ladies night etc. </font><br><input type="text" size='40' name="myInputs[0][0]">
             Category <select name="myInputs[0][1]">
          <option value="Food">Food</option>
          <option value="Drink">Drink</option>
          <option value="Music">Music</option>
          <option value="Other">Other</option></select><br>
          Monday<input type="hidden" name="days[1]" value="NULL"><input type="checkbox" name="days[1]" value="Monday"><br>
Tuesday<input type="hidden" name="days[2]" value="NULL"><input type="checkbox" name="days[2]" value="Tuesday"><br>
Wednesday<input type="hidden" name="days[3]" value="NULL"><input type="checkbox" name="days[3]" value="Wednesday"><br>
Thursday<input type="hidden" name="days[4]" value="NULL"><input type="checkbox" name="days[4]" value="Thursday"><br>
Friday<input type="hidden" name="days[5]" value="NULL"><input type="checkbox" name="days[5]" value="Friday"><br>
Saturday<input type="hidden" name="days[6]" value="NULL"><input type="checkbox" name="days[6]" value="Saturday"><br>
Sunday<input type="hidden" name="days[7]" value="NULL"><input type="checkbox" name="days[7]" value="Sunday"><br><br>
Start Time <input type="text" size="20" name="starter[0]">
End Time <input type="text" size="20" name="ender[0]">
<br>
  <br></div>
  <input type="button" value="Add another Event" onClick="addInput('dynamicInput');">


	<!-- next page buttons --><li class="mainForm">
					<input id="saveForm" class="mainForm" type="submit" value="Submit" />
				</li>


			<!-- end of form -->
		<!-- close the display stuff for this page -->
	</form></ul>

		<script type=text/javascript>
<!--
	function validatePage1()
			{
				retVal = true;
if (validateField('field_1','fieldBox_1','menu',1) == false)
 retVal=false;
if (validateField('field_2','fieldBox_2','text',1) == false)
 retVal=false;
if (validateField('field_3','fieldBox_3','text',0) == false)
 retVal=false;
if (validateField('field_4','fieldBox_4','menu',1) == false)
 retVal=false;
if (validateField('field_5','fieldBox_5','text',1) == false)
 retVal=false;
if (validateField('field_6','fieldBox_6','text',1) == false)
 retVal=false;

//if (validateField('field_7','fieldBox_7','text',1) == false)
// retVal=false;
//if (validateField('field_8','fieldBox_8','checkbox',1) == false)
 //retVal=false;

				if(retVal == false)
				{
					alert('Please correct the errors.  Fields marked with an asterisk (*) are required');
					return false;
				}
			
//return retVal;
return retVal;
			}
			//-->
</script>

		<!-- end page validaton -->


<?
 }
 Else
 {
?>
 </head>

 	<h1>Login</h1>
<?
/**
 * User not logged in, display the login form.
 * If user has already tried to login, but errors were
 * found, display the total number of errors.
 * If errors occurred, they will be displayed.
 */
if($form->num_errors > 0){
   echo "<font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font>";
}
?>
<form action="process.php" method="POST">
<table align="left" border="0" cellspacing="0" cellpadding="3">
<tr><td>Username:</td><td><input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>"></td><td><? echo $form->error("user"); ?></td></tr>
<tr><td>Password:</td><td><input type="password" name="pass" maxlength="30" value="<? echo $form->value("pass"); ?>"></td><td><? echo $form->error("pass"); ?></td></tr>
<tr><td colspan="2" align="left"><input type="checkbox" name="remember" <? if($form->value("remember") != ""){ echo "checked"; } ?>>
<font size="2">Remember me next time &nbsp;&nbsp;&nbsp;&nbsp;
<input type="hidden" name="sublogin" value="1">
<input type="submit" value="Login"></td></tr>
<tr><td colspan="2" align="left"><br><font size="2">[<a href="forgotpass.php">Forgot Password?</a>]</font></td><td align="right"></td></tr>
<tr><td colspan="2" align="left"><br>Not registered? <a href="register.php">Sign-Up!</a></td></tr>
</table>
</form>

<?
}

/**
 * Just a little page footer, tells how many registered members
 * there are, how many users currently logged in and viewing site,
 * and how many guests viewing site. Active users are displayed,
 * with link to their user information.
 */
/*
echo "</td></tr><tr><td align=\"center\"><br><br>";
echo "<b>Member Total:</b> ".$database->getNumMembers()."<br>";
echo "There are $database->num_active_users registered members and ";
echo "$database->num_active_guests guests viewing the site.<br><br>";
*/
//echo "<br>";
//echo "<td align=\"left\" valign=\"bottom\">";
include("include/view_active.php");
?>
 	
		<!-- end of this page -->

		<!-- page validation -->

			<!-- end of form -->
		<!-- close the display stuff for this page -->
		</ul></div>
	</body>
	</html>
	
	