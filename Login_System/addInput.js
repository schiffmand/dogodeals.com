var counter = 1;
var limit = 10;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
     	var countertim = counter * 7;
          var newdiv = document.createElement('div');
          newdiv.innerHTML = '<br><b>Promotion ' + (counter + 1) + '</b><br><input type="text" size="' + 40 + '" name="myInputs[' + counter + '][0]"> Category <select name="myInputs[' + counter + '][1]"><option value="Food">Food</option><option value="Drink">Drink</option><option value="Music">Music</option><option value="Other">Other</option></select><br>Monday <input type="hidden" name="days[' + (countertim + 1) + ']" value="NULL"><input type="checkbox" name="days[' + (countertim + 1) + ']" value="Monday"><br>Tuesday <input type="hidden" name="days[' + (countertim + 2) + ']" value="NULL"><input type="checkbox" name="days[' + (countertim + 2) + ']" value="Tuesday"><br>Wednesday<input type="hidden" name="days[' + (countertim + 3) +']" value="NULL"><input type="checkbox" name="days[' + (countertim + 3) + ']" value="Wednesday"><br>Thursday <input type="hidden" name="days[' + (countertim + 4) + ']" value="NULL"><input type="checkbox" name="days[' + (countertim + 4) + ']" value="Thursday"><br>Friday <input type="hidden" name="days[' + (countertim + 5) + ']" value="NULL"><input type="checkbox" name="days[' + (countertim + 5) + ']" value="Friday"><br>Saturday <input type="hidden" name="days[' + (countertim + 6) + ']" value="NULL"><input type="checkbox" name="days[' + (countertim + 6) + ']" value="Saturday"><br>Sunday <input type="hidden" name="days[' + (countertim + 7) + ']" value="NULL"><input type="checkbox" name="days[' + (countertim + 7) + ']" value="Sunday"><br>Start Time <input type="text" size="20" name="starter[' + counter + ']">  End Time <input type="text" size="20" name="ender[' + counter + ']"><br><br>';
          
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}