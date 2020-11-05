<?php
    include("sessions.php");
    include "config/connect.php";
    //include "header.php";
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
								<li><a href="patient.php">Add / View Patients</a></li>
								<li><a href="patientslist.php">Patients</a></li> 
								<li><a href="users.php">Users</a></li>
								<li><a href="adduser.php">Add User</a></li>
								<li><a href="diseases.php">Diseases</a></li>
                                                                <li class="active"><a href="add_disease.php">Add Diseases</a></li>
                                                                 <li><a href="addbranch.php">Add Branches</a></li>
<li><a href="addCSV.php">Create CSV</a></li>
<li><a href="branch.php">Branches</a></li>
								<li><a href="logout.php">Logout</a></li> 
								<div class="clear"> </div>
							</ul>
						</div>
					</div>
			</div>
			<!---End-header---->
<form class="form-horizontal" role="form" id="patientdata" action="diseaseSave.php" method="POST">
	<div class="form-group">
		<label class="control-label col-sm-2">Symptom Name:</label>
			<div class="col-sm-4">
				 <input type="text" class="form-control" name="name" id="name" placeholder="Symptom Name">
			</div>
	 </div>
	 
	 <div class="form-group">
		<label class="control-label col-sm-2">Symptom Type:</label>
			<div class="col-sm-4">
				 <input type="text" class="form-control" name="sType" id="sType" placeholder="Symptom Type">
			</div>
	 </div>
	 
	 <div class="form-group">
			<label class="control-label col-sm-2">Question</label>
			<div class="container">
    			<div class='element col-sm-9' id='div_1'>
    			    <input type="hidden" name="totQuestion" id="totQuestion" value="1"/>
      				<textarea  class="form-control" name="question_1" id="question_1" placeholder='Enter your Question'></textarea>&nbsp;
      					<div class="containerSub_1">
      						<button id="addSub" onclick="return getQuestion('1');">Add Sub Question</button>
      						<input type='hidden' name='question_1_subquest' id='question_1_subquest' value=0>
      					</div>
      				<div class='add'>Add Question</div>
      			</div>
     		</div>
	 </div>	
	 
	 <!--<div class="form-group">
		<label class="control-label col-sm-2">Medicine:</label>
			<div class="col-sm-4">
				 <input type="text" class="form-control" name="medicine" id="medicine" placeholder="Medicine Name">
			</div>
	 </div>
	 
	 <div class="form-group">
		<label class="control-label col-sm-2">Flower:</label>
			<div class="col-sm-4">
				 <input type="text" class="form-control" name="medicine" id="medicine" placeholder="Medicine Name">
			</div>
	 </div>
	 
	 <div class="form-group">
		<label class="control-label col-sm-2">Enable Flower:</label>
			<div class="col-sm-4">
				 <input class="form-check-input" name="flowergroup" type="radio" id="flowergroup">
   			</div>
	 </div>-->
	 
	 <div class="form-group"> 
	 	<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Save</button>
		</div>
	 </div>
	 
	 														  
</form>
<script type="text/javascript">
$(document).ready(function(){

	 // Add new element
	 $(".add").click(function(){

	  // last <div> with element class id
	  var lastid = $(".element:last").attr("id");
	  var split_id = lastid.split("_"); 
	  var nextindex = Number(split_id[1]) + 1;
      var totQuestion = $("#totQuestion").val();
      var question = Number(totQuestion) + 1; 
      $("#totQuestion").val(question);

	    
	   // Adding new div container after last occurance of element class
	   $(".element:last").after("<div class='element col-sm-9' id='div_"+ nextindex +"'></div>");
	 
	   // Adding element to <div>
	   $("#div_" + nextindex).append("<label class='control-label col-sm-2'>Question</label><textarea class='form-control' placeholder='Enter your Question' name='question_"+ nextindex +"' id='question_"+ nextindex 
			   +"'></textarea>&nbsp;<span id='remove_" + nextindex + "' class='remove'>X</span><div class='containerSub_"+nextindex+"'>"
			   +"<button id='addSub' onclick='return getQuestion("+ nextindex +");'>Add Sub Question</button><input type='hidden' name='question_"+ nextindex 
			   +"_subquest' id='question_"+ nextindex +"_subquest' value=0></div>");
	 	 
	 });

	 // delete the question
	 $('.container').on('click','.remove',function(){
		  var id = this.id;
		  var split_id = id.split("_");
		  var deleteindex = split_id[1];

		  // Remove <div> with id
		  $("#div_" + deleteindex).remove();

	 });

	 
	});		
</script>
<script type="text/javascript">
function getQuestion(questionId) {
	 //alert(questionId);
	 var subLastId = $(".containerSub_"+ questionId +" > .elementsub:last").attr("id");
	 var totSubQuestion = $("#question_"+questionId+"_subquest").val();
     var subQuestion = Number(totSubQuestion) + 1; 
     $("#question_"+questionId+"_subquest").val(subQuestion);
	 //alert(subLastId);
	 if(typeof subLastId != "undefined") {
		  //alert("Inside first If:"+questionId)
          var subSplit_id = subLastId.split("_"); 
		  var nextsubindex = Number(subSplit_id[1]) + 1;
		  $(".containerSub_"+ questionId +" > .elementsub:last").after("<div class='elementsub col-sm-9' id='divsub_"+ nextsubindex +"'></div>");
	      $("#divsub_"+nextsubindex).append("<textarea placeholder='Enter your sub Question' name='questionsub_"+ questionId +"_"+nextsubindex+"' class='form-control'></textarea>&nbsp;<span id='removesub_" 
	    	      + questionId + "_1' class='removesub' onclick='return removeSub("+questionId+","+nextsubindex+");'>X</span><div class='form-group'><label class='control-label col-sm-2'>Medicine:</label><div class='col-sm-4'>"
				  +"<input type='text' class='form-control' name='quest_"+questionId+"_medicine_"+nextsubindex+"' id='quest_"+questionId+"_medicine_"+nextsubindex+"' placeholder='Medicine Name'></div>"
				  +"</div><div class='form-group'><label class='control-label col-sm-2'>Flower:</label><div class='col-sm-4'><input type='text' class='form-control'"
				  +"name='quest_"+questionId+"_flower_"+nextsubindex+"' id='quest_"+questionId+"_flower_"+nextsubindex+"' placeholder='Medicine Name'></div></div>"
				  +"<div class='form-group'><label class='control-label col-sm-2'>Medicine Duration:</label><div class='col-sm-4'>"
				  +"<input type='text' class='form-control' name='quest_"+questionId+"_medDuration_"+nextsubindex+"' id='quest_"+questionId+"_medDuration_"+nextsubindex+"' placeholder='Medicine Duration'></div>"
				  +"</div><div class='form-group'><label class='control-label col-sm-2'>Enable Flower:</label><div class='col-sm-4'>"
				  +"<input class='form-check-input' name='quest_"+questionId+"_flowerGroup_"+nextsubindex+"' type='radio' id='quest_"+questionId+"_flowerGroup_"+nextsubindex+"'></div></div>");
		 
	 } else {
		 var nextsubindex = 1;
		 //alert("Inside first else:"+questionId);
		 $(".containerSub_"+questionId).append("<div class='elementsub col-sm-9' id='divsub_1'></div>");
		 $(".containerSub_"+questionId +" > #divsub_1").append("<textarea class='form-control' placeholder='Enter your sub question' name='questionsub_"+ questionId +"_1' id='questionsub_"+ questionId 
				   +"_1'></textarea>&nbsp;<span id='removesub_" + questionId + "_1' class='removesub' onclick='return removeSub("+questionId+","+nextsubindex+");'>X</span><div class='form-group'><label class='control-label col-sm-2'>Medicine:</label><div class='col-sm-4'>"
					  +"<input type='text' class='form-control' name='quest_"+questionId+"_medicine_1' id='quest_"+questionId+"_medicine_1' placeholder='Medicine Name'></div>"
					  +"</div><div class='form-group'><label class='control-label col-sm-2'>Flower:</label><div class='col-sm-4'><input type='text' class='form-control'"
					  +"name='quest_"+questionId+"_flower_1' id='quest_"+questionId+"_flower_1' placeholder='Medicine Name'></div></div>"
					  +"<div class='form-group'><label class='control-label col-sm-2'>Medicine Duration:</label><div class='col-sm-4'>"
					  +"<input type='text' class='form-control' name='quest_"+questionId+"_medDuration_1' id='quest_"+questionId+"_medDuration_1' placeholder='Medicine Duration'></div>"
					  +"</div><div class='form-group'><label class='control-label col-sm-2'>Enable Flower:</label><div class='col-sm-4'>"
					  +"<input class='form-check-input' name='quest_"+questionId+"_flowerGroup_1' type='radio' id='quest_"+questionId+"_flowerGroup_1'></div></div>");
	 }
	 
	 return false;
}	 

/*public function removeSubQuest(questionId) {
	alert(questionId);
	return false;
}*/
</script>
<script type="text/javascript">
 function removeSub(questionId,nextsubindex) {
	 $(".containerSub_"+questionId+" > #divsub_"+ nextsubindex).remove();
		
	} 
</script>
    <?php    
    include "footer.php";
?>