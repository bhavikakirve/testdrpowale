<?php
include("sessions.php");
include "config/connect.php";
$branches = mysql_query("select * from branches");
while($row = mysql_fetch_array($branches)){
    for($i=51;$i<=100;$i++) {
        mysql_query("insert into ed_branch_flower (branch_code ,flower_name ,patient_count) values ('".$row['branch_code']."','Flower ".$i."','0')");
    }
    
}