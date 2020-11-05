<?php
include("../sessions.php"); 
include "../config/connect.php";

?>
<html>
	<head>
		<title>
		</title>
	</head>
	<body>
	<?php
	$getmedicineData = mysql_query("SELECT epm.patient_id, pd.patient_name, epm.ep_medicine, epd.charges,epm.flower,epd.ed_id
FROM patient_details pd INNER JOIN ed_patient_diagnosis epd ON pd.pid = epd.pid INNER JOIN ed_patient_medicine epm ON epd.ed_id = epm.ed_id
WHERE epd.branch_id = '1' AND DATE( epd.created_on ) = '2020-10-19'");
	?>
	</body>
	<table border="1">
		<tr>
			<th>
				Patient Name
			</th>
			<th>
				Medicine Name
			</th>
			<th>
				Charges
			</th>
		<tr>
		<?php 
		 while($row = mysql_fetch_array($getmedicineData)) {
        ?>
		<tr>
			<td><?= $row['patient_name']?></td>
			<td><?= $row['ep_medicine']?></td>
			<td><?= $row['charges']?></td>
		</tr>
		<?php
		}
		?>
	</table>
</html>



	