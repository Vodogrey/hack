<?php

include ("blocks/db.php");
$cipher = $_GET['cipher'];
$result = mysql_query("SELECT * FROM books WHERE cipher = '$cipher'");
$myrow = mysql_fetch_array ($result);
$r = mysql_query ("SELECT COUNT('number') AS numb FROM instances WHERE cipherbook = '$cipher' AND strgplace = '0' GROUP BY cipherbook");
$m = mysql_fetch_array ($r);
$count0 = $m['numb'];
$r = mysql_query ("SELECT COUNT('number') AS numb FROM instances WHERE cipherbook = '$cipher' AND strgplace = '1' GROUP BY cipherbook");
$m = mysql_fetch_array ($r);
$count1 = $m['numb'];
$r = mysql_query ("SELECT COUNT('number') AS numb FROM instances WHERE cipherbook = '$cipher' AND strgplace = '2' GROUP BY cipherbook");
$m = mysql_fetch_array ($r);
$count2 = $m['numb'];

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
            
              <?php do{ printf ("<tr><td height='124' class='lesson'>
			  						<p class='lesson_name'>Шифр: %s</p>
              						<p class='lesson_adds'>Авторы: %s</p>
              						<p class='lesson_adds'>Название: %s</p>
									<p class='lesson_adds'>Место публикации: %s</p>
									<p class='lesson_adds'>Количество страниц: %s</p>
									<p class='lesson_adds'>Год публикации: %s</p>
									<p class='lesson_adds'>УДК: %s</p>
									<p class='lesson_adds'>В читальном зале: %s</p>
									<p class='lesson_adds'>На абонементе: %s</p>
									<p class='lesson_adds'>На руках: %s</p>
									<p><a href='exemplars.php?cipher=%s'>Выдать книгу</a></p>
									</td> </tr>", $myrow['cipher'],
											      $myrow['authors'],
												  $myrow['name'],
												  $myrow['placepublic'],
												  $myrow['pagenumber'],
												  $myrow['publicdate'],
												  $myrow['udk'],
												  $count0,
												  $count1,
												  $count2,
												  $myrow['cipher']);																	
			          } while ($myrow = mysql_fetch_array ($result)); ?>
            
          </table> 
          
        </tr>
    </table></td>
  </tr>
  <?php include ("blocks/footer.php"); ?><!-- Нижняя часть -->
</table>
</body>
</html>