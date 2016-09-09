<?php

include ("blocks/db.php");
$librarycard = $_GET['librarycard'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Удаление</title>
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
            
              <?php
			  		$result = mysql_query ("SELECT id FROM subscription WHERE librarycard = '$librarycard' AND 
					                                                          returning = '0'");
					$myrow = mysql_fetch_array ($result);
					if ($myrow['id'] == '')
					{
						$result = mysql_query ("DELETE FROM readers WHERE librarycard = '$librarycard'");
						if ($result)
						{
							echo "<p>Читатель был успешно удален.</p>";
						}
						else
						{
							echo "<p>Ошибка, код 1</p>";
						}
					}
					else
					{
						echo "<p>На руках у читателя имеются книги. Пожалуйста, сначала приймите все книги у читателя.</p>";
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