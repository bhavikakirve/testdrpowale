<?php
function subqtns($qtnid){
	$query = mysql_query("select * from questions where parent_qid = ".$qtnid);
	if(mysql_num_rows($query)>0){
		while($row = mysql_fetch_array($query)){

		}
	}else{
		$getans = mysql_query("select ");
	}
}

function ageCalculator($dob){
	if(!empty($dob)){
		$birthdate = new DateTime($dob);
		$today   = new DateTime('today');
		$age = $birthdate->diff($today)->y;
		return $age;
	}else{
		return 0;
	}
}

function getnextpatient_id($branchcode){
	$lastpid = 0001;
	$getlastid = mysql_query("select * from branches where branch_code='".$branchcode."'");
	//echo "select last_patient_id from branches where branch_code='".$branchcode."'";
	if(mysql_num_rows($getlastid)>0){
		while($r3 = mysql_fetch_array($getlastid)){
			$lastpid = $r3['last_patient_id']+1;
			$franchise = $r3['franchise'];
			$branch_code = $r3['branch_code'];
			//echo "lastpid= ".$lastpid;
			if($franchise == 'Y'){
				$update = mysql_query("update branches set last_patient_id = ".$lastpid." where branch_code = '".$branch_code."'");
			}else{
			$update = mysql_query("update branches set last_patient_id = ".$lastpid." where franchise!='Y' and branch_code='".$branch_code."'");
			}
		}
	}
	$nextpid = $branchcode."-".$lastpid;
	return $nextpid;
}

function sanitize_data($str) {
	if(is_array($str)){
		$i=0;
		foreach($str as $a){
			$input_data = strip_tags(mysql_real_escape_string($a));
			//$preview = htmlentities($input_data, ENT_QUOTES);
			$preview_data[$i] = addslashes($input_data);
			$i++;
		}
		return $preview_data;
	}else{
		$input_data = strip_tags(mysql_real_escape_string($str));
		//$str = htmlentities($str, ENT_QUOTES);
		$str = addslashes($str);
		return $str;
	}
}

function url(){
    return sprintf(
        "%s://%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME']
        );
}
?>