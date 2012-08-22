<?php

$connection = mysql_connect("localhost", "root", "");

if ($connection) {
    echo "MySQL connection is successful.";
} else {
    echo "MySQL connection failed.";
}

?>