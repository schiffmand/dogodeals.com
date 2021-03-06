<?php
 
require_once 'goog_ssheet.php';
 
$username = $_GET['username'];
$password = $_GET['password'];
 
$gdClient = setupClient();
 
 
$listFeed = getWkshtListFeed($gdClient, SPREADSHEET_KEY, USER_WORKSHEET_ID, ('user='.$username));
//$listFeed = getWkshtListFeed($gdClient, "p0f7MUBO_3TcXwF7bjsDHHw", 1, ('user='.$username));
//printfeed($listfeed);

$password_hash = sha1($password);
$row = $listFeed->entries[0];
$rowData = $row->getCustom();
foreach($rowData as $customEntry) {
  if ($customEntry->getColumnName()=="password" && $customEntry->getText()==$password_hash) {
    $updatedRowArray["user"] = $username;
    $updatedRowArray["password"] = sha1($password);
    $updatedRowArray["session"] = md5(uniqid(rand(), true));
    $updatedRow = $gdClient->updateRow($row, $updatedRowArray); 
    if ($updatedRow instanceof Zend_Gdata_Spreadsheets_ListEntry) {
      echo $updatedRowArray["session"];
    }
  }
}

$listFeed2 = getWkshtListFeed($gdClient, SPREADSHEET_KEY, FORM_ID, ('user='.$username));
printFeed($listFeed2);

?>