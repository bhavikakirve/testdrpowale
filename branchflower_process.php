<?php
include "config/connect.php";
$branch = $_REQUEST['branch'];

$query = mysql_query("SELECT b.branch, ebf.flower_name, b.branch_code, ebf.patient_count FROM `ed_branch_flower` AS ebf INNER JOIN branches AS b WHERE b.branch_code LIKE  '".$branch."%' AND ebf.branch_code = b.branch_code");

if(!empty($query)) {
$dataTable ="<table id='datatable' class='display' cellspacing='0' width='80%'><thead><tr>";
$dataTable.="<th>Sr. No.</th><th>Branch Name</th><th>Flower Name</th><th>People Used</th></tr></thead><tbody>";
$i=1;

while($row = mysql_fetch_array($query)){
    $dataTable.="<tr><td>".$i."</td><td>";
    $dataTable.="<td>".$row['branch']."</td>";
    $dataTable.= "<td>".$row['flower_name']."</td>";
    $dataTable.= "<td>".$row['patient_count']."</td><tr/>";
    $i++;
}

return $dataTable;

} else {
    $dataTable ="<table id='datatable' class='display' cellspacing='0' width='80%'><tr>No Records Found</tr></table>";
    return $dataTable;
}
