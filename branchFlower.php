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
				<title><h3>Search Flower</h3></title>
				<form class="form-horizontal" role="form" id="patientdata" action="branchFlower.php" method="POST">
					<!--<div class=" form-group">
						<label class="control-label col-sm-2" for="dob">Branch:</label>
						<div class="col-sm-4">
        					<?php
                                /*$getbranches = mysql_query("select * from branches");
                                echo "<select name='branch'>";
                                while ($row = mysql_fetch_array($getbranches)) {
                                     echo "<option value='" . $row['branch_code'] . "'>" . $row['branch'] . "</option>";
                                }
                                echo "</select>";*/
                             ?>
        					  
						</div>
					</div>-->
					<div class=" form-group"> 
						  <label class="control-label col-sm-2" for="dob">Branch:</label>
						  <div class="col-sm-4">
					<?php
								$getbranches = mysql_query("select * from branches"); 
								echo "<select name='branch'><option value=''>Select Branch</option>";
								$selected = '';
								while($row = mysql_fetch_array($getbranches)){
								   
								    //echo $row['branch_code'];
								    //echo $row1['branch_code']."<br/>";
								    //echo "<option value='".$row1['branch_code']."'".$selected.">".$row1['branch']."</option>";
								?>
								<option value="<?php echo $row['branch_code']?>" 
								<?php if((isset($_POST['branch']) && ($_POST['branch']== $row['branch_code'])) || isset($_GET['branch']) && ($_GET['branch']== $row['branch_code'])) { 
								    echo 'selected';
								} else {
								    echo '';
								}?>><?php echo $row['branch'];?> </option>
								<?php    
								}
								echo "</select>";
								//echo "Selected:". $selected;
								?>
					 		</div>
						</div>
					<div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-default">Submit</button>
						</div>
					  </div>

				</form>
			<!--</div>-->
		</div>
	</div>
	<div class="about">
				<!--<div class="title"><h3>	Everyday Visitors</h3></title>-->
				<?php
       				if(isset($_POST['branch']) && !empty($_POST['branch']))
						{
						    
							$branch = $_POST['branch'];
							unset($_POST);
					?>	
				<table id="datatable" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Branch Name</th>
							<th>Flower Name</th>
							<th>People Used</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
        
					<?php
					//mysql_query("SET SQL_BIG_SELECTS=1");
						$getallpat = mysql_query("SELECT b.branch, ebf.flower_name, b.branch_code, ebf.patient_count FROM `ed_branch_flower` AS ebf INNER JOIN branches AS b WHERE b.branch_code LIKE  '".$branch."%' AND ebf.branch_code = b.branch_code");
//echo "select epd.ed_id, pd.patient_id, pd.patient_name, pd.gender, pd.contact_no, pd.chief_complain, epd.charges, epd.created_on from  ed_patient_diagnosis epd left join patient_details pd on epd.patient_id = pd.patient_id $subquery order by epd.created_on desc";

						$i = 1; 
						$total = 0;
						while($row = mysql_fetch_array($getallpat)){
							echo "<tr>";
							echo "<td>".$i;
							echo "</td>";

							echo "<td>".$row['branch'];
							echo "</td>";

							echo "<td>".$row['flower_name'];
							echo "</td>";
							
							echo "<td>".$row['patient_count'];
							echo "</td>";
							 
							if($row['patient_count'] == 25) {
							    echo "<td><a href='updateFlower.php?branch=".base64_encode($row['branch_code'])."&flowerName=".base64_encode($row['flower_name'])."'<button class='btn btn-default'>Update ".strtoupper($row['flower_name'])."</button></td>";
							   
							} else {
							    echo "<td></td>";
							}

							echo "</tr>";
							$i++;
						}
						} else {
						    //echo "coming in else";exit;
						    $branch = (isset($_GET['branch']) && !empty($_GET['branch'])) ? $_GET['branch'] : '--';
						    
						    unset($_GET);
					?>
							<table id="datatable" class="display" cellspacing="0" width="100%">
            					<thead>
            						<tr>
            							<th>Sr. No.</th>
            							<th>Branch Name</th>
            							<th>Flower Name</th>
            							<th>People Used</th>
            							<th></th>
            						</tr>
            					</thead>
								<tbody>
					<?php
					$getallpat = mysql_query("SELECT b.branch, ebf.flower_name, b.branch_code, ebf.patient_count FROM `ed_branch_flower` AS ebf INNER JOIN branches AS b WHERE b.branch_code LIKE  '".$branch."%' AND ebf.branch_code = b.branch_code");
					//echo "SELECT b.branch, ebf.flower_name, b.branch_code, ebf.patient_count FROM `ed_branch_flower` AS ebf INNER JOIN branches AS b WHERE b.branch_code LIKE  '".$branch."%' AND ebf.branch_code = b.branch_code";
					//exit;
					$i = 1;
					$total = 0;
        					while($row = mysql_fetch_array($getallpat)) {
        					    echo "<tr>";
        					    echo "<td>".$i;
        					    echo "</td>";
        					    
        					    echo "<td>".$row['branch'];
        					    echo "</td>";
        					    
        					    echo "<td>".$row['flower_name'];
        					    echo "</td>";
        					    
        					    echo "<td>".$row['patient_count'];
        					    echo "</td>";
        					    
        					    if($row['patient_count'] == 25) {
                                                       echo "<td><a href='updateFlower.php?branch=".base64_encode($row['branch_code'])."&flowerName=".base64_encode($row['flower_name'])."'<button class='btn btn-default'>Update ".strtoupper($row['flower_name'])."</button></td>";
        					        
        					    } else {
                                                        echo "coming in else";
        					        echo "<td></td>";
        					    }
        					    
        					    echo "</tr>";
        					    $i++;
        					}
						}
					?>
					</tbody>
					<!-- <tfoot>
						<tr><th colspan="6" style="text-align:right;">Total</th>
							<th><?php //echo $total;?></th>
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
	
	