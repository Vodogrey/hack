<?php

include ('db_data.php');
include ('function.php');
$callsignid = 242;
$result = last_N(242,3);


?>
<table border=1>
<?php
$myrow = mysql_fetch_array($result);
printf('<tr><td>Band</td>
			<td>Mode</td>
			<td>Time</td>
			<td>QsS</td>
			<td>Call</td>
			<td>RSTout</td>
			<td>RSTin</td>
			<td>NRin</td><tr>');
do{
	printf('<tr>
			<td>%s</td>
			<td>%s</td>
			<td>%s</td>
			<td>%s</td>
			<td>%s</td>
			<td>%s</td>
			<td>%s</td>
			<td>%s</td>
			</tr>', $myrow['BAND_BANDS'],$myrow['NAME_MODS'],$myrow['dateq'],$myrow['NROUT_QSOS'],
					$myrow['call_in'],$myrow['RST_OUT_QSOS'],$myrow['RSTIN_QSOS'],$myrow['NRIN_QSOS']);
} while ($myrow = mysql_fetch_array($result));			


?>
</table>