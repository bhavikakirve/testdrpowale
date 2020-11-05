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
				$('#datatable').dataTable();						
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
								 <li class="active"><a href="patientslist.php">Patients</a></li> 
								<li><a href="users.php">Users</a></li>
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
				<div style="width:100%;">
					<h3>Search Patient Datewise</h3>
					<form name="searchpatient" method="post" action="patientslist.php">
						<div style="float:left; width:25%;"><label>From Date : </label><input style="line-height:15px;" type="date" name="fromdate" id="fromdate"/></div>
						<div style="float:left; width:25%;"><label>To Date : </label><input style="line-height:15px;" type="date" name="todate" id="todate"/></div>
						<div style="float:left; width:25%;"><label>Select Branch: </label><?php 
						      $getbranches = mysql_query("select * from branches where status='1'");
						?>
    						<select name="branch" style="height:25px;">
    						<option value="">Choose</option>
    				    <?php
    				        while($row = mysql_fetch_array($getbranches)){
    				    ?>		
    						<option value="<?php echo $row['branch_code'];?>"><?php echo $row['branch'];?></option>
    				    <?php
    				        }
    				    ?>		
    						</select></div>
						<div style="float:left; width:25%;"><input type="submit" name="submit" id="submit" value="Submit"/></div>
					</form>
				</div>		
<hr/>		
				<div class="about">
				<!--<div class="title"><h3>	Everyday Visitors</h3></title>-->
					<table id="datatable" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Patient Id</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Contact No.</th>
							<th>Cheif Complain</th>
							<th>Charges</th>
							<th>Visited On</th>
							<th>View</th>
						</tr>
					</thead>
					<tbody>
        
					<?php
					$subquery = "";
						if(($_POST['fromdate']<>'' && $_POST['todate']<>'') || ($_POST['branch']<>""))
						{
							$fromdate = $_POST['fromdate'];
							$todate = $_POST['todate'];
							$branch = $_POST['branch'];
							$branch_query = ($branch<>"")?" and ed.patient_id like '$branch%'":"";
							$date_query = ($fromdate<>"" && $todate<>"")?" and CAST(ed.created_on as DATE) between '$fromdate' and '$todate'":"";
							$subquery = $branch_query.$date_query;
							//CAST(dob AS DATE) between '2011-01-01' and '2011-01-31'
//echo $subquery;
unset($_POST);
						}
						mysql_query("SET SQL_BIG_SELECTS=1");
						$getallpat = mysql_query("select ed.*,pd.*,ed.created_on as visiteddate from ed_patient_diagnosis ed,patient_details pd where ed.patient_id = pd.patient_id $subquery order by ed.created_on desc limit 200");
//echo "select epd.ed_id, pd.patient_id, pd.patient_name, pd.gender, pd.contact_no, pd.chief_complain, epd.charges, epd.created_on from  ed_patient_diagnosis epd left join patient_details pd on epd.patient_id = pd.patient_id $subquery order by epd.created_on desc";

						$i = 1; 
						$total = 0;
						while($row = mysql_fetch_array($getallpat)){
							echo "<tr>";
							echo "<td>".$i;
							echo "</td>";

							echo "<td>".$row['patient_id'];
							echo "</td>";

							echo "<td>".$row['patient_name'];
							echo "</td>";
							if($row['gender']=='F'){
							$gender = "Female";}
							else{
							$gender = "Male";
							}
							echo "<td>".$gender;
							echo "</td>";
														
							echo "<td>".$row['contact_no'];
							echo "</td>";

							echo "<td>".$row['chief_complain'];
							echo "</td>";

							echo "<td>".$row['charges'];
							echo "</td>";
							$total = $total + $row['charges'];
							echo "<td>".$row['visiteddate'];
							echo "</td>";

							echo "<td><a href='viewpatient.php?eid=".$row['ed_id']."'>view</a>";
							echo "</td>";

							echo "</tr>";
							$i++;
						}
					?>
					</tbody>
					<!-- <tfoot>
						<tr><th colspan="6" style="text-align:right;">Total</th>
							<th><?php echo $total;?></th>
							<th colspan="2"></th>
						</tr>
					</tfoot> -->
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
