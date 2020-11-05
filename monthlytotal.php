<?php
include("sessions.php"); 
include "config/connect.php";
if($_SESSION['role']== 'Admin')
{
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
		<title>Monthly Total | Unique Homeopathic Clinic</title>
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
				$('#datatable1').dataTable();
				$('#datatable2').dataTable();
				$('#datatable3').dataTable();
				$('#datatablefkh').dataTable();
				$('#datatablepune').dataTable();
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
								 <li ><a href="patientslist.php">Patients</a></li> 
								<li><a href="users.php">Users</a></li>
								<li><a href="adduser.php">Add User</a></li>
								<li><a href="diseases.php">Diseases</a></li>
								<li class="active"><a href="monthlytotal.php">Monthly Total</a></li>
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
				<div class="title"><h3>	Monthly Total Kamothe</h3></title>
					<table id="datatable1" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Total Charges</th>
							<th>Month</th>
							<th>Year</th>
						</tr>
					</thead>
					<tbody>
        
					<?php
						$getallpat = mysql_query("select sum(charges) MonthlyTotal,MONTHNAME(created_on) Month,YEAR(created_on) Year,substring(patient_id,1,2) from ed_patient_diagnosis where substring(patient_id,1,2) = 'KM' and pid not in (SELECT pid
FROM  patient_details 
WHERE lower(patient_name) LIKE  '%test%' or pid = 1) group by MONTH(created_on),YEAR( created_on ) order by YEAR(created_on) desc,MONTH(created_on) desc");
						$i = 1; 
						$total = 0;
						while($row = mysql_fetch_array($getallpat)){
							echo "<tr>";
							echo "<td>".$i;
							echo "</td>";
							echo "<td>".$row['MonthlyTotal'];
							echo "</td>";
							echo "<td>".$row['Month'];
							echo "</td>";
							echo "<td>".$row['Year'];
							echo "</td>";							
							echo "</tr>";
							$i++;
						}
					?>
					</tbody>
					
					</table>
				<div class="title"><h3>	Monthly Total Alibag</h3></title>
					<table id="datatable2" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Total Charges</th>
							<th>Month</th>
							<th>Year</th>
						</tr>
					</thead>
					<tbody>
        
					<?php
						$getallpat = mysql_query("select sum(charges) MonthlyTotal,MONTHNAME(created_on) Month,YEAR(created_on) Year,substring(patient_id,1,2) from ed_patient_diagnosis where substring(patient_id,1,2) = 'AL' and pid not in (SELECT pid
FROM  patient_details 
WHERE lower(patient_name) LIKE  '%test%' or pid = 1) group by MONTH(created_on) , YEAR( created_on ) order by YEAR(created_on) desc,MONTH(created_on) desc");
						$i = 1; 
						$total = 0;
						while($row = mysql_fetch_array($getallpat)){
							echo "<tr>";
							echo "<td>".$i;
							echo "</td>";
							echo "<td>".$row['MonthlyTotal'];
							echo "</td>";
							echo "<td>".$row['Month'];
							echo "</td>";
							echo "<td>".$row['Year'];
							echo "</td>";							
							echo "</tr>";
							$i++;
						}
					?>
					</tbody>
					
					</table>
					
					<div class="title"><h3>	Monthly Total Khandeshwar</h3></title>
					<table id="datatablefkh" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Total Charges</th>
							<th>Month</th>
							<th>Year</th>
						</tr>
					</thead>
					<tbody>
        
					<?php
						$getallpat = mysql_query("select sum(charges) MonthlyTotal,MONTHNAME(created_on) Month,YEAR(created_on) Year,substring(patient_id,1,3) from ed_patient_diagnosis where substring(patient_id,1,3) = 'FKH' and pid not in (SELECT pid
FROM  patient_details 
WHERE lower(patient_name) LIKE  '%test%' or pid = 1) group by MONTH(created_on) , YEAR( created_on ) order by YEAR(created_on) desc,MONTH(created_on) desc");
						$i = 1; 
						$total = 0;
						while($row = mysql_fetch_array($getallpat)){
							echo "<tr>";
							echo "<td>".$i;
							echo "</td>";
							echo "<td>".$row['MonthlyTotal'];
							echo "</td>";
							echo "<td>".$row['Month'];
							echo "</td>";
							echo "<td>".$row['Year'];
							echo "</td>";							
							echo "</tr>";
							$i++;
						}
					?>
					</tbody>
					
					</table>
				<div class="title"><h3>	Monthly Total Panvel/New Panvel</h3></title>
					<table id="datatable3" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Total Charges</th>
							<th>Month</th>
							<th>Year</th>
						</tr>
					</thead>
					<tbody>
        
					<?php
						$getallpat = mysql_query("select * from (select sum(charges) MonthlyTotal,MONTHNAME(created_on) Month,YEAR(created_on) Year,substring(patient_id,1,2) from ed_patient_diagnosis where substring(patient_id,1,2) not in  ('AL','KM') and pid not in (SELECT pid
FROM  patient_details 
WHERE lower(patient_name) LIKE  '%test%' or pid = 1) group by MONTH(created_on) , YEAR( created_on ) order by YEAR(created_on) desc,MONTH(created_on) desc) temp where  MonthlyTotal > 0");
						$i = 1; 
						$total = 0;
						while($row = mysql_fetch_array($getallpat)){
							echo "<tr>";
							echo "<td>".$i;
							echo "</td>";
							echo "<td>".$row['MonthlyTotal'];
							echo "</td>";
							echo "<td>".$row['Month'];
							echo "</td>";
							echo "<td>".$row['Year'];
							echo "</td>";							
							echo "</tr>";
							$i++;
						}
					?>
					</tbody>
					
					</table>	
					<div class="title"><h3>	Monthly Total Pune</h3></title>
					<table id="datatablepune" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Total Charges</th>
							<th>Month</th>
							<th>Year</th>
						</tr>
					</thead>
					<tbody>
        
					<?php
						$getallpat = mysql_query("select sum(charges) MonthlyTotal,MONTHNAME(created_on) Month,YEAR(created_on) Year,substring(patient_id,1,2) from ed_patient_diagnosis where substring(patient_id,1,2) = 'P1' and pid not in (SELECT pid
FROM  patient_details 
WHERE lower(patient_name) LIKE  '%test%' or pid = 1) group by MONTH(created_on) , YEAR( created_on ) order by YEAR(created_on) desc,MONTH(created_on) desc");
						$i = 1; 
						$total = 0;
						while($row = mysql_fetch_array($getallpat)){
							echo "<tr>";
							echo "<td>".$i;
							echo "</td>";
							echo "<td>".$row['MonthlyTotal'];
							echo "</td>";
							echo "<td>".$row['Month'];
							echo "</td>";
							echo "<td>".$row['Year'];
							echo "</td>";							
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
<?php
}
?>

