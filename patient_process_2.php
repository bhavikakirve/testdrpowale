<?php
	require_once "config/connect.php";
	include "config/functions.php";
	$branchid = 1;
	$patient_id = $_REQUEST['patientid'];
	if(strlen($patient_id)==0){
		//echo "0 found";
		$patient_id = getnextpatient_id('NP');
		//echo "<br/>ptid:".$patient_id;
	}
	$patient_name = $_REQUEST['patientname'];
	$gender = $_REQUEST['gender'];
	$dob = $_POST['dob'];
	//echo "dob:".str_replace('/', '-', $dob);
	$dob = date ("Y-m-d H:i:s", strtotime(str_replace('/', '-', $dob)));
	//echo "converted:".$dob;
	$age = ageCalculator($dob);
	$pid = 0;
	$edid = 0;
	$symtom_id = 0;
	

	// add patient details
	$checkpat = mysql_query("select pid from patient_details where patient_id = '".$patient_id."'");
	//echo "select pid from patient_details where patient_id = '".$patient_id."'";
	if(mysql_num_rows($checkpat)>0){
		while($r = mysql_fetch_array($checkpat)){
			$pid = $r['pid'];
		}		
	}else{
		$addpat = mysql_query("insert into patient_details(patient_id,patient_name,gender,date_of_birth,created_by,created_on) values 
		('".$patient_id."','".$patient_name."','".$gender."','".$dob."',1,now())");
		$pid = mysql_insert_id();
	}

	// add everyday details
	$add_ed_details = mysql_query("insert into ed_patient_diagnosis(pid,patient_id,age,branch_id,created_on,created_by) values (".$pid.",'".$patient_id."', '".$age."','".$branchid."',now(),1)");
	$edid = mysql_insert_id();

	$getsymtoms = mysql_query("select * from symtoms");
	while($row = mysql_fetch_array($getsymtoms)){
		$symtoms[$row['symtom']] = $row['symtom_id'];
	}
	//print_r($symtoms);

	foreach($_REQUEST['symtoms'] as $key=>$val){
		//echo "val".$val;
		if(isset($symtoms[$val])){
			$symtom_id = $symtoms[$val];
			//echo "<br/>symid".$symtom_id;
		}
		// add patient symtoms
		$addsymtom = mysql_query("insert into ed_patient_symtoms (ed_id,pid,patient_id,symtom_id) values (".$edid.",".$pid.",'".$patient_id."',".$symtom_id.")");
		//echo "<br/>insert into ed_patient_symtoms (ed_id,pid,patient_id,symtom_id) values (".$edid.",".$pid.",'".$patient_id."',".$symtom_id.")";
		$epsid = mysql_insert_id();

		//get qtns
		$qtnid = $_REQUEST[$val];
		
		// add qtns
		$addqtn = mysql_query("insert into ed_patient_qtns (eps_id,ed_id,pid,patient_id,qtn_id) values (".$epsid.",".$edid.",".$pid.",'".$patient_id."',".$qtnid.")");
		$edq_id = mysql_insert_id();

		$getmedicine = mysql_query("select medicine from questions where question_id = ".$qtnid." and medicine !=0");
		while($r2 = mysql_fetch_array($getmedicine)){
			$medicine = $r2['medicine'];
		}
		$addmedicine = mysql_query("insert into ed_patient_medicine (edq_id,pid,patient_id,eps_id,ep_medicine) values (".$edq_id.",".$pid.",'".$patient_id."',".$epsid.",'".$medicine."')");
		//echo "insert into ed_patient_medicine (edq_id,pid,patient_id,eps_id,ep_medicine) values (".$edq_id.",".$pid.",".$patient_id.",".$epsid.",'".$medicine."')";
		
	}
if($add_ed_details){
	header	("Location:patient.php?s=y&pt=$patient_id");
}else{
	header ("Location:patient.php?s=n");
}
?>