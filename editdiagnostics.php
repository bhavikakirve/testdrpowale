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
				$('#datatable1').dataTable();
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
								 <li ><a href="patient.php">Add / View Patients</a></li>
								 <li ><a href="patientslist.php">Patients</a></li> 
								<li><a href="users.php">Users</a></li>
								<li><a href="adduser.php">Add User</a></li>
								<li class="active"><a href="diseases.php">Diseases</a></li>
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
				<div class="title"><h3>	Edit Diagnosis</h3></title>
				<?php
					$symtom_id = $_REQUEST['symtom_id'];
					$symtom_query = mysql_query("select symtom from symtoms where symtom_id = '".$symtom_id."' limit 1" );
					$symtom = mysql_result($symtom_query,0);
					echo "<u><h3>".$symtom."</h3></u>";
					$query = mysql_query("select * from questions  where symtom_id  = '".$symtom_id."'");
					echo "<table  id='datatable' style='border:1px solid; width: 80%;' width='50%'>";
					echo "<tr><th>Questions</th><th>Subquestions </th><th>Answers  <span class=''><button class='btn btn-success btn-add add_button' type='button'>Add Questions   </button>  </span></th></tr>";
					while($row=mysql_fetch_array($query))
					{
						echo "<tr><td ><input type='text' name='qtn_".$row['question_id']."' value='".$row['question']."'></td>";
						echo "<td><table id='datatable1' border='1' >";
						echo "<tr><td colspan='2'><span class=''><button class='btn btn-success btn-add add_button' type='button'>Add Sub Questions   </button>  </span></td></tr>";
						echo "<tr><td><input type='text' name='subqtn[]' placeholder='Sub Question'></td><td><input type='text'  placeholder='medicine' name='submed' style='width:150px'></td></tr>";
						echo "</table>";
						echo "</td><td ><input type='text' name='medicine' placeholder='medicine' value='".$row['medicine']."' style='width:60px;'></td></tr>";
					}
					echo "</table>";
				?>
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

