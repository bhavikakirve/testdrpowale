<?php
require_once "../config/connect.php";
$type = $_REQUEST['type'];
if($type == 'symtom'){
$symtoms = $_REQUEST['symtoms'];
 $symtoms = rtrim($symtoms,',');
$symtomarr = explode(",",$symtoms);
$reversedarr = array_reverse($symtomarr);
//print_r($reversedarr);
foreach($reversedarr as $key=> $value){
	//echo $value;
	$value = str_ireplace(' (Acute)','', $value);
	$value = str_ireplace(' (Chronic)','', $value);
$questions = mysql_query("select q.question_id, q.symtom_id,q.question from questions q, symtoms s where q.symtom_id = s.symtom_id and (symtom like ".$value." )  and parent_qid = 0");
//echo "select q.question_id, q.symtom_id,q.question from questions q, symtoms s where q.symtom_id = s.symtom_id and (symtom like ".$value.")  and parent_qid = 0";
//$questions = mysql_query("select * from questions");
if(mysql_num_rows($questions)>0){
?>
<div class="form-group">
<div class="col-sm-8"> 
<label class="control-label col-sm-4" for="symtom"><?php echo trim($value,"'"); ?> </label>
<?php
$sim = "";
$i = 1;
$symptom_val = "";
while($row = mysql_fetch_array($questions)){
	if($i != 1){
		echo '<label class="control-label col-sm-4" for="symtom">&nbsp;</label>';
	}	
	$symtomid = $row['symtom_id'];
	$symptom_val = $row['symtom_id'];
	?>	
	<div class="radio col-sm-8 sym_<?php echo $symtomid; ?>" id="qtn_<?php echo $row['question_id']; ?>">
	  <label><input type="radio" name="cd_<?php echo trim($row['symtom_id'],"'"); ?>" onclick="qtnclicked(this.value, <?php echo $symtomid; ?>);" class="req_question" id="<?php echo $row['question']; ?>" value="<?php echo $row['question_id']; ?>"><?php echo $row['question']; ?></label>
	  <div>
	  <label class="control-label col-sm-1">&nbsp;</label>
	  	   <div class="subqtn col-sm-7 subqtn_of<?php echo $row['question_id']; ?>" >
	  	  </div>
	  </div>
	</div>
	
<?php
		$i++;
}
	?>
	<div id="cd_<?php echo trim($symptom_val,"'"); ?>_validate"></div>	
	</div>
</div>
	<?php
}
}
}
else if($type == 'qtn'){
	$qtnid = $_REQUEST['qtns'];
	$qtnid = rtrim($qtnid,",");
	//echo "qtn =".$qtnid;
	$qtnarr = explode(",",$qtnid);
	$reversedqtnarr = array_reverse($qtnarr);
//print_r ($reversedqtnarr);
	?>
	<div class="form-group">
	<div class="col-sm-8"> 
	<div class="col-sm-3">
	&nbsp;
	</div>
	<div class="col-sm-6">
	<ol>
	<?php
		$i =1;
	foreach($reversedqtnarr as $k => $va){
		//echo $va."<br/>";
		if($va != 'undefined'){
			$q = mysql_query("select medicine,medicine_duration, failure, flower, flower_flag from questions where question_id =".$va);			
			while($a = mysql_fetch_array($q)){
				echo "<li><b>".$i.")  ".$a['medicine']."</b>";
				if($a['flower_flag']=='Y'){
					echo " ".$a['flower'];
				}
				if(strlen($a['medicine_duration'])!=0){
					echo"   (Duration: ".$a['medicine_duration'].")";
				}
				if(strlen($a['failure'])!=0){
					echo "   (If Fails: ".$a['failure'].")";
				}
				echo "</li>";				
			}
			$i++;
		}
		
	}
	?>
	</ol>
	</div>
	</div>
	</div>
	<?php
}
if($type == 'subqtn'){
	$qid = $_REQUEST['qid'];
	$question = "";
	$checksubqtns = mysql_query("select question_id, question, symtom, s.symtom_id from questions q, symtoms s where q.symtom_id = s.symtom_id and q.question_id = '".$qid."'");
		while($r3 = mysql_fetch_array($checksubqtns)){
			$question = $r3['question'];
			$symtom = $r3['symtom'];
			$symtomid = $r3['symtom_id'];
		}

		$getsubqtn = mysql_query("select * from questions where parent_qid = '".$qid."'");
			if(mysql_num_rows($getsubqtn)>0){

				while($r4 = mysql_fetch_array($getsubqtn)){
					?>
					<div class="radio " id="qtn_<?php echo $r4['question_id']; ?>">
					  <label><input type="radio" name="md_<?php echo $symtomid; ?>"  onclick="qtnclicked(this.value);" value="<?php echo $r4['question_id']; ?>" class="req_class_subquest"><?php echo $r4['question']; ?></label>
					</div>	
					<?php
				}
				?>
				<div id="md_<?php echo $symtomid; ?>_validate"> </div>
		<?php 		
			}
		else{
			echo "NA";
		}
		
		
}
if($type == 'checksubqtn'){
	$qid = $_REQUEST['qid'];
	$getsubqtn = mysql_query("select * from questions where parent_qid = '".$qid."'");
	//echo "select * from questions where parent_qid = '".$qid."'";
	//echo mysql_num_rows($getsubqtn);
			if(mysql_num_rows($getsubqtn)>0){
				echo "Y";
			}
			else{
				echo "NA";
			}

}
if($type == 'checkparent'){
	$qid = $_REQUEST['qid'];
	$getparent = mysql_query("select * from questions where question_id = '".$qid."' and parent_qid !=0");
		if(mysql_num_rows($getparent)>0){
				echo "Y";
			}
			else{
				echo "NA";
			}
}
?>