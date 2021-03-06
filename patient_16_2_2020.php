<?php
include("sessions.php"); 
	include "config/connect.php";
	$getsymtoms = mysql_query("select * from symtoms");
	while($row = mysql_fetch_array($getsymtoms)){
		$symptom_type = $row['symptom_type'];
		$type ="";
		
		$type = $symptom_type;
	
		$symtoms[$row['symtom_id']] = $row['symtom'];
		$symtype[$row['symtom_id'].'_type'] = $symptom_type;
	}
	//print_r($symtype);

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
		  
		 <!--  <script src="add/jquery.js"></script> -->

		  <script type="text/javascript">
			$(document).ready(function(){
				var maxField = 14; //Input fields increment limitation
				var addButton = $('.add_button'); //Add button selector
				var wrapper = $('.field_wrapper'); //Input field wrapper
				var fieldHTML = '<div> <div class=" col-sm-2 "></div><div class="input-group col-sm-4 "><input type="text" class=" form-control symtoms" name="symtoms[]" id="symtom" placeholder="2"><span class="input-group-btn"><button class="btn btn-danger btn-add remove_button" type="button"><span class="glyphicon glyphicon-minus"></span></button></span></div></div>'; //New input field html 
				var x = 1; //Initial field counter is 1
				$(addButton).click(function(){ //Once add button is clicked
					if(x < maxField){ //Check maximum number of input fields
						x++; //Increment field counter
						$(wrapper).append('<div class="remove_'+x+'"> <div class="col-sm-2 "></div><div class="input-group col-sm-4 "><input type="text" class=" form-control ui-autocomplete-input symtoms" name="symtoms[]" id="'+x+'" placeholder="'+x+'"><span class="input-group-btn"><button class="btn btn-danger btn-add remove_button" id="'+x+'" type="button"><span class="glyphicon glyphicon-minus"></span></button></span></div></div>'); // Add field html
					}
				});
				$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
					e.preventDefault();
					//$(this).parent('div').remove(); //Remove field html
					var id = $(this).attr('id');
					$('.remove_'+id).remove();
					//alert('.remove_'+id);
					x--; //Decrement field counter
				});
					$(document).on("focusout","#name",function(event){
						event.preventDefault();
						var patname = $("#name").val();

						if(patname.length >0){
							$(".fsymtoms").prop("disabled",false);
							$("#diagnosbtn").prop("disabled",false);
							$("#plusbutton").prop("disabled",false);
						}else{
							$(".fsymtoms").prop("disabled",true);
							$("#diagnosbtn").prop("disabled",true);
							$("#plusbutton").prop("disabled",true);
						}
					});
					$("#historybutton").click(function(){
						$("#allhistory").toggle();
						 $(this).html($(this).html() == 'Show History' ? 'Hide History' : 'Show History');
					});

			});
			</script>
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
			#historybutton{
				border:1px solid;
				margin-left:400px;
				border-radius:5px;
				cursor:pointer;
			}
			span.red{
				color:red;
			}
		  </style>
		  
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
								 <li class="active"><a href="patient.php">Add / View Patients</a></li>	
								 <?php
								 if($_SESSION['role']=='Admin'){ ?>
								<li><a href="patientslist.php">Patients</a></li> 
								<li><a href="users.php">Users</a></li>
								<li><a href="adduser.php">Add User</a></li>								
								<li><a href="diseases.php">Diseases</a></li>	
								<li><a href="monthlytotal.php">Monthly Total</a></li>
								<li><a href="monthlytotal_new.php">Monthly Total New</a></li>
							<li><a href="http://sms.mdsmedia.in/" target="_blank">SMS SITE</a></li>
                                                                <li><a href="addbranch.php">Add Branches</a></li>
                                                                 <li><a href="addCSV.php">Create CSV</a></li>
                                                                <li><a href="branch.php">Branches</a></li>
                                                                <li><a href="branchFlower_new.php">Branch Flower</a></li>
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
					<form class="form-horizontal" role="form" id="patientdata" action = "patient_process.php" method="POST" data-toggle='validator' onsubmit="myButton.disabled = true; return true;">
					    <div class="form-group">
						<label class="control-label col-sm-4" for="symtom">Search Existing Patient:</label>
						<div class="col-sm-4"> 
						  <input type="text" class="form-control" name="search" id="search" placeholder="Enter Patient ID/Name">
						  <input type="hidden" name="searchid" id="searchid">
						</div>
						<div class="col-sm-2"> 
							<button type="button" class="btn btn-default" id="searchbtn" onclick="searchpatient();">View</button>
						</div>
					  </div> 
						<?php						
							if(isset($_REQUEST['s'])){
								$boxtype = "";
								$ptid = "";
								$msg = "";
								if($_REQUEST['s']=="y"){
									$boxtype = "success";
									$ptid = $_REQUEST['pt'];
									$msg = "Patient data saved Successfully. Patients id is ".$ptid;
								}else{
									$boxtype = "warning";
									$msg = "Patient data saving failed. Kindly add again"; 
								}

							?>
					  <div class="alert alert-<?php echo $boxtype; ?>" role="alert"><?php echo $msg; ?></div>
					  <?php
								}
						?>
					  
					  <div class="form-group">
						<label class="control-label col-sm-2" for="symtom">Patient Name:</label>
						  <div class="col-sm-3">
							<input type="text" class="form-control" name="patientname" id="name" placeholder="Enter Patient Name" required>
						  </div>
						<!-- <div class="col-sm-4">  -->
						  <input type="hidden" class="form-control" name="patientid" id="patientid" placeholder="Enter Patient ID" value="" >
						<!-- </div> -->
						<div class=" form-group"> 
						<label class="control-label col-sm-2" for="gender">Gender:</label>
						<div class="col-sm-4"> 
						  <select class="form-control" id="gender" name="gender" onchange="loaddiv(this.value)">
							<option >Select gender</option>
							<option value="F">Female</option>
							<option value="M">Male</option>							
						  </select>
						</div>
						</div>
					  </div>
					  
					  <div class="form-group">
						  <label class="control-label col-sm-2" for="symtom">Contact No.:</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" VALUE="91" style="width:15%;float:left;">&nbsp;&nbsp;<input type="text" class="form-control" name="contactno" id="contact" placeholder="Enter Patient Contact No." maxlength=12 style="width:80%;float:left;margin-left:6px;" required>
						  </div>
						<div class=" form-group"> 
						  <label class="control-label col-sm-1" for="dob">Age</label>
						  <div class="col-sm-4">
						  <input type="text" class="form-control " name="age" id="age" placeholder="Age">
							<input type="hidden" class="form-control " name="dob" id="datepicker" placeholder="Age">
						  </div>
						</div>
					  </div>
						<div class=" form-group"> 
						  <label class="control-label col-sm-2" for="place">Place</label>
						  <div class="col-sm-4">
						  <input type="text" class="form-control " name="place" id="place" placeholder="Place">
						  </div>
						  <label class="control-label col-sm-1" for="reference">Reference</label>
						  <div class="col-sm-4">
						  <input type="text" class="form-control " name="reference" id="reference" placeholder="Reference">
						  </div>
						</div>
					  <div class=" form-group"> 
							  <label class="control-label col-sm-2" for="chief complain">Chief Complain:</label>
							  <div class="col-sm-9">
								<textarea name="ccomplain" class="form-control" id="ccomplain" placeholder="Chief Complain"></textarea>
							  </div>
						  </div>
					  <!--<div class='col-sm-12'><button type="button" class="btn btn-default"  id="historybutton">Show History</button></div>
						<div class="form-group" id="allhistory" style="display:none;">-->
					   <div class="form-group" id="allhistory">
						<div class='col-sm-12'><label class="control-label col-sm-2" for="symtom"><u>History</u></label></div>
						<div class="col-sm-12" >
						  
						   <div class=" form-group"> 
							  <label class="control-label col-sm-2" for="family_history">Remedy:</label>
							  <div class="input-group col-sm-4 ">
								<div class="radio " >
								  <label><input type="radio" name="remedy" id="remedy_1" value="Acute">Acute</label>
								  <label><input type="radio" name="remedy"  id="remedy_2" value="Constitutional">Constitutional</label>
								</div>
							</div>
						  </div>

						  <div class=" form-group"> 
							  <label class="control-label col-sm-2" for="past history">Past History:</label>
							  <div class="col-sm-10" >
								<div class="checkboxes" >
									  <label  class=" col-sm-3"><input type="checkbox" name="typhoid"  value="1">Typhoid</label>
									  <label  class=" col-sm-3"><input type="checkbox" name="maleria"  value="1">Maleria</label>
									  <label  class=" col-sm-3"><input type="checkbox" name="influenza"  value="1">Influenza</label>
									  <label  class=" col-sm-3"><input type="checkbox" name="tuberculosis"  value="1">Tuberculosis</label>
									  <label  class=" col-sm-3"><input type="checkbox" name="infetious_disease"  value="1">Infectious Disease</label>
									  <label  class=" col-sm-3"><input type="checkbox" name="jaundice"  value="1">Jaundice</label>
									  <label  class=" col-sm-3"><input type="checkbox" name="allergy"  value="1">Allergy</label>
									  <label  class=" col-sm-3"><input type="checkbox" name="pneumonia"  value="1">Pneumonia</label>
									  <label  class=" col-sm-3"><input type="checkbox" name="std_hiv"  value="1">STD/HIV</label>
									  <label  class=" col-sm-3"><input type="checkbox" name="skin_disease"  value="1">Skin Disease</label>
									  <label  class=" col-sm-3"><input type="checkbox" name="pleurisy"  value="1">Pleurisy</label>
									  <label  class=" col-sm-3"><input type="checkbox" name="masturbation"  value="1">Masturbation</label>
									  <label  class=" col-sm-3"><input type="checkbox" name="dysentry"  value="1">Dysentry</label>
									  <label  class=" col-sm-3"><input type="checkbox" name="worms"  value="1">Worms</label>
									  <label class=" col-sm-3"><input type="checkbox" name="gout"  value="1">Gout</label>
									  <label class=" col-sm-3"><input type="checkbox" name="head_injury"  value="1">Head Injury</label>
									  <label class="col-sm-3"><input type="checkbox" name="operation"  value="1">Operation</label>
									  <label class=" col-sm-3"><input type="checkbox" name="blood_transfusion"  value="1">Blood Transfusion</label>
									  <input type="text" class="form-control" name="miscpasthist" id="miscpasthist" style="width:30%; float:left;">
									  </div>
									  <div class=" form-group"> 
									 <div class=" col-sm-12">
									 	<label  class=" col-sm-2">Tendency to: </label><label  class=" col-sm-2"><input type="checkbox" name="bleeding"  value="1">Bleeding</label>
										<label  class=" col-sm-2"><input type="checkbox" name="headache"  value="1">Headache</label>				
										<label  class=" col-sm-2"><input type="checkbox" name="supuration"  value="1">Supuration</label>				
										<label  class=" col-sm-2"><input type="checkbox" name="catching_cold"  value="1">Catching Cold</label>				
										<label  class=" col-sm-2"><input type="checkbox" name="rheumatic_trouble"  value="1">Rheumatic Trouble</label>				
									 </div>
								</div>
								<!-- <textarea name="past_history" class="form-control" id="past_history"  placeholder="Past History"></textarea> -->
							  </div>
							   
						  </div>

						  <div class=" form-group"> 
							  <label class="control-label col-sm-2" for="family history">Family History:</label>
							  <div class="col-sm-9">
								<textarea name="family_history" class="form-control" id="family_history" placeholder="Family History"></textarea>
							  </div> 
						  </div>
						  <div class=" form-group"> 
							  <label class="control-label col-sm-2" for="past history">Profile History:</label>
							  <div class="col-sm-10">
							  <div class=" form-group col-sm-10" >
								<label class="control-label col-sm-1" for="apetite">Apetite:</label>
								<div class="col-sm-4 ">
								<select  class=" form-control" name="apetite" placeholder="Apetite">
									<option value="">-- Select --</option>
									<option value="Normal">Normal</option>
									<option value="Good">Good</option>
									<option value="Bad">Bad</option>
								</select>
								</div>
								<label class="control-label col-sm-2" for="apetite">Veg:</label>
								<div class="col-sm-4 ">
									<select class=" form-control" name="veg" placeholder="Veg/Non Veg">
										<option value="">-- Select --</option>
										<option value="Veg">Veg</option>
										<option value="Veg">Non-Veg</option>
									</select>
								</div>
							  </div>
							  <div class="form-group col-sm-10" >
								<label class="control-label col-sm-1" for="apetite">Desire:</label>
								<div class="col-sm-4 ">
									<select  class=" form-control" name="desire" placeholder="Desire">
										<option value="">-- Select --</option>
										<option value="Sweet">Sweet</option>
										<option value="Spicy">Spicy</option>
										<option value="Alcoholic">Alcoholic</option>
									</select>
								</div>
								<label class="control-label col-sm-2" for="thirst">Thirst:</label>
								<div class="col-sm-4 ">
									<select  class=" form-control" name="thirst">
										<option value="">-- Select --</option>
										<option value="Thirsty">Thirsty</option>
										<option value="Thirstless">Thirstless</option>
									</select>
								</div>							
							  </div>
							  <div class="form-group col-sm-10" >
							    <label class="control-label col-sm-1" for="relation">Relation:</label>
								<div class="col-sm-4 ">
									<select  class=" form-control" name="relation">
										<option value="">-- Select --</option>
										<option value="Hot">Hot</option>
										<option value="Chilly">Chilly</option>
									</select>
								</div>
								<label class="control-label col-sm-2" for="apetite">Sleep:</label>
								<div class="col-sm-4 ">
									<select  class=" form-control" name="sleep" placeholder="Sleep">
										<option value="">-- Select --</option>
										<option value="Normal">Normal</option>
										<option value="Sleepy">Sleepy</option>
										<option value="Sleepless">Sleepless</option>
										
									</select>
								</div>
							  </div>
							  <div class="form-group col-sm-10" >
								<label class="control-label col-sm-1" for="tounge">Tounge:</label>
								<div class="col-sm-4 ">
									<select  class=" form-control" name="tounge" placeholder="tounge">
										<option value="">-- Select --</option>
										<option value="White">White</option>
										<option value="Yellow">Yellow</option>
										<option value="Black">Black</option>
										<option value="Clear">Clear</option>
										<option value="Cracky">Cracky</option>
									</select>
								</div>
								<label class="control-label col-sm-2" for="apetite">Drinks:</label>
								<div class="col-sm-4 ">
									<select  class=" form-control" name="drinks" placeholder="Drinks">
										<option value="">-- Select --</option>
										<option value="Hot">Hot</option>
										<option value="Cold">Cold</option>
									</select>									
								</div>
								</div>
							  </div>
						</div>
						 </div>
							<div class=" form-group"> 
							    <div class=" col-sm-12"><label class="control-label col-sm-2" for="family history"><u>Mental State:</u></label></div>
							   <div class="form-group col-sm-12">
							   <label class="control-label col-sm-2" for="family history">Emotional State:</label>
							   <div class="col-sm-9 "><textarea class=" form-control" name="emotionalstate" placeholder="Emotional State"></textarea></div>
							   </div>
							   <div class=" form-group col-sm-12">
							   <label class="control-label col-sm-2" for="family history">Intellectual State:</label>
							   <div class="col-sm-9 "><textarea class=" form-control" name="intellectualstate" placeholder="Intellectual State"></textarea></div>
							   </div>
							</div>

							<div class=" form-group"> 
							    <div class=" col-sm-12"><label class="control-label col-sm-2" for="family history"><u>Menstrual History:</u></label></div>
							   <div class="form-group col-sm-12">
							   <label class="control-label col-sm-2" for="family history">Menses:</label>
							   <div class="col-sm-9 "><textarea class=" form-control" name="menses" placeholder="Menses"></textarea></div>
							   </div>
							   <div class=" form-group col-sm-12">
							   <label class="control-label col-sm-2" for="family history">Leucorrhoa:</label>
							   <div class="col-sm-9 "><textarea class=" form-control" name="Leucorrhoa" placeholder="Leucorrhoa"></textarea></div>
							   </div>
							</div>
							<div class=" form-group"> 
							    <label class="control-label col-sm-2" for="family history"><u>Obstetrical History:</u></label>
							   <div class="form-group col-sm-10">

							   <div class="col-sm-9 "><textarea class=" form-control" name="obstetrical_history" placeholder="Obstetrical History"></textarea></div>
							   </div>
							  
							</div>
							<div class=" form-group"> 
							    <label class="control-label col-sm-2" for="family history"><u>Physical Exam:</u></label>
							   <div class="form-group col-sm-10">

							   <div class="col-sm-9 "><textarea class=" form-control" name="physical_exam" placeholder="Physical Exam"></textarea></div>
							   </div>
							  
							</div>
							<div class=" form-group"> 
							    <label class="control-label col-sm-2" for="family history"><u>Investigation:</u></label>
							   <div class="form-group col-sm-10">

							   <div class="col-sm-9 "><textarea class=" form-control" name="investigation" placeholder="Investigation"></textarea></div>
							   </div>							  
							</div>
							<div class=" form-group"> 
							    <label class="control-label col-sm-2" for="prognosis"><u>Prognosis:</u></label>
							   <div class="form-group col-sm-10">
							   <div class="col-sm-4"><select class="form-control" id="prognosis" name="prognosis" >
							<option value="">Select</option>
							<option value="Good">Good</option>
							<option value="Bad">Bad</option>
							<option value="Better">Better</option>
						  </select></div>
							   </div>							  
							</div>
							
						</div>
					 
					   <!--  <div class="form-group">
							<label class="control-label col-sm-2" for="symtom">Symtoms</label>
							<div class="col-sm-4 ">
								<input type="text" class=" form-control" name="patsymtoms" placeholder="Symtoms">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="symtom">Disease </label>
							<div class="col-sm-4 ">
								<input type="text" class=" form-control" name="disease" placeholder="Disease">
							</div>
						</div> -->
					<div class=" form-group"> 
						<label class="control-label col-sm-2" for="Previous Diagnosis"><u>Previous Diagnosis:</u></label>
					   <div class="form-group col-sm-10">
							<div class="col-sm-9 "  id='previousdiagnosis'></div>
					   </div>							  
					</div>
					
					  <div class="form-group">
						<label class="control-label col-sm-2" for="symtom"><u>Diagnosis</u></label>
					  </div>
					 
					   <div class="form-group">
						<label class="control-label col-sm-2" for="final">Doctor Diagnosed:</label>
							<div class=" field_wrapper">
								<div class="input-group col-sm-4 ">
								  <input type="text" class=" form-control ui-autocomplete-input fsymtoms" name="symtoms[]" id="1" disabled placeholder="1">
								  <span class="input-group-btn">
									<button class="btn btn-success btn-add add_button" type="button" id='plusbutton' disabled>
										<span class="glyphicon glyphicon-plus"></span>
									</button>
								</span>
								</div>
							</div>
							<label class="control-label col-sm-2"></label>
							<div class="input-group col-sm-4 ">	
								
							</div>
						
					  </div>

					 <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						<button type="button" class="btn btn-default" id="diagnosbtn" disabled>Diagnos</button>
						 
						</div>
					  </div>

					 <div class="form-group">
						<label class="control-label col-sm-2"></label>
						  <div id="diagnosisof" class="col-sm-4" style="font-weight:bold">

						  </div>
					  </div>

					   <div class="form-group">
						<label class="control-label col-sm-2" for="symtom"><u>Medical Diagnosis</u></label>
					  </div>
					  <div id="dignosis-wrapper">
						
					  </div>
					   <div class="form-group">
						<label class="control-label col-sm-2" for="symtom"><!-- <u>Medicines</u> --></label>
					  </div>
					  <div id="medicine-wrapper">
						
					  </div>
					<div class="form-group">
					  <div class="input-group col-sm-9 ">
							<label class="control-label col-sm-2" for="final">Charges:</label>
							<div class="form-group col-sm-10">
							   <div class="col-sm-4">
							   		<select class="form-control" id="charges" name="charges" >
            							<option value="">Select</option>
            							<option value="free">Free</option>
            							<option value="300">300</option>
            							<option value="600">600</option>
            							<option value="1200">1200</option>
            							<option value="1800">1800</option>
            							<option value="2400">2400</option>
            							<option value="3000">3000</option>
            							<option value="3600">3600</option>
						  			</select>
						  		</div>
							</div>
						</div>
					</div>
					  
					  <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" name="myButton" id="save_patientdata" class="btn btn-default">Save</button>
						</div>
					  </div>
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
				<!---start-copy-right----->
				<div class="copy-tight">
					<!-- <p>Design by <a href="http://w3layouts.com/">W3layouts</a></p> -->
				</div>
				<!---End-copy-right----->
			</div>
		</div>
		<!---End-footer---->

		<!-- javascript -->
<script src="jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script src="jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<?php
$symvals = "";
foreach ($symtoms as $key=> $val)
{
	if(strlen($symtype[$key.'_type'])>0){
		
		$symvals .= '"'.$val.' ('.$symtype[$key.'_type'].')" ,';
	}else{
		$symvals .= '"'.$val.'" ,';
	}
}
$symvals = rtrim($symvals,',');
//echo $symvals;

$patientdata = "";
	//if($user_id==1)
      if($_SESSION['role']== 'Admin')
	{
		$getpatientdata = mysql_query("select patient_id, patient_name, contact_no, date_of_birth from patient_details");
	}
	else
	{
		$user_branch_code = mysql_result(mysql_query("select branch_code from users where user_id = '".$user_id."' limit 1"),0);
		$getpatientdata = mysql_query("select patient_id, patient_name, contact_no, date_of_birth from patient_details where patient_id like '".$user_branch_code."%'");
	}
	
while($pr = mysql_fetch_array($getpatientdata)){
	$patientdata .= '{id: "'.$pr['patient_id'].'", label: "'.$pr['patient_id'].' - '.$pr['patient_name'].' - '.$pr['contact_no'].' - '.$pr['date_of_birth'].'"},';
}
$patientdata = rtrim($patientdata,',');

?>
<script>
var patientTags = [<?php echo $patientdata; ?>];
var availableTags = [<?php echo $symvals; ?>];
$(function(){
	
	$(".fsymtoms").autocomplete({
      source : availableTags
    });
  $(document).on("keydown.autocomplete",".symtoms",function(e){
    $(".symtoms").autocomplete({
      source : availableTags
    });
  });
  //$(document).on("keydown.autocomplete","#search",function(e){
    $("#search").autocomplete({
      source : patientTags,
	  minLength: 1,
	  select: function(event, ui) {
		  var matchinglabel;
		  //alert(ui.item.id);
		  $("#searchid").val(ui.item.id);
		   // Corresponding Text Box 1 value to selected.
		}
    });
  //});
});


//date picker

  $(function() {
    $( "#datepicker" ).datepicker({
      dateFormat : 'dd-mm-yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '-1d'
    });
  });

  $("#diagnosbtn").click(function(){	  
		$("#save_patientdata").attr("disabled",'true');
		var multi_members="";
		var diagnosed = "";
		$("input[name='symtoms[]']").each(function() {
			if($(this).val().length > 0){
				multi_members="'"+$(this).val()+"',"+multi_members;
				diagnosed = diagnosed+"<br/>"+$(this).val().replace('Chronic', '<span class=\"red\">Chronic</span>')+"<br/>";
				
			}
		});
		//alert(multi_members);
		$.ajax({
			url:"ajax/ajaxdata.php",
			data:"symtoms="+multi_members+"&type=symtom",
			success: function(result){
				//alert(result);
				$("#save_patientdata").removeAttr("disabled");
				$("#dignosis-wrapper").html(result);
				$("#diagnosisof").html(diagnosed);
				$("input[name='symtoms[]']").attr('type','hidden');
				$(".remove_button").css('display','none');
			}
		});
	});

function qtnclicked(value, symtomid){
	var qtnid = value;	// currently clicked 
	//alert("value"+value+"symid"+symtomid);
	$("#save_patientdata").attr("disabled",'true');
	$(".sym_"+symtomid+" .subqtn").html("");
	// --- check if the option has subquestions ---- //
	$.ajax({
		url:"ajax/ajaxdata.php",
		data:"qid="+qtnid+"&type=subqtn",
		success: function(result){
			//alert("result: "+result);
			if(result == "NA"){
				
		var qtnids ="";
		var qtnname = "";
		var qid = "";
		var subqtnname = "";
		var subqid = "";
		//-- get the question id and find the answer medicine
		$("input[name='symtoms[]']").each(function() {
			qtnname = $(this).val();
			qid = $("input[name='"+qtnname+"']:checked").val();
			$("#save_patientdata").removeAttr("disabled");
			//alert("current question id: "+qid);
			// check if the qid is parent any question
			//delay( 800 );
			qtnids = qid+","+qtnids;
			/*$.ajax({
				url:"ajax/ajaxdata.php",
				data:"qid="+qid+"&type=checksubqtn",
				success: function(result){
					//alert("is parent of any question? "+result);
					if(result == "NA"){
						// -- not a parent of any question
						//alert("not a parent of any question");
						qtnids = qid+","+qtnids;
					}else{
						//alert("qid is parent of some qid");
						subqtnname = $("input[name='"+qtnname+"']:checked").attr("id");
						//alert(subqtnname);
						subqid = qid = $("input[name='"+subqtnname+"']:checked").val();
						qid = subqid;
						qtnids = subqid+","+qtnids;
					}				
									
				}
			});*/
			//alert("qtnids "+qtnids);
			//sleep(3000);
			//qtnids = qid+","+qtnids;
		});
		//sleep(9000);
		//alert("qtnids "+qtnids);

		/* live working medicine output*/
			/*$.ajax({
				url:"ajax/ajaxdata.php",
				data:"qtns="+qtnids+"&type=qtn",
				success: function(result){
					$("#medicine-wrapper").html(result);
				}
			});*/	

			}else{
				//-- selected option has subquestion so add the sub questions
				$(".subqtn_of"+qtnid).html(result);		
				$("#save_patientdata").removeAttr("disabled");
			}
		}
	});
	
	/*alert("qtnclicked funtn subqtn var"+subqtn);
	if(subqtn == "N"){
		alert("halo");
		var qtnids ="";
		var qtnname = "";
		var qid = "";
		var subqtnname = "";
		var subqid = "";
		$("input[name='symtoms[]']").each(function() {
			qtnname = $(this).val();
			qid = $("input[name='"+qtnname+"']:checked").val();
			var hassubqtn = checksubqtn(qid);
			delay( 800 );
			if(hassubqtn == "NA"){
				qtnids = qid+","+qtnids;
			}else{
				subqtnname = $("input[name='"+qtnname+"']:checked").attr("id");
				alert(subqtnname);
				subqid = qid = $("input[name='"+subqtnname+"']:checked").val();
				qtnids = subqid+","+qtnids;
			}

			alert(qtnids);
		});
		
		$.ajax({
			url:"ajax/ajaxdata.php",
			data:"qtns="+qtnids+"&type=qtn",
			success: function(result){
				$("#medicine-wrapper").html(result);
			}
		});
	}*/
}
function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}
function checksubqtn(qtnid){

	var qtnid = qtnid;
	var returnval = "";
	//alert(qtnid);
	//$(".sym_"+symtomid+" .subqtn").html("");
	$.ajax({
		url:"ajax/ajaxdata.php",
		data:"qid="+qtnid+"&type=checksubqtn",
		success: function(result){
			//alert(result);
			if(result == "NA"){
				//alert("na");
				returnval = "N";
				//$("#save_patientdata").removeAttr("disabled");
			}else{			
				//$("#save_patientdata").removeAttr("disabled");			
				returnval = "Y";
				
			}
		}
	});
	return returnval;
}

function subqtns(qtnid, symtomid){
	//$("#save_patientdata").attr("disabled",'true');
	var qtnid = qtnid;
	var returnval = "0";
	//alert("subqtns funtn called");
	//alert(qtnid);
	$(".sym_"+symtomid+" .subqtn").html("");
	$.ajax({
		url:"ajax/ajaxdata.php",
		data:"qid="+qtnid+"&type=subqtn",
		success: function(result){
			//alert("result: "+result);
			if(result == "NA"){
				//alert("in na");
				returnval = "N";
					//$("#save_patientdata").removeAttr("disabled");
			}else{
				$(".subqtn_of"+qtnid).html(result);
				returnval = "Y";
					//$("#save_patientdata").removeAttr("disabled");
			}
		}
	});

	//alert("return value "+ returnval);
	return returnval;
	
}

function searchpatient(){
	//alert("halo");
	var searchid = $("#searchid").val();
	//alert(searchid);
	$.ajax({
		type: "POST",
		url:"ajax/ajaxsearch.php",
		data:"sid="+searchid,	
		dataType: "json",
		success: function(result){
			//alert("returnval: "+result);
			$("#name").val(result['patient_name']);
			$("#patientid").val(result['patient_id']);
			$("#contact").val(result['contact_no']);
			$("#age").val(result['age']);
			$("#place").val(result['place']);
			$("#prognosis").val(result['prognosis']);
			var gen = result['gender'];
			if(gen == "F"){
				gen = "Female";
			}else{
				gen = "Male";
			}
			//$("#gender").val(result['gender']);
			$("#gender option").each(function() { this.selected = (this.text == gen); });;
			//$("#datepicker").val(result['dob']);
			$("#ccomplain").val(result['chief_complain']);
			$("#reference").val(result['reference']);
			$("#past_history").val(result['past_history']);
			$("#family_history").val(result['family_history']);
			$("[name='remedy']").removeAttr("checked");

			if(result['remedy'].length>0){
				if(result['remedy'] == 'Acute'){
					$("#remedy_1").prop("checked", true);
				}else{
					$("#remedy_2").prop("checked", true);
				}
			}
			if(result['typhoid']== 1){
				$("[name='typhoid']").prop( "checked", true );
			}
			if(result['maleria']== 1){
				$("[name='maleria']").prop( "checked", true );
			}
			if(result['influenza']== 1){
				$("[name='influenza']").prop( "checked", true );
			}
			if(result['tuberculosis']== 1){
				$("[name='tuberculosis']").prop( "checked", true );
			}
			if(result['infectious_disease']== 1){
				$("[name='infetious_disease']").prop( "checked", true );
			}
			if(result['jaundice']== 1){
				$("[name='jaundice']").prop( "checked", true );
			}
			if(result['allergy']== 1){
				$("[name='allergy']").prop( "checked", true );
			}
			if(result['pneumonia']== 1){
				$("[name='pneumonia']").prop( "checked", true );
			}
			if(result['std_hiv']== 1){
				$("[name='std_hiv']").prop( "checked", true );
			}
			if(result['skin_disease']== 1){
				$("[name='skin_disease']").prop( "checked", true );
			}
			if(result['pleurisy']== 1){
				$("[name='pleurisy']").prop( "checked", true );
			}
			if(result['masturbation']== 1){
				$("[name='masturbation']").prop( "checked", true );
			}
			if(result['dysentry']== 1){
				$("[name='dysentry']").prop( "checked", true );
			}
			if(result['worms']== 1){
				$("[name='worms']").prop( "checked", true );
			}
			if(result['gout']== 1){
				$("[name='gout']").prop( "checked", true );
			}
			if(result['head_injury']== 1){
				$("[name='head_injury']").prop( "checked", true );
			}
			if(result['operation']== 1){
				$("[name='operation']").prop( "checked", true );
			}
			if(result['blood_transfusion']== 1){
				$("[name='blood_transfusion']").prop( "checked", true );
			}

			if(result['bleeding']== 1){
				$("[name='bleeding']").prop( "checked", true );
			}
			if(result['headache']== 1){
				$("[name='headache']").prop( "checked", true );
			}
			if(result['supuration']== 1){
				$("[name='supuration']").prop( "checked", true );
			}
			if(result['catching_cold']== 1){
				$("[name='catching_cold']").prop( "checked", true );
			}
			if(result['rhemautic_trouble']== 1){
				$("[name='rheumatic_trouble']").prop( "checked", true );
			}

			$("#family_history").val(result['family_history']);
			$("[name='apetite']").val(result['apetite']);
			$("[name='veg']").val(result['veg']);
			$("[name='desire']").val(result['desire']);
			$("[name='aversions']").val(result['aversions']);
			$("[name='relation']").val(result['relation']);
			$("[name='thirst']").val(result['thirst']);
			$("[name='tounge']").val(result['tounge']);			
			$("[name='indigestible_things']").val(result['indigestible_things']);
			$("[name='sleep']").val(result['sleep']);
			$("[name='habits']").val(result['habits']);
			$("[name='drinks']").val(result['drinks']);

			$("[name='emotionalstate']").val(result['emotional_state']);
			$("[name='intellectualstate']").val(result['intellectual_state']);
			$("[name='menses']").val(result['menses']);
			$("[name='Leucorrhoa']").val(result['leucorrhoa']);
			$("[name='obstetrical_history']").val(result['obstetrical_history']);
			$("[name='physical_exam']").val(result['physical_exam']);
			$("[name='investigation']").val(result['investigation']);

			$("#previousdiagnosis").html(result['symtom']);

			var patname = $("#name").val();
			if(patname.length >0){
				$(".fsymtoms").prop("disabled",false);
				$("#diagnosbtn").prop("disabled",false);
				$("#plusbutton").prop("disabled",false);
			}else{
				$(".fsymtoms").prop("disabled",true);
				$("#diagnosbtn").prop("disabled",true);
				$("#plusbutton").prop("disabled",true);


			}
		}
	});
}
</script>
	</body>
</html>