<?php
	include("sessions.php"); 
	include "config/connect.php";
        
        $getsymtoms = mysql_query("select * from symtoms");
	while($row = mysql_fetch_array($getsymtoms)){
		$symtoms[$row['symtom_id']] = $row['symtom'];
	}
	//print_r($symtoms);
	if(isset($_REQUEST['eid'])){
	$eid = $_REQUEST['eid'];
	$getpatientdata = mysql_query("select pd.pid, epd.charges, epd.branch_id, epd.created_on, epd.created_by, pd.patient_name, pd.patient_id, pd.gender, pd.date_of_birth, pd.contact_no, pd.place, pd.chief_complain, pd.past_history, pd.family_history, u.name, epd.patsymtoms, epd.disease, pd.age from ed_patient_diagnosis epd, patient_details pd, users u where epd.patient_id = pd.patient_id and epd.created_by= u.user_id and epd.ed_id='".$eid."'");
	while($row1 = mysql_fetch_array($getpatientdata)){
		$pid= $row['pid'];
		$patientid = $row1['patient_id'];
		$patientname = $row1['patient_name'];
		$gender = $row1['gender'];
		$contactno = $row1['contact_no'];
		$place = $row1['place'];
		//$dob = $row1['date_of_birth'];
		$ccomplain = $row1['chief_complain'];
		$past_history = $row1['past_history'];
		$family_history = $row1['family_history'];
		$date = $row1['created_on'];
		$branchid=$row1['branch_id'];
		$charges = $row1['charges'];
		$createdby = $row1['name'];
		$patsymtoms= $row['patsymtoms'];
		$disease = $row['disease'];
		$age = $row1['age'];
	}
	$chiefcomplain = "";
	$family_history = "";
	$remedy = "";
	$maleria = "";
	$influenza = "";
	$tuberculosis = "";
	$infectious_disease = "";
	$jaundice = "";
	$allergy = "";
	$pneumonia = "";
	$std_hiv = "";
	$skin_disease = "";
	$pleurisy = "";
	$masturbation = "";
	$dysentry =  "";
	$worms = "";
	$gout = "";
	$headinjury = "";
	$operation = "";
	$blood_transfusion = "";
	$headache = "";
	$supuration = "";
	$catching_cold = "";
	$rheumatic_trouble = "";
	$apetite = "";
	$veg = "";
	$desire = "";
	$aversions = "";
	$indigestible_things = "";
	$sleep = "";
	$habits = "";
	$drinks = "";
	$mental_state = "";
	$emotional_state = "";
	$intellectual_state = "";
	$menstrualhistory ="";
	$menses = "";
	$leucorrhoa = "";
	$obstetrical_history = "";
	$physical_exam = "";
	$investigation = "";
	$remedy = "";
	$typhoid = "";
	$maleria = "";
	$bleeding ="";

	$gethostory = mysql_query("select * from patient_history where ed_id='".$eid."'");
	while($row2 = mysql_fetch_array($gethostory)){
		$chiefcomplain = $row2['chief_complain'];
		$family_history = $row2['family_history'];
		$remedy = $row2['remedy'];	

	if($row2['typhoid']==1){
		$typhoid = "<div class='col-sm-2'>Typhoid</div>";
	}
	if($row2['maleria'] == 1)	{
		$maleria = "<div class='col-sm-2'>Maleria</div>";
	}
	if($row2['influenza']==1){
		$influenza = "<div class='col-sm-2'>Influenza</div>";
	}
	if($row2['tuberculosis']==1) {
		$tuberculosis = "<div class='col-sm-2'>Tuberculosis</div>";
	}
	if($row2['infectious_disease']==1){
		$infectious_disease = "<div class='col-sm-2'>Infectious Disease</div>";
	}
	if($row2['jaundice']==1)
	{
		$jaundice = "<div class='col-sm-2'>Jaundice</div>";
	}
	if($row2['allergy']==1){
		$allergy = "<div class='col-sm-2'>Allergy</div>";
	}
	if($row2['pneumonia']==1){
		$pneumonia = "<div class='col-sm-2'>Pneumonia</div>";
	}
	if($std_hiv = $row2['std_hiv']==1){
		$std_hiv = "<div class='col-sm-2'>Std/Hiv</div>";
	}
	if($row2['skin_disease']==1){
		$skin_disease = "<div class='col-sm-2'>Skin Disease</div>";
	}
	if($row2['pleurisy']==1){
		$pleurisy = "<div class='col-sm-2'>Pleurisy</div>";
	}
	if( $row2['masturbation'] == 1){
		$masturbation = "<div class='col-sm-2'>Masturbation</div>";
	}
	if($row2['dysentry'] == 1){
		$dysentry = "<div class='col-sm-2'>Dysentry</div>";
	}
	if($row2['worms'] == 1){
		$worms = "<div class='col-sm-2'>Worms</div>";
	}
	if($row2['gout'] == 1){
		$gout = "<div class='col-sm-2'>Gout</div>";
	}
	if($row2['head_injury'] == 1){
		$headinjury = "<div class='col-sm-2'>Head Injury</div>";
	}
	if($row2['operation'] == 1){
		$operation = "Operation";
	}
	if($row2['blood_transfusion'] == 1){
		$blood_transfusion = "<div class='col-sm-2'>Blood Transfusion</div>";
	}
	if($row2['bleeding'] == 1){
		$bleeding = "<div class='col-sm-2'>Bleeding</div>";
	}
	if($row2['headache'] == 1){
		$headache = "<div class='col-sm-2'>Headache</div>";
	}
	if($row2['supuration'] == 1){
		$supuration = "<div class='col-sm-2'>Supuration</div>";
	}
	if($row2['catching_cold'] == 1){
		$catching_cold = "<div class='col-sm-2'>Catching Cold</div>";
	}
	if($row2['rhemautic_trouble'] == 1){
		$rheumatic_trouble = "<div class='col-sm-2'>Rhemautic Trouble</div>";
	}

	$apetite = "<div class='col-sm-4'>Appetite: ".$row2["apetite"]."</div>";	
	$veg = "<div class='col-sm-4'>Veg: ".$row2["veg"]."</div>";
	$desire = "<div class='col-sm-4'> Desire: ".$row2["desire"]."</div>";
	$aversions = "<div class='col-sm-4'>Aversions: ".$row2["aversions"]."</div>";
	$relation = "<div class='col-sm-4'>Relation: ".$row2["relation"]."</div>";
	$thirst = "<div class='col-sm-4'>Thirst: ".$row2["thirst"]."</div>";
	$tounge = "<div class='col-sm-4'>Tounge: ".$row2["tounge"]."</div>";	
	$indigestible_things = "<div class='col-sm-4'>Indigestible Things: ".$row2["indigestible_things"]."</div>";
	$sleep = "<div class='col-sm-4'>Sleep: ".$row2["sleep"]."</div>";
	$habits = "<div class='col-sm-4'>Habits: ".$row2["habits"]."</div>";
	$drinks = "<div class='col-sm-4'>Drinks: ".$row2["drinks"]."</div>";

		if(strlen($row2["emotional_state"])>0){
		$emotional_state = "<div class='col-sm-2'>Emotional State: </div><div class='col-sm-10'>".$row2["emotional_state"]."</div>";
		}
		if(strlen($row2["mental_state"])>0){
		$mental_state = "<div class='col-sm-2'>Mental State: </div><div class='col-sm-10'>".$row2["mental_state"]."</div>";
		}
		if(strlen($row2["intellectual_state"])>0){
		$intellectual_state = "<div class='col-sm-2'>Intellectual State: </div><div class='col-sm-10'>".$row2["intellectual_state"]."</div>";
		}
		if(strlen($row2["menstrual_history"])>0){
		$menstrualhistory = "<div class='col-sm-2'>Mentrual History: </div><div class='col-sm-10'>".$row2["menstrual_history"]."</div>";
		}
		if(strlen($row2["menses"])>0){
			$menses = "<div class='col-sm-2'>Menses: </div><div class='col-sm-10'>".$row2["menses"]."</div>";
		}
		if(strlen($row2["leucorrhoa"])>0){
			$leucorrhoa = "<div class='col-sm-2'>Lecorrhoa: </div><div class='col-sm-10'>".$row2["leucorrhoa"]."</div>";
		}
		if(strlen($row2["obstetrical_history"])>0){
		$obstetrical_history = "<div class='col-sm-2'>Obstetrical History: </div><div class='col-sm-10'>".$row2["obstetrical_history"]."</div>";
		}
		if(strlen($row2["physical_exam"])>0){
		$physical_exam = "<div class='col-sm-2'>Physical Exam: </div><div class='col-sm-10'>".$row2["physical_exam"]."</div>";
		}
		if(strlen($row2["investigation"])>0){
		$investigation = "<div class='col-sm-2'>Investigation: </div><div class='col-sm-10'>".$row["investigation"]."</div>";
		}	
	}

	$past_history = $typhoid." ".$maleria." ".$influenza." ".$tuberculosis." ".$infectious_disease." ".$jaundice." ".$allergy." ".$pneumonia." ".$std_hiv." ".$skin_disease." ".$pleurisy." ".$masturbation." ".$dysentry." ".$worms." ".$gout." ".$headinjury." ".$operation." ".$blood_transfusion." ".$bleeding." ".$headache." ".$supuration." ".$catching_cold." ".$rheumatic_trouble;

	$profile_history = "<div class='col-sm-12'>".$apetite." ".$veg." ".$desire." ".$relation." ".$thirst." ".$tounge." ".$sleep." ".$drinks."</div>";


?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Dr. Powale's Clinic Management System | Patients</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		  <!-- jquery ui css -->
		  <link href="jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
<!-- bootstrap -->
		  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		  <script src="bootstrap/jquery.min.js"></script>
		  <script src="bootstrap/bootstrap.min.js"></script>
		  
		 
			<style type="text/css">
			/*input[type="text"]{height:20px; vertical-align:top;}*/
			.field_wrapper div{ margin-bottom:10px;}
			/*.add_button{ margin-top:2px; margin-left:2px;vertical-align: text-bottom;}
			.remove_button{ margin-top:2px; margin-left:2px;vertical-align: text-bottom;}*/
			span.glyphicon {
			  margin: 3px;
			}
			</style>
		  <style>
		  #patientdata .col-sm-1 {
			  width: 10.333333%;
			}
			.ui-datepicker .ui-datepicker-title select{
				color:#000;
			}
			.form-horizontal .control-label{
				padding-top:0px;
			}
		  </style>

<script type="text/javascript">
function print_receipt(){
//var charges
}

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
								<ul>
									<li><a href="#"><img src="images/facebook.png" title="facebook" /></a></li>
									<li><a href="#"><img src="images/twitter.png" title="twitter" /></a></li>
									<div class="clear"> </div>
								</ul>
							</div>
							<div class="clear"> </div>
						</div>
					</div>
					<div class="clear"> </div>
					<div class="top-nav">
						<div class="wrap">
							<ul>
								<!-- <li><a href="index.html">Dashboard</a></li> -->
								  <li class="active"><a href="patient.php">Add / View Patients</a></li>	
								 <?php
									 
								 if($_SESSION['role']=='Admin'){ ?>
								<li><a href="patientslist.php">Patients</a></li> 
								<li><a href="users.php">Users</a></li>
								<li><a href="adduser.php">Add User</a></li>								
								<li><a href="diseases.php">Diseases</a></li>								
								<li><a href="monthlytotal.php">Monthly Total</a></li>
								<?php } ?>
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
					<div class="title"><h3>	Patient Data</h3></title>
					<form class="form-horizontal" role="form" id="patientdata" >
					<div class="form-group">
						<label class="control-label col-sm-2" for="symtom">Patient Id:</label>
						<div class="col-sm-2">
						<?php echo $patientid;?>
						</div>
						<label class="control-label col-sm-2" for="symtom">Patient Diagnosed On:</label>
						<div class="col-sm-2">
						<?php echo $date; ?>
						</div>
						<label class="control-label col-sm-2" for="symtom">Patient Diagnosed By:</label>
						<div class="col-sm-2">
						<?php echo $createdby; ?>
						</div>
					</div>
					  					  
					  <div class="form-group">
						<label class="control-label col-sm-2" for="symtom">Patient Name:</label>
						  <div class="col-sm-2">
							<?php echo $patientname;?>
						  </div>
						<!-- <div class="col-sm-4">  -->
						  
						<!-- </div> -->
						<div class=" form-group"> 
						  <label class="control-label col-sm-1" for="symtom">Contact No.:</label>
						  <div class="col-sm-3">
							<?php echo $contactno; ?>
						  </div>
						  <div class="col-sm-2">
							<button type="button" class="btn btn-default" id="printbutton1" onclick="PrintElem('#receiptdata')">Print Receipt</button>
						  </div>
						</div>

						
					  </div>
					  
					  <div class="form-group">
						<label class="control-label col-sm-2" for="gender">Gender:</label>
						<div class="col-sm-2"> 
						  <?php
							if($gender == "F"){
								echo "Female";
							 }else{
								echo "Male";
							 }
						  ?>
						</div>
						<div class=" form-group"> 
						  <label class="control-label col-sm-1" for="dob">Age:</label>
						  <div class="col-sm-4">
							<?php echo $age; ?>
						  </div>
						</div>
						<div class=" form-group"> 
						  <label class="control-label col-sm-2" for="place">Place:</label>
						  <div class="col-sm-2">
							<?php echo $place; ?>
						  </div>
						</div>						
					  </div>


					   <div class="form-group">
						<label class="control-label col-sm-2" for="symtom"><u>History</u></label>
						<div class="col-sm-12" >
						  <div class=" form-group"> 
							  <label class="control-label col-sm-3" for="chief complain">Chief Complain:</label>
							  <div class="col-sm-9">
								<?php echo $ccomplain; ?>
							  </div>
						  </div>
						  <div class=" form-group"> 
							  <label class="control-label col-sm-3" for="remedy">Remedy:</label>
							  <div class="col-sm-9">
								<?php echo $remedy; ?>
							  </div>
						  </div>

						  <div class=" form-group"> 
							  <label class="control-label col-sm-3" for="past history">Past History:</label>
							  <div class="col-sm-9">
								<?php echo $past_history; ?>
							  </div>
						  </div>

						  <div class=" form-group"> 
							  <label class="control-label col-sm-3" for="family history">Family History:</label>
							  <div class="col-sm-9">
								<?php echo $family_history;?>
							  </div>
						  </div>

						  <div class=" form-group"> 
							  <label class="control-label col-sm-3" for="family history">Profile History:</label>
							  <div class="col-sm-9" >
								<?php echo $profile_history; ?>
							  </div>
						  </div>

						  <label class="control-label col-sm-12" for="symtom" style='text-align:left;padding-left:150px;'><u>Mental State</u></label>
						   <?php echo $emotional_state; 
								echo $intellectual_state;
								echo '<label class="control-label col-sm-12" for="symtom" style="text-align:left;padding-left:150px;"><u>Menstrual History</u></label>';
								echo $menses;
								echo $leucorrhoa;
								echo $obstetrical_history;
								echo $physical_exam;
								echo $investigation;
						  
						  ?>
						 </div>

						<!--  <div class="col-sm-5" style="border:1px solid #ccc; border-radius:4px;">
						 <label class="control-label col-sm-4" for="past diagnosis"><u>Past Diagnosis</u></label>
						 $getprevdiag = mysql_query("select patsymtoms, disease from ");
						 </div> -->
						</div>

					<!--  <div class="form-group">
							<label class="control-label col-sm-2" for="symtom">Symtoms</label>
							<div class="col-sm-10 " >
								<?php echo $patsymtoms; ?>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="symtom">Disease </label>
							<div class="col-sm-4 ">
								<?php echo $disease; ?>
							</div>
						</div> -->
					
					  <div class="form-group">
						<label class="control-label col-sm-2" for="symtom"><u>Diagnosis</u></label>
					  </div>
					 
					   <div class="form-group">
						<label class="control-label col-sm-2" for="final">Doctor Diagnosed:</label>
						<div class=" field_wrapper">
						<div class="input-group col-sm-4 ">						
						  <?php
								$getpatsymtoms = mysql_query("select s.symtom, eps.symptom_type from ed_patient_symtoms eps, symtoms s where eps.symtom_id = s.symtom_id and eps.ed_id = '".$eid."'");
								$sr = 1;
								$diagnosed_diseases = "";
							   while($rs = mysql_fetch_array($getpatsymtoms)){
									echo $sr.". ".$rs['symtom']." (".$rs['symptom_type'].")<br/>";
									$diagnosed_diseases .= $sr.". ".$rs['symtom']."<br/>";
									$sr++;									
							   }
						   ?>						  
						</div>
						</div>						
					  </div>
					   <div class="form-group">
						<label class="control-label col-sm-2" for="symtom"><u>Medical Diagnosis</u></label>
						<div class="col-sm-4">
						<?php 
						   $getdiagnosis = mysql_query("select q.question from ed_patient_qtns epq, questions q where epq.qtn_id=q.question_id and ed_id='".$eid."'");
							while($rd = mysql_fetch_array($getdiagnosis)){
								echo $rd['question']."<br/>";
							}
							?>
							</div>
					  </div>					 
					   <div class="form-group">
						<label class="control-label col-sm-2" for="symtom"><u>Medicines</u></label>
						<div class="col-sm-4">
						<?php
							$getmed = mysql_query("select epm.ep_medicine, q.medicine_duration, q.failure, epm.flower from ed_patient_medicine epm, ed_patient_qtns pq, questions q where epm.edq_id = pq.epq_id and epm.ed_id = '".$eid."' and pq.qtn_id = q.question_id");
							//echo "select * from ed_patient_medicine where ed_id = '".$eid."'";
							$srm = 1;
							while($rm = mysql_fetch_array($getmed)){
								echo $srm.") ".$rm['ep_medicine']."  (fl: ".$rm['flower'].")  (duration: ".$rm['medicine_duration'].")  (if fails ".$rm['failure'].")<br/>";
								$srm++;
							}
						?>
						</div>
					  </div>
					  
					<div class="form-group">
					  <div class="input-group col-sm-9 ">
							<label class="control-label col-sm-2" for="final">Charges:</label>
							<div class=" col-sm-2 ">
								<?php echo "Rupees ".$charges."/-"; ?>
								<input type="hidden" name="charges" id="charges">
							</div>
							<div class=" col-sm-3 ">
								<button type="button" class="btn btn-default" id="printbutton" onclick="PrintElem('#receiptdata')">Print Receipt</button>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div id="receiptdata" style="width:350px; border:1px solid; display:block;">
							<div class="pheader" class="row col-sm-12" style="width:100%; border-bottom:1px solid; padding-bottom:6px; padding-top:6px; margin-bottom:2px;">
								<img src="images/plogo1.png" align="left">
								<img src="images/plogo2.png" align="right">
								<p style="text-align:center; font-size:10px"><span class="logoname" style="font-size:8px;"><b>Dr. Powale's</b></span><br/>
								<span class=""><b>HOMEOEOPATHY</b></span></p>
								<div class='clear'></div>
							</div>
							<div class="ppdata" class="row col-sm-12" style="padding:0px 5px; font-size:11px; width:100%;">
								<label class="control-label col-sm-3" for="final" style="text-align:left; padding:0px; width:30%"><b>Branch:</b></label> <label class="control-label col-sm-3" for="final" style="text-align:left; padding:0px; width:30%"></label>
								<label class="control-label col-sm-2" for="final" style="text-align:left; padding:0px; width:20%;"><b>Date:</b></label><label class="control-label col-sm-3" for="final" style="text-align:left; padding:0px; width:30%"><?php echo date("d/m/Y", strtotime($date)); ?></label><br/>
								<label class="control-label col-sm-3" for="final" style="text-align:left; padding:0px;width:30%"><b>Patient Id:</b></label><label class="control-label col-sm-6" for="final" style="text-align:left; width:70%" ><?php echo $patientid; ?></label><br/>
								<label class="control-label col-sm-3" for="final" style="text-align:left; padding:0px; width:30%"><b>Patient Name:</b></label><label class="control-label col-sm-3" style="text-align:left; width:70%;" for="final"><?php echo $patientname; ?></label>
								<div class='clear'></div>
							</div>
							<div class="pdates" class=" row col-sm-12">
							</div>
							<div class="psymtoms" class="row col-sm-12" style="padding:0px 5px; font-size:11px; width:100%;">
							<img src="images/rx_symbol.png" width="25" ><br/>
							<?php 
								echo $diagnosed_diseases;
							?>
							<br/>
							</div>
							<div class="pcharges" class="row col-sm-12" style="font-size:12px; border-top:1px solid; padding:0px 5px;">
							<b>Fees:  </b><?php echo "Rupees ".$charges."/-"; ?>
							</div>						
						</div>
						<div class="clear"> </div>
					</div>
					<?php
					if($user_id==1)
					{
					?>
					  <div class="col-sm-12">
						<h3>Previous Records</h3>
						<?php
						$getallrecords = mysql_query("select pd.*, u.name from ed_patient_diagnosis pd, users u where pd.created_by =u.user_id and ed_id <> '".$eid."' and patient_id = '".$patientid."'");
						while($record = mysql_fetch_array($getallrecords)){
							echo "<div class='col-sm-12'><h4><u>".date('d-m-Y H:i:s',strtotime($record['created_on']))."<br/></u></h4> </div>";
							echo "<div class=' col-sm-4 ' ><b>Disgnosed by: </b> ".$record['name']."</div><div class=' col-sm-4 ' ><b>Charges:</b> ".$record['charges']."</div>";
							$getsymptoms = mysql_query("select s.symtom, pm.ep_medicine, ps.eps_id from ed_patient_symtoms ps, ed_patient_medicine pm, symtoms s where ps.eps_id = pm.eps_id and ps.symtom_id = s.symtom_id and ps.ed_id = '".$record['ed_id']."'");
							echo "<div class='col-sm-12'><ul>";
							while($diagnosed = mysql_fetch_array($getsymptoms)){
								echo "<li>".$diagnosed['symtom']." -  ".$diagnosed['ep_medicine']."</li>";
							}
							echo "</ul></div>";
						}
						?>
					</div>
					<?php
					}
					?>
					</form>
													
				</div>
				
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
					<!-- <p>Design by <a href="http://w3layouts.com/">W3layouts</a></p> -->
				</div>
				<!---End-copy-right----->
			</div>
		</div>
		<!---End-footer---->



<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', '', 'height=400,width=600');
        mywindow.document.write('<html><head><title></title>');
		mywindow.document.write("<style type='text/css' media='print'> @page { size:auto; margin:0mm;} body{margin:0px;} #receiptdata {page-break-after: auto;}</style>");
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
	</body>
</html>
<?php

//send sms code by suyog start
$curl = curl_init();

		//$msg = "Welcome to Dr Powale's Unique homoeopathy. Call: 9869462395 Our specialities: Piles, Allergic cold, rash/asthma, Kidney stone, Hairfall, Spondylitis, Backache";	
		$msg = "Welcome to NCONNECT HOMOEOPATHY Call 9869462395 Specialities: Piles, Allergic cold, Asthma, Kidney Stone, Hairfall, Spondylitis, Backache";

$mobno = $_REQUEST['mobileno'];
if(!empty($mobno)) // phone number is not empty
{
    if(preg_match('/^\d{12}$/',$mobno)) // phone number is valid
    {
	$area_code = substr($patientid,0,2);
	$patient_name_arr = explode(" ",trim($patientname));
	$patient_name = $patient_name_arr[0];
	$last_name = $patient_name_arr[1];
	if($area_code=='AL')
	{
		//$msg = "NCONNECT HOMOEOPATHY, Dear $patient_name received Rs $charges/- for treatment. Specialities : Piles, Allergies, Ashthama, Hairfall, Spondylitis, Backache, Acne. Call: 9822976476";	
		$msg="NCONNECT HOMOEOPATHY, Dear $patient_name received Rs $charges/-. Call: 9822976476 Specialities: Piles,Allergies,Hairfall,Spondylitis, Backache";

	}
	elseif($area_code=='KM')
	{
		//$msg = "NCONNECT HOMOEOPATHY, Dear $patient_name received Rs $charges/- for treatment. Specialities : Piles, Allergies, Ashthama, Hairfall, Spondylitis, Backache, Acne. Call: 9833163862";
		$msg="NCONNECT HOMOEOPATHY, Dear $patient_name received Rs $charges/-. Call: 9833163862 Specialities: Piles,Allergies,Hairfall,Spondylitis, Backache";	
		
	}	
	elseif($area_code=='FK')
	{
		//$msg = "NCONNECT HOMOEOPATHY, Dear $patient_name received Rs $charges/- for treatment. Specialities : Piles, Allergies, Ashthama, Hairfall, Spondylitis, Backache, Acne. Call: 9920691515";	
		$msg="NCONNECT HOMOEOPATHY, Dear $patient_name received Rs $charges/-. Call: 9920691515 Specialities: Piles,Allergies,Hairfall,Spondylitis, Backache";

	}	
	
$msg=substr($msg,0,160);	
$messageFinal = str_replace(' ', '+', $msg);	
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://sms.manddigitalsolutions.com/sendsmsv2.asp?user=powale&password=pass1234&sender=POWALE&text=$messageFinal&PhoneNumber=$mobno",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 8dae1fa6-48b9-cdbc-eb99-72457f0fe961"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

}
}

//send sms code by suyog end

	}

	?>