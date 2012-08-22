<?php
ini_set("include_path", ".:/usr/lib/php:/usr/local/lib/php:../../../library/");
//ini_set("include_path", "/Users/dude/Downloads/ZendGdata-1.7.5/library/");

require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');
Zend_Loader::loadClass('Zend_Http_Client');

define("SPREADSHEET_KEY", "p0f7MUBO_3TcXwF7bjsDHHw");
define("USER_WORKSHEET_ID", "od6");
define("LOC_WORKSHEET_ID", "od7");
define("FORM_ID","od4");


//http://spreadsheets.google.com/feeds/list/p0f7MUBO_3TcXwF7bjsDHHw/od7/public/basic
//http://spreadsheets.google.com/feeds/list/p0f7MUBO_3TdUd9jkgu1_TA/od6/public/basic
 
function setupClient() {
  $email = "smwentertainment@gmail.com";
  $password = "jackson5";
  $authservice = Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME;
  $client = Zend_Gdata_ClientLogin::getHttpClient($email, $password, $authservice);
  $gdClient = new Zend_Gdata_Spreadsheets($client);
  return $gdClient;
}
 
function getWkshtListFeed($gdClient, $ssKey, $wkshtId, $queryString=null) {
  $query = new Zend_Gdata_Spreadsheets_ListQuery();
  $query->setSpreadsheetKey($ssKey);
  $query->setWorksheetId($wkshtId);
  if ($queryString !== null) {
    //$query->spreadsheetQuery=$queryString);
    $query->setSpreadsheetQuery($queryString);
  }
  $listFeed = $gdClient->getListFeed($query);
//  $listfeed = service.query(
  return $listFeed;
}
 
function printFeed($feed)
{
  print "printing feed";
  $i = 0;
  foreach($feed->entries as $entry) {
      if ($entry instanceof Zend_Gdata_Spreadsheets_CellEntry) {
         print $entry->title->text .' '. $entry->content->text . "\n";
      } else if ($entry instanceof Zend_Gdata_Spreadsheets_ListEntry) {
         print $i .' '. $entry->title->text .' '. $entry->content->text . "\n";
      } else {
         print $i .' '. $entry->title->text . "\n";
      }
      $i++;
  }
}
 
?>