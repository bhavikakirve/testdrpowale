<?php
if(!session_id()) {
session_start();
}



	include "../config/connect.php";
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];

		
	$checklogin = mysql_query("select * from users where username = '".$username."' and password = md5('".$password."') and role='Provider'");
	//echo "select * from users where username = '".$username."' and password = md5('".$password."')";
	//echo mysql_num_rows($checklogin);
	//exit;
	if(mysql_num_rows($checklogin)){
	   
		while($row=mysql_fetch_array($checklogin)){
		   	$_SESSION["user_id"] = $row['user_id'];
			$_SESSION['branch_code']= $row['branch_code'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['role'] = $row['role'];
			$_SESSION['contact_no'] = $row['contact_no'];
			//print_r($_SESSION);exit;
    			header('Location:dailyPatientReport.php');	

		}
		
		
		
		
	}else{
		$_SESSION["error_message"] = "Incorrect Username or password";
		echo "You are in else";exit;
		//header('Location:index.php');
	}
?>