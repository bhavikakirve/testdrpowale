<?php
//echo "connect page loaded";
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_drpowle";
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//echo "Connected successfully";
$db_selected = mysql_select_db($db, $conn);
if (!$db_selected) {
    die ("Can\'t use $db : " . mysql_error());
}
?>