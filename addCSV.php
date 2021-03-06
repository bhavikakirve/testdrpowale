<?php
include("sessions.php");
include "config/connect.php";
//include "header.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Questions | Unique Homeopathic Clinic</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		  <!-- jquery ui css -->
		  <link href="jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
<!-- bootstrap -->
		  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		  <script src="bootstrap/jquery.min.js"></script>
		  <script src="bootstrap/bootstrap.min.js"></script>
			
<!-- datatable -->
			<script src="datatables/js/jquery.js"></script>
			<script src="datatables/js/jquery.dataTables.js"></script>
			<link rel="stylesheet" href="datatables/css/jquery.dataTables.css">
		 
	</head>
	<body>
		<!---start-wrap---->
		
			<!---start-header---->
			<div class="header">
					
					<div class="main-header">
						<div class="wrap">
							<div class="logo">
								<a href="index.html"><img src="images/logo.png" title="logo" /></a>
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
								<li><a href="patient.php">Add / View Patients</a></li>
								<li><a href="patientslist.php">Patients</a></li> 
								<li><a href="users.php">Users</a></li>
								<li><a href="adduser.php">Add User</a></li>
								<li><a href="diseases.php">Diseases</a></li>
                                                                <li><a href="addbranch.php">Add Branches</a></li>
<li  class="active"><a href="addCSV.php">Create CSV</a></li>
<li><a href="branch.php">Branches</a></li>
<li><a href="branchFlower.php">Branch Flower</a></li>
								<li><a href="logout.php">Logout</a></li> 
								<div class="clear"> </div>
							</ul>
						</div>
					</div>
			</div>
<form class="form-horizontal" role="form" id="patientdata" action="csvProcess.php" method="POST">
	<div class="form-group">
					  <div class=" form-group"> 
						  <label class="control-label col-sm-2" for="dob">Branch:</label>
						  <div class="col-sm-4">
								<?php
								$getbranches = mysql_query("select * from branches"); 
								echo "<select name='branch'>";
								while($row = mysql_fetch_array($getbranches)){
									echo "<option value='".$row['branch_code']."'>".$row['branch']."</option>";
								}
								echo "</select>";								
								?>
							<!-- <input type="text" class="form-control " name="branch"  placeholder="Branch"> -->
						  </div>
						</div>
					</div>
	 
	  
	 <div class="form-group"> 
	 	<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Create CSV</button>
		</div>
	 </div>
	 
	 														  
</form>

    <?php    
    include "footer.php";
?>