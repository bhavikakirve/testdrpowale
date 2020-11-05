<?php
require_once "../config/connect.php";
$srid = $_REQUEST['sid'];
$getpatientdata = mysql_query("select patient_id, patient_name, contact_no, date_of_birth, gender, chief_complain, past_history, family_history from patient_details where patient_id = '".$srid."'");
while($pr = mysql_fetch_array($getpatientdata)){
	$patientdata = '{"patient_id":"'.$pr['patient_id'].'","patient_name":"'.$pr['patient_name'].'","contact_no":"'.$pr['contact_no'].'","dob":"'.date_format(date_create($pr['date_of_birth']),'d-m-Y').'","gender":"'.$pr['gender'].'","chief_complain":"'.$pr['chief_complain'].'","past_history":"'.$pr['past_history'].'","family_history":"'.$pr['family_history'].'"}';
		
}
echo $patientdata;
?>