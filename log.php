<?php

include ('db_data.php');
include ('function.php');
$callsignid = 242;
$result = last_N(242,3);


?>
<table border=1>
<?php
$myrow = mysql_fetch_array($result);
printf('<tr><td><h4>Band</h4></td>
			<td><h4>Mod</h4>e</td>
			<td><h4>Time</h4></td>
			<td><h4>QsS</h4></td>
			<td><h4>Call</h4></td>
			<td><h4>RSTout</h4></td>
			<td><h4>RSTin</h4></td>
			<td><h4>NRin</h4></td><tr>');
do{
	printf('<tr>
			<td><h4>%s</h4></td>
			<td><h4>%s</h4></td>
			<td><h4>%s</h4></td>
			<td><h4>%s</h4></td>
			<td><h4>%s</h4></td>
			<td><h4>%s</h4></td>
			<td><h4>%s</h4></td>
			<td><h4>%s</h4></td>
			</tr>', $myrow['BAND_BANDS'],$myrow['NAME_MODS'],$myrow['dateq'],$myrow['NROUT_QSOS'],
					$myrow['call_in'],$myrow['RST_OUT_QSOS'],$myrow['RSTIN_QSOS'],$myrow['NRIN_QSOS']);
} while ($myrow = mysql_fetch_array($result));			


?>
</table>