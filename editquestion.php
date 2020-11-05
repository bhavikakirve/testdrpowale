<?php
include("sessions.php"); 
	include "config/connect.php";
	if(isset($_POST['flower'])){
		$flower = $_POST['flower'];
		$qesid = $_POST['qesid'];
		$medicine = $_POST['medicine'];
		
		$question = $_POST['question'];
		$symptom = $_POST['symptom'];
		$symptomid = $_POST['symptomid'];
		//echo "<br/>question:".$question."<br>";
		//echo "<br/>symptom:".$symptom."<br>";
		
		$symptom_type = $_POST['symptom_type'];
		//echo " symptomtype".$symptom_type;
		$flower_flag = (strtolower($_POST['flower_flag'] == 'on')?'Y':'N');
		//echo "flower_flag".$flower_flag;
		
		$query = mysql_query("update questions set flower ='".$flower."', medicine='".$medicine."', flower_flag='".$flower_flag."', question = '".$question."' where question_id = $qesid");
		
		$query = mysql_query("update symtoms set symtom ='".$symptom."', symptom_type='".$symptom_type."' where symtom_id = $symptomid");
		header("location:diseases.php");
		
	}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Questions | Unique Homeopathic Clinic</title>
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
				<div class="title"><h3>	Edit Question Details</h3></title>
				<form name='editquestion' method='POST' action ='editquestion.php?qid=<?php echo $_REQUEST['qid'];?>' >
				<?php
					$qid = $_REQUEST['qid'];
					
					$symtom_query = mysql_query("select * from questions  q, symtoms  s where  q.symtom_id = s.symtom_id and question_id = '".$qid."' " );
					//echo "select * from questions  q, symtoms  s where  q.symtom_id = s.symtom_id and question_id = '".$qid."' " ;
					//$symtomr = mysql_result($symtom_query);
					while($row = mysql_fetch_array($symtom_query)){
					$symptom = $row['symtom'];
					$symptomid = $row['symtom_id'];
					$question = $row['question'];
					$medicine = $row['medicine'];
					$flower = $row['flower'];
					$flower_flag = $row['flower_flag'];
					$flowercheck = '';
					
					echo "<input type='hidden' name='symptomid' value='".$symptomid."'>";
					echo "<table>";
					echo "<tr>";
					echo "<td>Symptom : ";
					echo "</td>";					
					echo "<td> <input type='text' name='symptom' value='".$symptom."'>";
					echo "</td>";					
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>Symptom Type: ";
					echo "</td>";					
					echo "<td> <input type='radio' name='symptom_type' value='Acute'> Accute";
					echo "<input type='radio' name='symptom_type' value='Chronic'> Chronic";
					echo "</td>";					
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>question : ";
					echo "</td>";					
					echo "<td><input type='text' name='question' value='".$question."'>";
					echo "</td>";					
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>medicine : ";
					echo "</td>";					
					echo "<td><input type='text' name='medicine' value='".$medicine."'>";
					echo "</td>";					
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>Flower : ";
					echo "</td>";					
					echo "<td><input type='hidden' name='qesid' value='".$qid."'> <input type='text' name='flower' value='".$flower."'>";
					echo "</td>";					
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>Enable Flower: ";
					echo "</td>";		
					$flowercheck =  '';
					if(strtoupper($flower_flag) == 'Y'){
						$flowercheck = 'checked';
					}
					echo "<td><input type='checkbox' name='flower_flag'  ".$flowercheck." > Yes";
					echo "</td>";					
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>";
					echo "</td>";					
					echo "<td><input type='submit' value='Save'>";
					echo "</td>";					
					echo "</tr>";
					
					echo "</table>";
					
					}
				?>
				</form>
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

