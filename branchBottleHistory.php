<?php
include("sessions.php"); 
	include "config/connect.php";

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
<script src="datatables/js/sum().js"></script>
<link rel="stylesheet" href="datatables/css/jquery.dataTables.css">
		  <script type="text/javascript">
		  $(document).ready(function() {
			     
				$('#datatable').dataTable({
					    "paging":   false, 
						"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
		                    if ( aData[3] == "23" )
		                    {
		                        $('td', nRow).css('background-color', 'Red');
		                    } else if(aData[3] == "24") {
		                    	$('td', nRow).css('background-color', 'yellow'); 
		                    }
		                   
		                }
				});						
			});
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
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="top-nav">
			<div class="wrap">
				<ul>
					<!-- <li><a href="index.html">Dashboard</a></li> -->
					<li><a href="patient.php">Add / View Patients</a></li>
					<li><a href="patientslist.php">Patients</a></li>
					<li><a href="users.php">Users</a></li>
					<li><a href="adduser.php">Add User</a></li>
					<li><a href="addCSV.php">Create CSV</a></li>
					<li><a href="branchFlower.php" class="active">Branch Flower</a></li>
					<li><a href="logout.php">Logout</a></li>
					<div class="clear"></div>
				</ul>
			</div>
		</div>
	</div>
	<!---End-header---->
	<!----start-content----->
	<div class="content">
		<div class="wrap">
			<!--<div class="about">-->
								
			<!--</div>-->
		</div>
	</div>
	<div class="about">
				<!--<div class="title"><h3>	Everyday Visitors</h3></title>-->
				
				<table id="datatable" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Branch Name</th>
							<th>Total Bottle Used</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
        
					<?php
					//mysql_query("SET SQL_BIG_SELECTS=1");
						$getallpat = mysql_query("select b.branch,b.branch_code,ebb.bottle_count from branches as b inner join ed_branch_bottle as ebb
on ebb.	branch_code =  b.branch_code");

						$i = 1; 
						$total = 0;
						while($row = mysql_fetch_array($getallpat)){
							echo "<tr>";
							echo "<td>".$i;
							echo "</td>";

							echo "<td>".$row['branch'];
							echo "</td>";

							echo "<td>".$row['bottle_count'];
							echo "</td>";
							
									 
							if($row['bottle_count'] == 50) {
							    echo "<td><a href='updateBottle.php?branch=".base64_encode($row['branch_code'])."'<button class='btn btn-default'>Update Bottles</button></td>";
							   
							} else {
							    echo "<td></td>";
							}

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
</html>
	
	