<?php
include("sessions.php"); 
include "config/connect.php";

$branchId = $_GET['branchId'];
$row = mysql_fetch_assoc(mysql_query("select * from branches where branch_id='".$branchId."'"));
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Dr. Powale's Clinic Management System | Add User</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		  <!-- jquery ui css -->
		  <link href="jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
<!-- bootstrap -->
		  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		  <script src="bootstrap/jquery.min.js"></script>
		  <script src="bootstrap/bootstrap.min.js"></script>
		  		
			<style type="text/css">
			/*input[type="text"]{height:20px; vertical-align:top;}*/
			.field_wrapper div{ margin-bottom:10px;}
			/*.add_button{ margin-top:2px; margin-left:2px;vertical-align: text-bottom;}
			.remove_button{ margin-top:2px; margin-left:2px;vertical-align: text-bottom;}*/
			span.glyphicon {
			  margin: 3px;
			}
			</style>
		  <style>
		  #patientdata .col-sm-1 {
			  width: 10.333333%;
			}
			.ui-datepicker .ui-datepicker-title select{
				color:#000;
			}
		  </style>
		  
	</head>
	<body>
		<!---start-wrap---->
		
			<!---start-header---->
			<div class="header">
					
					<div class="main-header">
						<div class="wrap">
							<div class="logo">
								<a href="index.html"><img src="images/logo.jpg" title="logo" /></a>
							</div>
							<div class="social-links">
								<h3>Welcome <?php echo $_SESSION['name']; ?></h3>
							</div>
							<div class="clear"> </div>
						</div>
					</div>
					<div class="clear"> </div>
					<div class="top-nav">
						<div class="wrap">
							<ul>
								<!-- <li><a href="index.html">Dashboard</a></li> -->
								 <li ><a href="patient.php">Add / View Patients</a></li>
								 <li><a href="patientslist.php">Patients</a></li> 
								<li><a href="users.php">Users</a></li>
								<li><a href="adduser.php">Add User</a></li>
								<li class="active"><a href="addbranch.php">Add Branch</a></li>
								<li><a href="logout.php">Logout</a></li> 
								<div class="clear"> </div>
							</ul>
						</div>
					</div>
			</div>
			<!---End-header---->
			<!----start-content----->
			<div class="content">
				<div class="wrap">
				<div class="about">
					<div class="title"><h3>Add Branch</h3></title>
					<form class="form-horizontal" role="form" id="patientdata" action = "addbranch_process.php" method="POST">
					   	<div class="form-group">
						<label class="control-label col-sm-2" for="symtom">Branch:</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" name="branchname" id="branchname" placeholder="Enter branch Name" value="<?php echo $row['branch'];?>">
						  </div>
						<!-- <div class="col-sm-4">  -->
						  
						<!-- </div> -->
						
					  </div>
					  
					  
					  <div class=" form-group"> 
						  <label class="control-label col-sm-1" for="dob">Branch Code:</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" name="branchcode" id="branchcode" placeholder="Enter branch code" value="<?php echo $row['branch_code'];?>">
						  </div>
						</div>
					  
					  
						<div class=" form-group"> 
						  <label class="control-label col-sm-1" for="dob">Status:</label>
						  <div class="col-sm-4">
							<div class="radio " >
								  <label><input type="radio" name="status" value="1" <?php if($row['status'] == 1){echo 'checked';}?>>Active</label>
								  <label><input type="radio" name="status"  value="0" <?php if($row['status'] == 0){echo 'checked';}?>>Block</label>
							</div>
						  </div>
						</div>
						
						<div class="form-group">
                     	 	<input type="hidden" name="branchId" id="branchId" value="<?php echo $branchId; ?>"/>
                     	</div>
							  
					  <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-default">Save</button>
						</div>
					  </div>
					</form>

													
				</div>
				<div class="clear"> </div>
				</div>
			<!----End-content----->
			</div>
		<!---End-wrap---->
		<!---start-footer---->
		<div class="footer">
			<div class="wrap">
				<div class="footer-grids">
					<div class="footer-grid">
						<h3>OUR Profile</h3>
						 <ul>
							<li><a href="#">Lorem ipsum dolor sit amet</a></li>
							<li><a href="#">Conse ctetur adipisicing</a></li>
							<li><a href="#">Elit sed do eiusmod tempor</a></li>
							<li><a href="#">Incididunt ut labore</a></li>
							<li><a href="#">Et dolore magna aliqua</a></li>
							<li><a href="#">Ut enim ad minim veniam</a></li>
						</ul>
					</div>
					<div class="footer-grid">
						<h3>Our Services</h3>
						 <ul>
							<li><a href="#">Et dolore magna aliqua</a></li>
							<li><a href="#">Ut enim ad minim veniam</a></li>
							<li><a href="#">Quis nostrud exercitation</a></li>
							<li><a href="#">Ullamco laboris nisi</a></li>
							<li><a href="#">Ut aliquip ex ea commodo</a></li>
						</ul>
					</div>
					<div class="footer-grid">
						<h3>OUR FLEET</h3>
						 <ul>
							<li><a href="#">Lorem ipsum dolor sit amet</a></li>
							<li><a href="#">Conse ctetur adipisicing</a></li>
							<li><a href="#">Elit sed do eiusmod tempor</a></li>
							<li><a href="#">Incididunt ut labore</a></li>
							<li><a href="#">Et dolore magna aliqua</a></li>
							<li><a href="#">Ut enim ad minim veniam</a></li>
						</ul>
					</div>
					<div class="footer-grid">
						<h3>CONTACTS</h3>
						 <p>Lorem ipsum dolor sit amet ,</p>
						 <p>Conse ctetur adip .</p>
						 <p>ut labore Usa.</p>
						 <span>(202)1234-56789</span>
					</div>
					<div class="clear"> </div>
				</div>
				<div class="clear"> </div>
				<!---start-copy-right----->
				<div class="copy-tight">
					<!-- <p>Design by <a href="http://w3layouts.com/">W3layouts</a></p> -->
				</div>
				<!---End-copy-right----->
			</div>
		</div>
	</body>
</html>