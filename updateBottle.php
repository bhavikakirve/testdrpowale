<?php
    include("sessions.php"); 
	include "config/connect.php";
	
	$branch = base64_decode($_GET['branch']);
	
	$getPatientCount = mysql_fetch_assoc(mysql_query("select bottle_count from ed_branch_bottle where branch_code like '".$branch."%'"));
	$bottleCount = 1000 + $getPatientCount['bottle_count'];
	
	mysql_query("UPDATE `ed_branch_bottle` SET 	bottle_count = '".$bottleCount."' WHERE branch_code = '".$branch."'");
	
	header( 'Location: branchFlower_new.php?branch='. base64_decode($_GET['branch'])) ;
?>
