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
$questions = mysql_query("select * from questions q, symtoms s where q.symtom_id= s.symtom_id and symtom like ".$value." and parent_qid = 0");
//echo "select * from questions q, symtoms s where q.symtom_id= s.symtom_id and symtom in (".$symtoms.") and parent_qid = 0";
//$questions = mysql_query("select * from questions");
if(mysql_num_rows($questions)>0){
?>
<div class="form-group">
<div class="col-sm-8"> 
<label class="control-label col-sm-4" for="symtom"><?php echo trim($value,"'"); ?> </label>
<?php
$sim = "";
$i = 1;
while($row = mysql_fetch_array($questions)){
	if($i != 1){
		echo '<label class="control-label col-sm-4" for="symtom">&nbsp;</label>';
	}	
	?>	
	<div class="radio ">
	  <label><input type="radio" name="<?php echo trim($value,"'"); ?>" onclick="qtnclicked(this.value);" value="<?php echo $row['question_id']; ?>"><?php echo $row['question']; ?></label>
	</div>	
<?php
		$i++;
}
	?>
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
	<div class="col-sm-4">
	<ol>
	<?php
		$i =1;
	foreach($reversedqtnarr as $k => $va){
		//echo $va."<br/>";
		if($va != 'undefined'){
			$q = mysql_query("select medicine from questions where question_id =".$va);			
			while($a = mysql_fetch_array($q)){
				echo "<li><b>".$i.")  ".$a['medicine']."</b></li>";				
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
	$checksubqtns = mysql_query("select * from questions where question_id = '".$qid."'");
	if(mysql_num_rows($checksubqtns)>0){
		
	}else{
		echo "NA";
	}
}
?>
