<?php

include ("blocks/db.php");
$result = mysql_query("SELECT * FROM subscription");
$myrow = mysql_fetch_array ($result);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Найденные книги:</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color: #FFFFFF;">
<table width="690" border="1" align="center" class="main_border">
  <?php include ("blocks/header.php"); ?> <!-- Шапка сайта -->
  <tr>
    <td>
      <table width="690" border="1">
        <tr> <?php include ("blocks/lefttd.php"); ?> <!--Левый блок-->
          <td width="500" valign="top" bgcolor="#FFFFFF" >
            <table width="100%" border="1" >
              <tr>
                <td width="14%" style="text-align: center">Номер билета</td>
                <td width="24%" style="text-align: center">Инвентарный номер</td>
                <td width="21%" style="text-align: center">Дата выдачи</td>
                <td width="22%" style="text-align: center">Дата возврата</td>
                <td width="19%" style="text-align: center">Возвращена да/нет</td>
              </tr>
              <?php
			  	do{
					if ($myrow['returning'] == 0) {$returning = 'Нет';} else {$returning = 'Да';}
              		printf ("<tr>
                			 <td>%s</td>
                			 <td>%s</td>
                			 <td>%s</td>
                			 <td>%s</td>
                			 <td>%s</td>
              				 </tr>", $myrow['librarycard'], $myrow['numberbook'], $myrow['issuedate'],
							         $myrow['returndate'], $returning);
				} while ($myrow = mysql_fetch_array ($result));
				?>
          </table></td>
          
        </tr>
    </table></td>
  </tr>
  <?php include ("blocks/footer.php"); ?><!-- Нижняя часть -->
</table>
</body>
</html>