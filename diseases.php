<?php
include("sessions.php"); 
include "config/connect.php";
include "config/functions.php";
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
		 
	</head>
	<body>
		<!---start-wrap---->
		
			<!---start-header---->
			<div class="header">
					
					<div class="main-header">
						<div class="wrap">
							<div class="logo">
								<a href="index.html"><img src="images/homeopathylogo1.jpg" title="logo" /></a>
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
                                 <div style="float:right;"><a href="<?php echo url();?>/add_disease.php">Add Disease</a></div>
				<div class="title"><h3>	Diseases List</h3></title>
					<table id="datatable" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Disease</th>
							<th>Diagnostic Questions</th>
							<th>&nbsp;</th>

							<th>Edit</th>
						</tr>
					</thead>
					<tbody>
        
					<?php
						$getallpat = mysql_query("select * from symtoms order by symtom_id ");
						$i = 1; 
						$total = 0;
						while($row = mysql_fetch_array($getallpat)){
							echo "<tr>";
							echo "<td>".$i;
							echo "</td>";

							echo "<td>".$row['symtom'];
							echo "</td>";

							echo "<td><table>";
							$getsymtomqtns = mysql_query("select * from questions where symtom_id = ".$row['symtom_id']." and parent_qid = 0 order by question_id");
							while($rs= mysql_fetch_array($getsymtomqtns)){
								echo "<tr><td>".$rs['question']."</td>";
								$questionid = $rs['question_id'];
								echo "<td>";
								if($rs['medicine']==0){
									$getsub = mysql_query("select * from questions where symtom_id = ".$row['symtom_id']." and parent_qid = ".$rs['question_id']." order by question_id");
									echo "<table>";
									while($rsb = mysql_fetch_array($getsub)){
										
										echo "<tr><td>".$rsb['question']."</td><td>".$rsb['medicine']."</td>";
										$questionid = $rsb['question_id'];
										echo "<td>".$rsb['medicine_duration']."</td>";
										echo "<td>".$rsb['failure']."</td>";
echo "<td>".$rsb['flower']."</td>";
echo "<td>".$rs['flower']."</td>";echo "<td><a href='editquestion.php?qid=".$questionid."'>edit</a>&nbsp;||&nbsp;";
echo "<a href='delete.php?id=".$questionid."&type=subq'>Delete</a></td></tr>";
										
									}
									echo "</table>";
								}
								echo "</td>";
								echo "<td>".$rs['medicine']."</td>";
								echo "<td>".$rs['medicine_duration']."</td>";
								echo "<td>".$rs['failure']."</td>";
echo "<td><a href='editquestion.php?qid=".$questionid."'>edit</a></td>";
								echo "</tr>";
							}
							echo "</table></td>";
							
							echo "<td>";
//							$getsubqtns = mysql_query("select * from questions where ");
//<a href='editdiagnostics.php?symtom_id=".$row['symtom_id']."'>Edit</a>
							echo "</td><td></td>";
//													var_dump($row);	
							/* echo "<td><table>";
							$getmedicine = mysql_query("select * from questions where symtom_id = ".$row['symtom_id']." and parent_qid = 0 order by question_id");
							while($rm = mysql_fetch_array($getmedicine)){
								echo "<tr><td>".$rm['medicine']."</td></tr>";
							}
							echo "</table></td>"; */

														

							echo "</tr>";
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
	 <script type="text/javascript">
			$(document).ready(function() {
				$('#datatable').dataTable();
			} );
		  </script>
</html>

