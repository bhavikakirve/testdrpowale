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
</head>
<body>
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
                                             
                                             
					?>
<tr>
							<th>Flower Name</th>
							<?php
						          for($i=1;$i<=100;$i++) {
						    ?>
								<td> <?php echo $i;?></td>
							<?php
					           }
				            ?>
			  			</tr>
                                                <tr>
			  			<th>Patient Count</th>
			  			<?php 
			  			    $flower_arr =[];
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
    					  
					    for($i=1;$i<=100;$i++) {
					          
					              echo "<td><input type='checkbox' name='Flower[".$i."]' id='Flower[".$i."]' value='Flower ".$i."'/></td>";
					         
			
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
						          for($i=1;$i<=100;$i++) {
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
					      echo "<td><input type='checkbox' name='Flower[".$i."]' id='Flower[".$i."]' value='Flower ".$i."'/></td>";
					         
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
            }
          ?>                        
       </div>
       
       
      <div style="margin-top: 100px;">
            <h3>Bottle History</h3>
       		<table id="datatable" class="display" cellspacing="0" width="100%" border=1>
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
							
									 
							if($row['bottle_count'] <=50) {
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
</body>
</html>