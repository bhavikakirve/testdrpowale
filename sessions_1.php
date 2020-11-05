<?php
//if(!session_id()) {
session_start();
print_r($_SESSION);
	if(isset($_SESSION["user_id"])){
		$user_id = $_SESSION["user_id"];
	}
	else{
		header('Location:index.php');
	}
/*}
else{
	header('Location:index.php');
}*/
?>