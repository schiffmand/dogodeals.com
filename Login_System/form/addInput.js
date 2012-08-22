var counter = 1;
var limit = 10;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<br><b>Promotion " + (counter + 1) + "</b><br><input type='text' size=" + '40' + " name='myInputs[]'><br>Monday<input type='checkbox' name='monday[]' value='Monday'><br>Tuesday<input type='checkbox' name='tuesday[]' value='Tuesday'><br>Wednesday<input type='checkbox' name='wednesday[]' value='Wednesday'><br>Thursday<input type='checkbox' name='thursday[]' value='Thursday'><br>Friday<input type='checkbox' name='friday[]' value='Friday'><br>Saturday<input type='checkbox' name='saturday[]' value='Saturday'><br>Sunday<input type='checkbox' name='sunday[]' value='Sunday'><br>";

          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}