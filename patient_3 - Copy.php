<?php
	include "config/connect.php";
	$getsymtoms = mysql_query("select * from symtoms");
	while($row = mysql_fetch_array($getsymtoms)){
		$symtoms[$row['symtom_id']] = $row['symtom'];
	}
	//print_r($symtoms);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Dr. Powle's Clinic Management System | Patients</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		  <!-- jquery ui css -->
		  <link href="jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
<!-- bootstrap -->
		  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		  <script src="bootstrap/jquery.min.js"></script>
		  <script src="bootstrap/bootstrap.min.js"></script>
		  
		  <script src="add/jquery.js"></script>

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
		  </style>
		  
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
								 <li><a href="patientslist">Patients</a></li> 
								<li><a href="users.php">Users</a></li>
								<li><a href="adduser.php">Add User</a></li>
								<!--<li><a href="contact.html">Contact</a></li> -->
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
					<form class="form-horizontal" role="form" id="patientdata" action = "patient_process.php" method="POST">
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
						  <div class="col-sm-4">
							<input type="text" class="form-control" name="patientname" id="name" placeholder="Enter Patient Name">
						  </div>
						<!-- <div class="col-sm-4">  -->
						  <input type="hidden" class="form-control" name="patientid" id="patientid" placeholder="Enter Patient ID" value="" >
						<!-- </div> -->
						<div class=" form-group"> 
						  <label class="control-label col-sm-1" for="symtom">Contact No.:</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" name="contactno" id="contact" placeholder="Enter Patient Contact No.">
						  </div>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label col-sm-2" for="gender">Gender:</label>
						<div class="col-sm-4"> 
						  <select class="form-control" id="gender" name="gender" onchange="loaddiv(this.value)">
							<option >Select gender</option>
							<option value="F">Female</option>
							<option value="M">Male</option>							
						  </select>
						</div>
						<div class=" form-group"> 
						  <label class="control-label col-sm-1" for="dob">Date Of Birth:</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control " name="dob" id="datepicker" placeholder="Date of Birth">
						  </div>
						</div>
					  </div>

					   <div class="form-group">
						<label class="control-label col-sm-2" for="symtom"><u>History</u></label>
						<div class="col-sm-5" >
						  <div class=" form-group"> 
							  <label class="control-label col-sm-3" for="chief complain">Chief Complain:</label>
							  <div class="col-sm-9">
								<input type="text" class="form-control " name="ccomplain" id="ccomplain" placeholder="Chief Complain">
							  </div>
						  </div>

						  <div class=" form-group"> 
							  <label class="control-label col-sm-3" for="past history">Past History:</label>
							  <div class="col-sm-9">
								<textarea name="past_history" class="form-control" id="past_history"  placeholder="Past History"></textarea>
							  </div>
						  </div>

						  <div class=" form-group"> 
							  <label class="control-label col-sm-3" for="family history">Family History:</label>
							  <div class="col-sm-9">
								<textarea name="family_history" class="form-control" id="family_history" placeholder="Family History"></textarea>
							  </div>
						  </div>

						 </div>

						 <!-- <div class="col-sm-5" style="border:1px solid #ccc; border-radius:4px;">
						 <label class="control-label col-sm-4" for="past diagnosis"><u>Past Diagnosis</u></label>
						 </div> -->
						</div>
					 
					    <div class="form-group">
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
						</div>
					
					  <div class="form-group">
						<label class="control-label col-sm-2" for="symtom"><u>Diagnosis</u></label>
					  </div>
					 
					   <div class="form-group">
						<label class="control-label col-sm-2" for="final">Doctor Diagnosed:</label>
						<div class=" field_wrapper">
						<div class="input-group col-sm-4 ">						
						  <input type="text" class=" form-control ui-autocomplete-input fsymtoms" name="symtoms[]" id="1" placeholder="1">
						  <span class="input-group-btn">
							<button class="btn btn-success btn-add add_button" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
						  </span>
						  
						</div>
						</div>
						
					  </div>

						<div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="button" class="btn btn-default" id="diagnosbtn">Diagnos</button>
						</div>
					  </div>
					   <div class="form-group">
						<label class="control-label col-sm-2" for="symtom"><u>Medical Diagnosis</u></label>
					  </div>
					  <div id="dignosis-wrapper">
						
					  </div>
					   <div class="form-group">
						<label class="control-label col-sm-2" for="symtom"><u>Medicines</u></label>
					  </div>
					  <div id="medicine-wrapper">
						
					  </div>
					<div class="form-group">
					  <div class="input-group col-sm-9 ">
							<label class="control-label col-sm-2" for="final">Charges:</label>
							<div class="input-group col-sm-4 ">
								<div class="radio " >
								  <label><input type="radio" name="charges"  value="100">100</label>
								  <label><input type="radio" name="charges"  value="200">200</label>
								  <label><input type="radio" name="charges"  value="300">300</label>
								  <label><input type="radio" name="charges"  value="F">F</label>
								</div>
							</div>
						</div>
					</div>
					  
					  <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-default">Save</button>
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
					<div class="footer-grid">
						<h3>OUR Profile</h3>
						 <ul>
							<li><a href="#">Lorem ipsum dolor sit amet</a></li>
							<li><a href="#">Conse ctetur adipisicing</a></li>
							<li><a href="#">Elit sed do eiusmod tempor</a></li>
							<li><a href="#">Incididunt ut labore</a></li>
							<li><a href="#">Et dolore magna aliqua</a></li>
							<li><a href="#">Ut enim ad minim veniam</a></li>
						</ul>
					</div>
					<div class="footer-grid">
						<h3>Our Services</h3>
						 <ul>
							<li><a href="#">Et dolore magna aliqua</a></li>
							<li><a href="#">Ut enim ad minim veniam</a></li>
							<li><a href="#">Quis nostrud exercitation</a></li>
							<li><a href="#">Ullamco laboris nisi</a></li>
							<li><a href="#">Ut aliquip ex ea commodo</a></li>
						</ul>
					</div>
					<div class="footer-grid">
						<h3>OUR FLEET</h3>
						 <ul>
							<li><a href="#">Lorem ipsum dolor sit amet</a></li>
							<li><a href="#">Conse ctetur adipisicing</a></li>
							<li><a href="#">Elit sed do eiusmod tempor</a></li>
							<li><a href="#">Incididunt ut labore</a></li>
							<li><a href="#">Et dolore magna aliqua</a></li>
							<li><a href="#">Ut enim ad minim veniam</a></li>
						</ul>
					</div>
					<div class="footer-grid">
						<h3>CONTACTS</h3>
						 <p>Lorem ipsum dolor sit amet ,</p>
						 <p>Conse ctetur adip .</p>
						 <p>ut labore Usa.</p>
						 <span>(202)1234-56789</span>
					</div>
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

		<!-- javascript -->
<script src="jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script src="jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<?php
$symvals = "";
foreach ($symtoms as $key=> $val)
{
	$symvals .= '"'.$val.'",';
}
$symvals = rtrim($symvals,',');
//echo $symvals;

$patientdata = "";
$getpatientdata = mysql_query("select patient_id, patient_name, contact_no, date_of_birth from patient_details");
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
	  
		var multi_members="";
		$("input[name='symtoms[]']").each(function() {
			multi_members="'"+$(this).val()+"',"+multi_members;
		});
		//alert(multi_members);
		$.ajax({
			url:"ajax/ajaxdata.php",
			data:"symtoms="+multi_members+"&type=symtom",
			success: function(result){
				//alert(result);
				$("#dignosis-wrapper").html(result);
			}
		});
	});

function qtnclicked(value, symtomid){
	var qtnid = value;	// currently clicked 
	alert("value"+value+"symid"+symtomid);


	
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
			}else{				
				returnval = "Y";
			}
		}
	});
	return returnval;
}

function subqtns(qtnid, symtomid){
	var qtnid = qtnid;
	var returnval = "0";
	alert("subqtns funtn called");
	//alert(qtnid);
	$(".sym_"+symtomid+" .subqtn").html("");
	$.ajax({
		url:"ajax/ajaxdata.php",
		data:"qid="+qtnid+"&type=subqtn",
		success: function(result){
			alert("result: "+result);
			if(result == "NA"){
				alert("in na");
				returnval = "N";
			}else{
				$(".subqtn_of"+qtnid).html(result);
				returnval = "Y";
			}
		}
	});

	//alert("return value "+ returnval);
	return returnval;
	
}

function searchpatient(){
	//alert("halo");
	var searchid = $("#searchid").val();
	alert(searchid);
	$.ajax({
		type: "POST",
		url:"ajax/ajaxsearch.php",
		data:"sid="+searchid,	
		dataType: "json",
		success: function(result){
			alert(result['dob']);
			$("#name").val(result['patient_name']);
			$("#patientid").val(result['patient_id']);
			$("#contact").val(result['contact_no']);
			var gen = result['gender'];
			if(gen == "F"){
				gen = "Female";
			}else{
				gen = "Male";
			}
			//$("#gender").val(result['gender']);
			$("#gender option").each(function() { this.selected = (this.text == gen); });;
			$("#datepicker").val(result['dob']);
			$("#ccomplain").val(result['chief_complain']);
			$("#past_history").val(result['past_history']);
			$("#family_history").val(result['family_history']);
		}
	});
}

</script>
	</body>
</html>