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

			function validatePage1()
			{
				retVal = true;
/*				if (validateField('field_1','fieldBox_1','text',1) == false)
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
if (validateField('field_7','fieldBox_7','text',1) == false)
 retVal=true;
if (validateField('field_8','fieldBox_8','checkbox',1) == false)
 retVal=true;

				if(retVal == false)
				{
					alert('Please correct the errors.  Fields marked with an asterisk (*) are required');
					return false;
				}
*/				
//return retVal;
return retVal;
			}

