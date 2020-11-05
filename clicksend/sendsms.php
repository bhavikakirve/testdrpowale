<?php
if(!session_id()) {
	session_start();
}
	require_once "config/connect.php";
	include "config/functions.php";
//error_reporting(E_ALL);
	$branchid = 1;
	$patient_id = $_REQUEST['patientid'];
	if(strlen($patient_id)==0){
				//echo $_SESSION['branch_code'];
				$patient_id = getnextpatient_id($_SESSION['branch_code']);
	}
	$patient_name = $_REQUEST['patientname'];
	$gender = $_REQUEST['gender'];
	$dob = $_POST['dob'];
	$dob = date ("Y-m-d H:i:s", strtotime(str_replace('/', '-', $dob)));
	$age = "";
	$pid = 0;
	$edid = 0;
	$symtom_id = 0;
	
	$contact_no = $_REQUEST['contactno'];
	$ccomplain = $_REQUEST['ccomplain'];
	$family_history = $_REQUEST['family_history'];
	$charges = $_REQUEST['charges'];
	$patsymtoms = "";
	$disease = "";
	$age = $_POST['age'];

	$past_history = 0;
	$maleria = 0;
	$influenza = 0;
	$tuberculosis = 0;
	$infectious_disease = 0;
	$jaundice = 0;
	$allergy = 0;
	$pneumonia = 0;
	$std_hiv = 0;
	$skin_disease = 0;
	$pleurisy = 0;
	$masturbation = 0;
	$dysentry =  0;
	$worms = 0;
	$gout = 0;
	$headinjury = 0;
	$operation = 0;
	$blood_transfusion = 0;
	$headache = 0;
	$supuration = 0;
	$catching_cold = 0;
	$rheumatic_trouble = 0;
	$typhoid = 0;
	$maleria = 0;
	$bleeding =0;
	$apetite = "";
	$veg = "";
	$desire = "";
	$aversions = "";
	$indigestible_things = "";
	$sleep = "";
	$habits = "";
	$drinks = "";
	$mental_state = "";
	$emotional_state = "";
	$intellectual_state = "";
	$menstrualhistory ="";
	$menses = "";
	$leucorrhoa = "";
	$obstetrical_history = "";
	$physical_exam = "";
	$investigation = "";
	$remedy = "";	

		if(isset($_REQUEST['remedy']))
	{
		//echo "remedy exist";
		$remedy = $_REQUEST['remedy'];
	}	
		if(isset($_REQUEST['typhoid']))
	{
		$typhoid = $_REQUEST['typhoid'];
	}	
		if(isset($_REQUEST['maleria']))
	{
		$maleria = $_REQUEST['maleria'];
	}
		if(isset($_REQUEST['influenza']))
	{
		$influenza = $_REQUEST['influenza'];
	}
		if(isset($_REQUEST['tuberculosis']))
	{
		$tuberculosis = $_REQUEST['tuberculosis'];
	}
		if(isset($_REQUEST['infetious_disease']))
	{
		$infectious_disease = $_REQUEST['infetious_disease'];
	}
		if(isset($_REQUEST['jaundice']))
	{
		$jaundice = $_REQUEST['jaundice'];
	}
		if(isset($_REQUEST['allergy']))
	{
		$allergy = $_REQUEST['allergy'];
	}
		if(isset($_REQUEST['pneumonia']))
	{
		$pneumonia = $_REQUEST['pneumonia'];
	}
		if(isset($_REQUEST['std_hiv']))
	{
		$std_hiv = $_REQUEST['std_hiv'];
	}
		if(isset($_REQUEST['skin_disease']))
	{
		$skin_disease = $_REQUEST['skin_disease'];
	}
		if(isset($_REQUEST['pleurisy']))
	{
		$pleurisy = $_REQUEST['pleurisy'];
	}
		if(isset($_REQUEST['masturbation']))
	{
		$masturbation = $_REQUEST['masturbation'];
	}
		if(isset($_REQUEST['dysentry']))
	{
		$dysentry =  $_REQUEST['dysentry'];
	}
		if(isset($_REQUEST['worms']))
	{
		$worms = $_REQUEST['worms'];
	}
		if(isset($_REQUEST['gout']))
	{
		$gout = $_REQUEST['gout'];
	}
		if(isset($_REQUEST['head_injury']))
	{
		$headinjury = $_REQUEST['head_injury'];
	}
		if(isset($_REQUEST['bleeding']))
	{
		$bleeding = $_REQUEST['bleeding'];
	}
	
		if(isset($_REQUEST['operation']))
	{
		$operation = $_REQUEST['operation'];
	}
		if(isset($_REQUEST['blood_transfusion']))
	{
		$blood_transfusion = $_REQUEST['blood_transfusion'];
	}
		if(isset($_REQUEST['headache']))
	{
		$headache = $_REQUEST['headache'];
	}
		if(isset($_REQUEST['supuration']))
	{
		$supuration = $_REQUEST['supuration'];
	}
		if(isset($_REQUEST['catching_cold']))
	{
		$catching_cold = $_REQUEST['catching_cold'];
	}
		if(isset($_REQUEST['rheumatic_trouble']))
	{
		$rheumatic_trouble = $_REQUEST['rheumatic_trouble'];
	}
		if(isset($_REQUEST['apetite']))
	{
		$apetite = $_REQUEST['apetite'];
	}
		if(isset($_REQUEST['veg']))
	{
		$veg = $_REQUEST['veg'];
	}
		if(isset($_REQUEST['desire']))
	{
		$desire = $_REQUEST['desire'];
	}
		if(isset($_REQUEST['aversions']))
	{
		$aversions = $_REQUEST['aversions'];
	}
		if(isset($_REQUEST['indigestible_things']))
	{
		$indigestible_things = $_REQUEST['indigestible_things'];
	}
		if(isset($_REQUEST['sleep']))
	{
		$sleep = $_REQUEST['sleep'];
	}
		if(isset($_REQUEST['habits']))
	{
		$habits = $_REQUEST['habits'];
	}
		if(isset($_REQUEST['drinks']))
	{
		$drinks = $_REQUEST['drinks'];
	}
		if(isset($_REQUEST['mentalstate']))
	{
		$mental_state = $_REQUEST['mentalstate'];
	}
		if(isset($_REQUEST['emotionalstate']))
	{
		$emotional_state = $_REQUEST['emotionalstate'];
	}
		if(isset($_REQUEST['intellectualstate']))
	{
		$intellectual_state = $_REQUEST['intellectualstate'];
	}
		if(isset($_REQUEST['menstrualhistory']))
	{
		$menstrualhistory = $_REQUEST['menstrualhistory'];
	}
		if(isset($_REQUEST['menses']))
	{
		$menses = $_REQUEST['menses'];
	}
		if(isset($_REQUEST['Leucorrhoa']))
	{
		$leucorrhoa = $_REQUEST['Leucorrhoa'];
	}
		if(isset($_REQUEST['obstetrical_history']))
	{
		$obstetrical_history = $_REQUEST['obstetrical_history'];
	}
		if(isset($_REQUEST['physical_exam']))
	{
		$physical_exam = $_REQUEST['physical_exam'];
	}
		if(isset($_REQUEST['investigation']))
	{
		$investigation = $_REQUEST['investigation'];
	}

	// add patient details
	$checkpat = mysql_query("select pid from patient_details where patient_id = '".$patient_id."'");
	if(mysql_num_rows($checkpat)>0){
		while($r = mysql_fetch_array($checkpat)){
			$pid = $r['pid'];
$addpat = mysql_query("update  patient_details set patient_name = '".$patient_name."', gender = '".$gender."' ,age ='".$age."' ,contact_no ='".$contact_no."',  chief_complain = '".$ccomplain."', family_history = '".$family_history."' where pid = $pid");
		
		}		
	}else{
		$addpat = mysql_query("insert into patient_details(patient_id,patient_name,gender,age,contact_no,chief_complain,family_history,created_by,created_on) values 
		('".$patient_id."','".$patient_name."','".$gender."','".$age."','".$contact_no."','".$ccomplain."','".$family_history."',1,now())");
		$pid = mysql_insert_id();
	}

	// add everyday details
	$add_ed_details = mysql_query("insert into ed_patient_diagnosis(pid,patient_id,age,branch_id,charges,patsymtoms,disease,created_on,created_by) values (".$pid.",'".$patient_id."', '".$age."','".$branchid."','".$charges."','".$patsymtoms."','".$disease."',now(),1)");
	$edid = mysql_insert_id();

	//sending sms code by suyog

if(strlen($contact_no)==10 && is_numeric($contact_no))
{
$sms_no = "91".$contact_no;
$curl = curl_init();
$message  = "Welcome to Dr powale's unique homeopathy clinic.";
$senderid = "VM-powale";
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-mapper.clicksend.com/http/v2/send.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"method\"\r\n\r\nhttp\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"username\"\r\n\r\nsuyogwani1\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"key\"\r\n\r\nEEDE3067-1B9F-C3C5-1E4B-6D4D0C58C2BA\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"to\"\r\n\r\n $sms_no\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"message\"\r\n\r\n$message\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"senderid\"\r\n\r\n$senderid\r\n-----011000010111000001101001--",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: multipart/form-data; boundary=---011000010111000001101001",
    "postman-token: 4198cd1b-941e-252b-572f-801654be7d07"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
}
	//sending sms code by suyog	
	$getsymtoms = mysql_query("select * from symtoms");
	while($row = mysql_fetch_array($getsymtoms)){
		$symtoms[$row['symtom']] = $row['symtom_id'];
	}

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
		$qtnid = $_REQUEST['md_'.$symtom_id];
		//echo $qtnid;
		
		// add qtns
		$addqtn = mysql_query("insert into ed_patient_qtns (eps_id,ed_id,pid,patient_id,qtn_id) values (".$epsid.",".$edid.",".$pid.",'".$patient_id."',".$qtnid.")");
		$edq_id = mysql_insert_id();

		$getmedicine = mysql_query("select medicine from questions where question_id = ".$qtnid."");
		while($r2 = mysql_fetch_array($getmedicine)){
			$medicine = $r2['medicine'];
		}
		$addmedicine = mysql_query("insert into ed_patient_medicine (edq_id,pid,patient_id,eps_id,ed_id,ep_medicine) values (".$edq_id.",".$pid.",'".$patient_id."',".$epsid.",'".$edid."','".$medicine."')");
		//echo "insert into ed_patient_medicine (edq_id,pid,patient_id,eps_id,ep_medicine) values (".$edq_id.",".$pid.",".$patient_id.",".$epsid.",'".$medicine."')";
		
	}
$add_history = mysql_query( "insert into patient_history (ed_id,pid,patient_id,chief_complain,family_history,remedy,apetite,typhoid,maleria,influenza,tuberculosis,infectious_disease,jaundice,allergy,std_hiv,skin_disease,masturbation,dysentry,worms,gout,head_injury,operation,blood_transfusion,bleeding,headache,supuration,catching_cold,rhemautic_trouble,veg,desire,aversions,indigestible_things,sleep,habits,drinks,emotional_state,intellectual_state,menses,leucorrhoa,obstetrical_history,physical_exam,investigation,pneumonia,pleurisy,created_on) values 		('".$edid."',
'".$pid."',
'".$patient_id."',
'".$ccomplain."',
'".$family_history."',
'".$remedy."',
'".$apetite."',
'".$typhoid."',
'".$maleria."',
'".$influenza."',
'".$tuberculosis."',
'".$infectious_disease."',
'".$jaundice."',
'".$allergy."',
'".$std_hiv."',
'".$skin_disease."',
'".$masturbation."',
'".$dysentry."',
'".$worms."',
'".$gout."',
'".$headinjury."',
'".$operation."',
'".$blood_transfusion."',
'".$bleeding."',
'".$headache."',
'".$supuration."',
'".$catching_cold."',
'".$rheumatic_trouble."',
'".$veg."',
'".$desire."',
'".$aversions."',
'".$indigestible_things."',
'".$sleep."',
'".$habits."',
'".$drinks."',
'".$emotional_state."',
'".$intellectual_state."',
'".$menses."',
'".$leucorrhoa."',
'".$obstetrical_history."',
'".$physical_exam."',
'".$investigation."',
'".$pneumonia."',
'".$pleurisy."', 
now())");
if($add_ed_details){
	 header("Location:viewpatient.php?eid=".$edid."&s=y&pt=$patient_id");
	//header	("Location:patient.php?s=y&pt=$patient_id");
}else{
	 header ("Location:patient.php?s=n");
}
?>