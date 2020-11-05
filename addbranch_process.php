<?php
include "config/connect.php";

$branchName = $_REQUEST['branchname'];
$branchCode = $_REQUEST['branchcode'];
$status = $_REQUEST['status'];

$branchId = (isset($_REQUEST['branchId'])) ? $_REQUEST['branchId'] : '';

if($branchId != "") {
    $addbranch = mysql_query("update branches set branch_code='".$branchCode."', branch='".$branchName."',status='".$status."' where branch_id='".$branchId."'");
} else {
      $addbranch = mysql_query("INSERT INTO `branches` (`branch_code`, `branch`, `last_patient_id`, `created_by`,`updated_by`, `updated_on`, `franchise`, `status`) VALUES ('".$branchCode."', '".$branchName."', '0', '1', '1', CURRENT_TIMESTAMP, 'N', '1');");
      mysql_query("INSERT INTO `ed_branch_bottle` (`branch_code`, `bottle_count`) VALUES ('".$branchCode."', '1000')");
      
      for($i=1;$i<=50;$i++) {
          mysql_query("INSERT INTO `ed_branch_flower` (`branch_code`, `flower_name`, `patient_count`) VALUES ('".$branchCode."', 'Flower ".$i."', '0')");
      }
      
}


if($addbranch){
	header	("Location:branch.php?s=y");
}else{
	//echo "insert into users(name, role, contact_no, username, password, status , branch_code) values ('".$name."','".$role."','".$contactno."','".$username."','".md5($password)."',$status, '".$branch."')";
	header ("Location:addbranch.php?s=n");	
}
?>