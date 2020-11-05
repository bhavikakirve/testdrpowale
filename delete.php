<?php
include "config/connect.php";
if($_GET['type'] == "u") {
   $tbl="users";
   $field_name = "user_id";
} else if($_GET['type'] == "b"){
    $tbl="branches";
    $field_name = "branch_id";
} else  if($_GET['type'] == "subq"){
    $tbl="questions";
    $field_name = "question_id";
}
$id= $_GET ['id'];
$sql="DELETE FROM $tbl WHERE  $field_name = '$id'";
$result = mysql_query($sql);

if($result){
    if($_GET['type'] == "u") {
        header('location: users.php');
    } else if($_GET['type'] == "b") {
        header('location: branch.php');
    } else if($_GET['type'] == "subq") {
        header('location: diseases.php');
    }
}