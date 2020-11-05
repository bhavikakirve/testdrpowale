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
					
				</div>
					<div class="main-header">
						<div class="wrap">
							<div class="logo">
								<a href="index.html"><img src="images/logo.png" title="logo" /></a>
							</div>
							<div class="social-links">
								<ul>
									<li><a href="#"><img src="images/facebook.png" title="facebook" /></a></li>
									<li><a href="#"><img src="images/twitter.png" title="twitter" /></a></li>
									<li><a href="#"><img src="images/feed.png" title="Rss" /></a></li>
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
								<li><a href="index.html">Dashboard</a></li>
								<!-- <li class="active"><a href="about.html">About</a></li>
								<li><a href="services.html">Services</a></li>
								<li><a href="news.html">News</a></li>
								<li><a href="contact.html">Contact</a></li> -->
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
					   <!-- <div class="form-group">
						<label class="control-label col-sm-4" for="symtom">Search Existing Patient:</label>
						<div class="col-sm-4"> 
						  <input type="text" class="form-control" name="search" id="symtom" placeholder="Enter Patient ID/Name">
						</div>
						<div class="col-sm-2"> 
							<button type="submit" class="btn btn-default">View</button>
						</div>
					  </div> -->
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
						<label class="control-label col-sm-2" for="symtom">Patient Id:</label>
						<div class="col-sm-4"> 
						  <input type="text" class="form-control" name="patientid" id="symtom" placeholder="Enter Patient ID" value="" readonly="readonly">
						</div>
						<div class=" form-group"> 
						  <label class="control-label col-sm-1" for="symtom">Patient Name:</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" name="patientname" id="symtom" placeholder="Enter Patient Name">
						  </div>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label col-sm-2" for="gender">Gender:</label>
						<div class="col-sm-4"> 
						  <select class="form-control" id="gender" name="gender" onchange="loaddiv(this.value)">
							<option >Select gender</option>
							<option value="Female">Female</option>
							<option value="Male">Male</option>							
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
						<div class="col-sm-10" style="border: 1px solid #ccc;  border-radius: 4px;">
						   No History
						 </div>
						</div>
					 
					   
					
					  <div class="form-group">
						<label class="control-label col-sm-2" for="symtom"><u>Diagnosis</u></label>
					  </div>
					 
					   <div class="form-group">
						<label class="control-label col-sm-2" for="rough">Symtoms:</label>
						<div class=" field_wrapper">
						<div class="input-group col-sm-4 ">						
						  <input type="text" class=" form-control ui-autocomplete-input symtoms" name="symtoms[]" id="1" placeholder="1">
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
?>
<script>


var availableTags = [<?php echo $symvals; ?>];

$(function(){
  $(document).on("keydown.autocomplete",".symtoms",function(e){
    $(this).autocomplete({
      source : availableTags
    });
  });
});


//date picker

  $(function() {
    $( "#datepicker" ).datepicker({
      dateFormat : 'dd/mm/yy',
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

function qtnclicked(value){
	var qtnid = value;
	
	var qtnids ="";
	var qtnname = "";
	var qid = "";
	$("input[name='symtoms[]']").each(function() {
		qtnname = $(this).val();
		qid = $("input[name='"+qtnname+"']:checked").val();
		qtnids = qid+","+qtnids;
	});
	//alert(qtnids);
	$.ajax({
		url:"ajax/ajaxdata.php",
		data:"qtns="+qtnids+"&type=qtn",
		success: function(result){
			$("#medicine-wrapper").html(result);
		}
	});
}
function subqtns(qtnid){
	var qtnid = qtnid;
	$.ajax({
		url:"ajax/ajaxdata.php",
		data:"qid="+qtnid+"&type=subqtn",
		success: function(result){
			if(result == "NA"){
				return 0;
			}else{
				
			}
		}
	});
}

</script>
	</body>
</html>