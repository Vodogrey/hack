<?php

include ("blocks/db.php");
$today = date ('Y-m-d');
$td = $today - '0004-00-00';
$result = mysql_query("SELECT i.number, i.strgplace, i.lastdate, b.name, b.authors FROM instances i INNER JOIN books b ON b.cipher = i.cipherbook WHERE i.lastdate < '$td'");
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
          <td width="500" valign="top" bgcolor="#FFFFFF" ><table width="81%" height="130" border="1" align="left" class="lesson">
            
              <?php if ($myrow['number'] !='')
			  {
				   do{ printf ("<tr><td height='124' class='lesson'>
			  						<p class='lesson_name'>Инв. номер: %s<p>
              						<p class='lesson_adds'>Место хранения: %s</p>
              						<p class='lesson_adds'>Последнее обращение: %s</p>
									<p class='lesson_adds'>Название: %s</p>
									<p class='lesson_adds'>Авторы: %s</p>
									
									</td> </tr>", 
																					  $myrow['number'],
									                                                  $myrow['strgplace'],
																					  $myrow['lastdate'],
																					  
																					  $myrow['name'],
																					  $myrow['authors']);
			          } while ($myrow = mysql_fetch_array ($result)); 
			  } 
			  else 
			  {
				  	echo "<tr><td>Нет непопулярных книг на данный момент.</td></tr>";
			  }
                      ?>
            
          </table> 
          
        </tr>
    </table></td>
  </tr>
  <?php include ("blocks/footer.php"); ?><!-- Нижняя часть -->
</table>
</body>
</html>