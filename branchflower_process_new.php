<?php
include "config/connect.php";
$branch = $_REQUEST['branchCode'];
foreach($_POST['Flower'] as $key=> $value) {
    mysql_query("Update `ed_branch_flower` set `patient_count` = '0' where `branch_code`='$branch' and `flower_name`='$value'");
}
header('location:branchFlower_new.php?branch='.$branch);

