<?php
error_reporting(0);
session_start();
	if(isset($_SESSION["user_id"])){
		$user_id = $_SESSION["user_id"];
		
	}
	else{
		header('Location:index.php');
	}
	
	$expireAfter = 10;
	
	//Check to see if our "last action" session
	//variable has been set.
	if(isset($_SESSION['last_action'])){
	    
	    //Figure out how many seconds have passed
	    //since the user was last active.
	    $secondsInactive = time() - $_SESSION['last_action'];
	    
	    //Convert our minutes into seconds.
	    $expireAfterSeconds = $expireAfter * 60;
	    
	    //Check to see if they have been inactive for too long.
	    if($secondsInactive >= $expireAfterSeconds){
	        //User has been inactive for too long.
	        //Kill their session.
	        session_unset();
	        session_destroy();
	    }
	    
	
	
	}
	$_SESSION['last_action'] = time();
?>