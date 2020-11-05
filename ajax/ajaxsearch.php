<?php
require_once "../config/connect.php";
$srid = $_REQUEST['sid'];
$patientdata1 = "";
$getpatientdata = mysql_query("select patient_id, patient_name, contact_no, date_of_birth, gender, age,place, chief_complain, past_history, family_history from patient_details where patient_id = '".$srid."'");
while($pr = mysql_fetch_array($getpatientdata)){
	$patientdata = '"patient_id":"'.$pr['patient_id'].'","patient_name":"'.$pr['patient_name'].'","contact_no":"'.$pr['contact_no'].'","dob":"'.date_format(date_create($pr['date_of_birth']),'d-m-Y').'","gender":"'.$pr['gender'].'","age":"'.$pr['age'].'","place":"'.$pr['place'].'","past_history":"'.$pr['past_history'].'"';		
}
$getpatienthistory = mysql_query("select * from patient_history where patient_id = '".$srid."' order by created_on desc limit 1");
while($ph = mysql_fetch_array($getpatienthistory)){
	$patientdata1 = 
	'"chief_complain":"'.str_replace("\r\n", " ",$ph['chief_complain']).'",
	"remedy":"'.$ph['remedy'].'","apetite":"'.$ph['apetite'].'",
	"typhoid":"'.$ph['typhoid'].'","maleria":"'.$ph['maleria'].'","influenza":"'.$ph['influenza'].'","tuberculosis":"'.$ph['tuberculosis'].'","jaundice":"'.$ph['jaundice'].'","allergy":"'.$ph['allergy'].'","std_hiv":"'.$ph['std_hiv'].'","skin_disease":"'.$ph['skin_disease'].'","masturbation":"'.$ph['masturbation'].'","dysentry":"'.$ph['dysentry'].'","worms":"'.$ph['worms'].'","gout":"'.$ph['gout'].'","head_injury":"'.$ph['head_injury'].'","operation":"'.$ph['operation'].'","blood_transfusion":"'.$ph['blood_transfusion'].'","bleeding":"'.$ph['bleeding'].'","headache":"'.$ph['headache'].'","supuration":"'.$ph['supuration'].'","catching_cold":"'.$ph['catching_cold'].'","rhemautic_trouble":"'.$ph['rhemautic_trouble'].'","veg":"'.$ph['veg'].'","desire":"'.$ph['desire'].'","aversions":"'.$ph['aversions'].'","relation":"'.$ph['relation'].'","thirst":"'.$ph['thirst'].'","tounge":"'.$ph['tounge'].'","indigestible_things":"'.$ph['indigestible_things'].'","sleep":"'.$ph['sleep'].'","habits":"'.$ph['habits'].'","drinks":"'.$ph['drinks'].'","emotional_state":"'.str_replace("\r\n", " ",$ph['emotional_state']).'","intellectual_state":"'.str_replace("\r\n", " ",$ph['intellectual_state']).'","menses":"'.str_replace("\r\n", " ",$ph['menses']).'","leucorrhoa":"'.str_replace("\r\n", " ",$ph['leucorrhoa']).'","obstetrical_history":"'.str_replace("\r\n", " ",$ph['obstetrical_history']).'","physical_exam":"'.str_replace("\r\n", " ",$ph['physical_exam']).'","investigation":"'.str_replace("\r\n", " ",$ph['investigation']).'","pneumonia":"'.$ph['pneumonia'].'","pleurisy":"'.$ph['pleurisy'].'","menstrual_history":"'.$ph['menstrual_history'].'","infectious_disease":"'.$ph['infectious_disease'].'","family_history":"'.str_replace("\r\n", " ",$ph['family_history']).'"';
}
$patsymptoms = "";
//$getprevdiagnosis = mysql_query("select s.symtom_id, s.symtom from ed_patient_symtoms ps, symtoms s where ps.symtom_id = s.symtom_id and patient_id = '".$srid."'");
$getprevdiagnosis = mysql_query("select group_concat(s.symtom SEPARATOR '<br/> ') symtom,(select DATE_FORMAT(created_on, '%Y-%m-%d') from patient_history where ed_id=ps.ed_id limit 1) date from ed_patient_symtoms ps left join symtoms s  on (ps.symtom_id = s.symtom_id) where ps.patient_id = '".$srid."' and s.symtom is not null group by ps.ed_id order by ps.ed_id");
while($ps = mysql_fetch_array($getprevdiagnosis)){
	$patsymptoms .= "<div class='col-sm-2' style='border:solid gray 1px; width:30%;margin-left:2%;margin-bottom:5px;'>".$ps['date']."<hr style='margin-top:0px; margin-bottom:0px;'/>".$ps['symtom']."</div>";
}
$patientsymptom = '"symtom":"'.$patsymptoms.'"';

echo "{".$patientdata.",".$patientdata1.",".$patientsymptom."}";
?>