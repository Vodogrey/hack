<?php

include ("blocks/db.php");
$cipher = $_GET['cipher'];
$result = mysql_query("SELECT number, place, lastdate FROM (SELECT * FROM instances WHERE cipherbook = '$cipher' and strgplace = '1') tbl1 INNER JOIN strgplace s ON tbl1.strgplace = s.code");
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
									<p><a href='issue_book.php?number=%s'>Выдать книгу</a></p>
									</td> </tr>", 
																					  $myrow['number'],
									                                                  $myrow['place'],
																					  $myrow['lastdate'],
																					  $myrow['number']);
			          } while ($myrow = mysql_fetch_array ($result)); 
			  } 
			  else 
			  {
				  	echo "<tr><td>В данный момент свободных экземпляров этой книги нет.</td></tr>";
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