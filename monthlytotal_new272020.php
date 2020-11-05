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
            $("#datatablePanvel").dataTable();
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
				<?php 
				    $spcBranchArray = array("NP","OP");
				    $getbranches = mysql_query("select branch_code,branch_id,branch from branches where status='1'");
				    while($row = mysql_fetch_array($getbranches)){
				        if(!in_array($row['branch_code'], $spcBranchArray)) {
				?>
				 <script type="text/javascript">
            		  $(document).ready(function() {
            				$("#datatable<?=$row['branch_id']?>").dataTable();
            				
            			} );
		  		</script>
		  		
		  		<?php echo "select sum(charges) MonthlyTotal,count(pid) TotalPatient ,MONTHNAME(created_on) Month,YEAR(created_on) Year,substring_index(patient_id,'-',1) from ed_patient_diagnosis where substring_index(patient_id,'-',1) = '".$row['branch_code']."' and pid not in (SELECT pid
FROM  patient_details 
WHERE lower(patient_name) LIKE  '%test%' or pid = 1) group by MONTH(created_on),YEAR( created_on ) order by YEAR(created_on) desc,MONTH(created_on) desc";?>
				
				<div class="title"><h3>	Monthly Total <?= $row['branch']?></h3></title>
					<table id="datatable<?=$row['branch_id']?>" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Total Charges</th>
							<th>Month</th>
							<th>Year</th>
							<th>Total Patient</th>
						</tr>
					</thead>
					<tbody>
        
					<?php
						$getallpat = mysql_query("select sum(charges) MonthlyTotal,count(pid) TotalPatient ,MONTHNAME(created_on) Month,YEAR(created_on) Year,substring_index(patient_id,'-',1) from ed_patient_diagnosis where substring_index(patient_id,'-',1) = '".$row['branch_code']."' and pid not in (SELECT pid
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
							echo "<td>".$row['TotalPatient']."</td>";
							echo "</tr>";
							$i++;
						}
					?>
					</tbody>
					
					</table>			
					
			</div>
			<?php
				   }
			   }
			?>
			</table>
				<div class="title"><h3>	Monthly Total Panvel/New Panvel</h3></title>
					<table id="datatablePanvel" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Total Charges</th>
							<th>Month</th>
							<th>Year</th>
							<th>Total Patient</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$getallpat1 = mysql_query("select * from (select sum(charges) MonthlyTotal,count(pid) TotalPatient ,MONTHNAME(created_on) Month,YEAR(created_on) Year,substring(patient_id,1,2) from ed_patient_diagnosis where substring(patient_id,1,2) in ('NP','OP') and pid not in (SELECT pid
FROM  patient_details
WHERE lower(patient_name) LIKE  '%test%' or pid = 1) group by MONTH(created_on) , YEAR( created_on ) order by YEAR(created_on) desc,MONTH(created_on) desc) temp where  MonthlyTotal > 0");
						$i = 1; 
						$total = 0;
						while($row = mysql_fetch_array($getallpat1)){
							echo "<tr>";
							echo "<td>".$i;
							echo "</td>";
							echo "<td>".$row['MonthlyTotal'];
							echo "</td>";
							echo "<td>".$row['Month'];
							echo "</td>";
							echo "<td>".$row['Year'];
							echo "</td><td>".$row['TotalPatient']."</td>";
							echo "</tr>";
							$i++;
						}
					?>
					</tbody>
					
					</table>
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

