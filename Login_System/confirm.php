<?php
include("include/session.php");
?>

	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<html>
	<head>
		<title>add_restaurant - created by phpFormGenerator</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"><link href="style.css" rel="stylesheet" type="text/css">
		<!-- calendar stuff -->
		      <link rel="stylesheet" type="text/css" href="calendar/calendar-blue2.css" />
		      <script type="text/javascript" src="calendar/calendar.js"></script>
		      <script type="text/javascript" src="calendar/calendar-en.js"></script>
		      <script type="text/javascript" src="calendar/calendar-setup.js"></script>
		<!-- END calendar stuff -->

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
		<!-- end validate -->




	</head>

	<body onLoad="collapseAll()">

	<div id="mainForm">




		<div id="formHeader">
				<h2 class="formInfo">add_restaurant</h2>
				<p class="formInfo"></p>
		</div>


		<BR/><ul class=mainForm><li class=mainForm><label class=formFieldQuestion>Thank you. Your entry will be added to our database momentarily</label></li></ul><BR/></div><div id="footer"></div>
		<meta http-equiv="REFRESH" content="0;url=http://www.dogodeals.com/login_system/main.php">

	</body>
	</html>