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
			


		  <script type="text/javascript">
		  $(document).ready(function() {
			     
				$('#datatable').dataTable({
					    "paging":   false, 
						"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
		                    if ( aData[3] == "13" )
		                    {
		                        $('td', nRow).css('background-color', 'Red');
		                    } else if(aData[3] == "14") {
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
					<h3>Welcome <?php //echo $_SESSION['name']; ?></h3>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="top-nav">
			<div class="wrap">
				<ul>
					<li><a href="patient.php">Add / View Patients</a></li>
					<li><a href="patientslist.php">Patients</a></li>
					<li><a href="users.php">Users</a></li>
					<li><a href="adduser.php">Add User</a></li>
					<li><a href="addCSV.php">Create CSV</a></li>
					<li><a href="branchFlower.php">Branch Flower</a></li>
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
				<form class="form-horizontal" role="form" id="patientdata" action="branchFlower_new.php" method="POST">
					<!--<div class=" form-group">
						<label class="control-label col-sm-2" for="dob">Branch:</label>
						<div class="col-sm-4">
        					        					  
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
						    $flower_arr = array();
							$branch = $_POST['branch'];
							unset($_POST);
					?>	
				<table style="width:100%" border="1">
				   <form name="abc"	id="abc" method="post" action="branchflower_process_new.php">
				   <input type="hidden" name="branchCode" id="branchCode" value="<?php echo $branch?>">        
					<?php
						$getallpat = mysql_query("SELECT b.branch, ebf.flower_name, b.branch_code, ebf.patient_count FROM `ed_branch_flower` AS ebf INNER JOIN branches AS b WHERE b.branch_code LIKE  '".$branch."%' AND ebf.branch_code = b.branch_code");
						$i = 1; 
						$total = 0;
						$max_arr = [];
					?>
					  <tr>
							<th>Flower Name</th>
							<?php
						          for($i=1;$i<=50;$i++) {
						    ?>
								<td> <?php echo $i;?></td>
							<?php
					           }
				            ?>
			  			</tr>
			  			<tr>
			  			<th>Patient Count</th>
			  			<?php 
			  			
			  			    while($row = mysql_fetch_array($getallpat)){
			  			        if($row['patient_count'] == 15) {
			  			            $flower_arr[$row['flower_name']] = $row['patient_count'];
			  			        }
			  			        echo "<td>".$row['patient_count'];
						        echo "</td>";
  						    }
							
						?>
						</tr>
						<tr>
						<th>Checked Box</th>
					    <?php
					    $int_max=[];
					    foreach($flower_arr as $key=>$value) {
					        $int = (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT);
					        $int_max[] = $int;
					    }
    					     					 				
    					$string_array=explode(",",implode(" , ",$int_max));
    					  
					    for($i=1;$i<=50;$i++) {
					          if(in_array($i,$string_array)) {
					              echo "<td><input type='checkbox' name='Flower[".$i."]' id='Flower[".$i."]' value='Flower ".$i."'/></td>";
					          } else {
					              echo "<td><input type='checkbox' name='abc' id='abc' disabled='disabled'/></td>";
					          }
			
					      }
			             ?>		      
			             </tr>
			             <tr>
			                <th colspan="51">
			                	<div style="margin:5px 150px 5px;"><input type='submit' value='Submit'/></div>
			                </th>
					     </tr>
					     <tr>
					     	<th colspan="51">
					     		</form>
					     	</th>
					     </tr> 
					  </table>
     			     <?php  
						} else {
						    $branch = (isset($_GET['branch']) && !empty($_GET['branch'])) ? $_GET['branch'] : '--';
						    unset($_GET);
					?>
							<table style="width:100%" border="1">
								<form name="abc"	id="abc" method="post" action="branchflower_process.php">
				   				<input type="hidden" name="branchCode" id="branchCode" value="<?php echo $branch?>">
            					
					<?php
					   $getallpat = mysql_query("SELECT b.branch, ebf.flower_name, b.branch_code, ebf.patient_count FROM `ed_branch_flower` AS ebf INNER JOIN branches AS b WHERE b.branch_code LIKE  '".$branch."%' AND ebf.branch_code = b.branch_code");
					   $i = 1;
					   $total = 0;
					   $max_arr = [];
					   $flower_arr = [];
					?>
					  <tr>
							<th>Flower Name</th>
							<?php
						          for($i=1;$i<=50;$i++) {
						    ?>
								<td> <?php echo $i;?></td>
							<?php
					           }
				            ?>
			  			</tr>
			  			<tr>
			  			<th>Patient Count</th>
			  			<?php 
			  			
			  			    while($row = mysql_fetch_array($getallpat)){
			  			        if($row['patient_count'] == 15) {
			  			            $flower_arr[$row['flower_name']] = $row['patient_count'];
			  			        }
			  			        echo "<td>".$row['patient_count'];
						        echo "</td>";
  						    }
							
						?>
						</tr>
						<tr>
						<th>Checked Box</th>
					    <?php
					    $int_max=[];
					    foreach($flower_arr as $key=>$value) {
					        $int = (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT);
					        $int_max[] = $int;
					    }
    					     					 				
    					$string_array=explode(",",implode(" , ",$int_max));
    					  
					    for($i=1;$i<=50;$i++) {
					          if(in_array($i,$string_array)) {
					              echo "<td><input type='checkbox' name='Flower[".$i."]' id='Flower[".$i."]' value='Flower ".$i."'/></td>";
					          } else {
					              echo "<td><input type='checkbox' name='abc' id='abc' disabled='disabled'/></td>";
					          }
			
					      }
			             ?>		      
			             </tr>
			             <tr>
			                <th colspan="51">
			                	<div style="margin:5px 150px 5px;"><input type='submit' value='Submit'/></div>
			                </th>
					     </tr>
					     <tr>
					     	<th colspan="51">
					     		</form>
					     	</th>
					     </tr> 
					  </table>
								
					</table>
				   </form> 
				<?php
					}
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
	
	
	