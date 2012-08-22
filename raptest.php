<html>
<form action="form_action.asp" method="get">
  First name: <input type="text" name="fname" /><br />
  Last name: <input type="text" name="lname" /><br />
  Email AddressL <input type="text" name="email" /<br />
  <input type="submit" value="Submit" />
</form>

<?php
 ' namespace Rapleaf;
  include "RapleafApi.php";
  $api = new RapleafApi();
  try {
    $response = $api -> query_by_email(email, 
                                       $hash_email = true);
    foreach ($response as $key => $value) {
     echo $key . " = " . $value . "\n";
    }
  } catch (\Exception $e) {
    echo 'Caught exception: ' .  $e->getMessage() . "\n";
  }
?>
</html>