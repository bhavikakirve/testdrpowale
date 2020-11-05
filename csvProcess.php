<?php
include "config/connect.php";
$branch = $_REQUEST['branch'];
$filename = $branch."_".date("Y-m-d H:i") .".csv";

header('Content-type: text/csv');
header("Content-Disposition:attachment;filename=".$filename);

// do not cache the file
header('Pragma: no-cache');
header('Expires: 0');

$fp = fopen('php://output', 'w');


$query = mysql_query("select contact_no,patient_name from `patient_details` WHERE `patient_id` like '".$branch."%'");

while ($row = mysql_fetch_assoc($query))
{ 
    fputcsv($fp, $row);
    
}

exit;