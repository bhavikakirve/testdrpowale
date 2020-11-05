<?php
include("sessions.php"); 
	include "config/connect.php";

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Users | Unique Homeopathic Clinic</title>
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
		  <script type="text/javascript">
		  $(document).ready(function() {
				$('#datatable').dataTable();
			} );
		  </script>
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
								<li class="active"><a href="users.php">Users</a></li>
								<li><a href="adduser.php">Add User</a></li>
                                                                <li><a href="addbranch.php">Add Branches</a></li>
<li><a href="addCSV.php">Create CSV</a></li>
<li><a href="branch.php">Branches</a></li>
<li><a href="branchFlower.php">Branch Flower</a></li>
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
				<div class="title"><h3>	Users</h3></title>
					<table id="datatable" class="display" cellspacing="0" width="80%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Name</th>
							<th>Username</th>
							<th>Contact No.</th>
							<th>Role</th>
							<th>Status</th>
                                                        <th>Action</th> 
						</tr>
					</thead>
					<tbody>
        
					<?php
						$getallusers = mysql_query("select * from users");
						$i = 1;
						while($row = mysql_fetch_array($getallusers)){
							echo "<tr>";
							echo "<td>".$i;
							echo "</td>";

							echo "<td>".$row['name'];
							echo "</td>";

							echo "<td>".$row['username'];
							echo "</td>";

							echo "<td>".$row['contact_no'];
							echo "</td>";

							echo "<td>".$row['role'];
							echo "</td>";
							
							if($row['status'] == 1){
							$status = "Active";
							}else{
							$status = "Blocked";
							}
							echo "<td>".$status;
							echo "</td>";
                                                        
                                                       echo "<td><a href='edituser.php?id=".$row['user_id']."'>Edit</a>&nbsp;||&nbsp;";

							echo "<a href='delete.php?id=".$row['user_id']."&type=u'>Delete</a></td></tr>";
							$i++;
						}
					?>
					</tbody>
					</table>
				
				</div>
				<br/><br/>
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
					
				</div>
				<!---End-copy-right----->
			</div>
		</div>
		<!---End-footer---->
	</body>
</html>


"