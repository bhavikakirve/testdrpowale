<?php
    include("sessions.php"); 
	include "config/connect.php";
	
	$branch = base64_decode($_GET['branch']);
	$flowerName = base64_decode($_GET['flowerName']);
	
	mysql_query("UPDATE `ed_branch_flower` SET patient_count = '0' WHERE branch_code = '".$branch."' and flower_name ='".$flowerName."'");
	
	header( 'Location: branchFlower.php?branch='. base64_decode($_GET['branch'])) ;
?>
