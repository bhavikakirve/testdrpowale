<?php
include "config/connect.php";
$name = $_REQUEST['name'];
$contactno = $_REQUEST['contactno'];
$role = $_REQUEST['role'];
$status = $_REQUEST['status'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$branch = $_REQUEST['branch'];
//$action = $_REQUEST['action'];
$userId = (isset($_REQUEST['userId'])) ? $_REQUEST['userId'] : '';

if($userId != "") {
    $adduser = mysql_query("update users set name='".$name."', role='".$role."',contact_no='".$contactno."',status='".$status."', branch_code='".$branch."' where user_id='".$userId."'");
} else {
    $adduser = mysql_query("insert into users(name, role, contact_no, username, password, status , branch_code) values ('".$name."','".$role."','".$contactno."','".$username."','".md5($password)."',$status, '".$branch."')");
}


if($adduser){
	header	("Location:users.php?s=y");
}else{
	//echo "insert into users(name, role, contact_no, username, password, status , branch_code) values ('".$name."','".$role."','".$contactno."','".$username."','".md5($password)."',$status, '".$branch."')";
	header ("Location:adduser.php?s=n");	
}
?>