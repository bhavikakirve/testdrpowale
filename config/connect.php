<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_drpowle";
// Create connection
$conn = mysql_connect($servername, $username, $password);



// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_error());
}

//echo "Connected successfully";

$db_selected = mysql_select_db($db, $conn);
if (!$db_selected) {
    die ("Can\'t use $db : " . mysql_error());
}
?>