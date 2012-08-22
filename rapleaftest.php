<?

  include "RapleafApi.php";
$person = $argv[1];
  $response = query_by_email($person, true);
  foreach ($response as $key => $value) {
    echo $key . " = " . $value . "\n";
  }
?>
?>