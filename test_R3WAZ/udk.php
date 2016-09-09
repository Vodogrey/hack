<?php

include ("blocks/db.php");
if (isset ($_GET['parent']))
{
	$parent = $_GET['parent'];
}
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
            
              <?php 
			  	if (isset($parent))
				{
					$result = mysql_query ("SELECT * FROM udk WHERE parent = '$parent'");
					$myrow = mysql_fetch_array ($result);
					echo "<p>Выберите подкатегорию:</p>";
					do
					{
						printf ("<p><a href = 'udk.php?parent=%s'>%s</a></p>", $myrow['category'], $myrow['name']);
					} while ($myrow = mysql_fetch_array ($result));
					echo "<p>Выберите книгу:</p>";
					$result = mysql_query ("SELECT cipher, authors, name FROM books WHERE udk = '$parent'");
					$myrow = mysql_fetch_array ($result);
					do{ printf ("<tr><td height='124' class='lesson'>
			  						<p class='lesson_name'>Шифр: <a href='view_book.php?cipher=%s'>%s</a> 
              						<p class='lesson_adds'>Авторы: %s</p>
              						<p class='lesson_adds'>Название: %s</p></td> </tr>", $myrow['cipher'],
									                                                  $myrow['cipher'],
																					  $myrow['authors'],
																					  $myrow['name']);
			          } while ($myrow = mysql_fetch_array ($result)); 
				} 
				else
				{
					$result = mysql_query ("SELECT * FROM udk WHERE parent IS NULL");
					$myrow = mysql_fetch_array ($result);
					echo "<p>Выберите категорию:</p>";
					do
					{
						printf ("<p><a href = 'udk.php?parent=%s'>%s</a></p>", $myrow['category'], $myrow['name']);
					} while ($myrow = mysql_fetch_array ($result));
					echo "<p>Выберите книгу:</p>";
					$result = mysql_query ("SELECT cipher, authors, name FROM books WHERE udk IS NULL OR udk =''");
					$myrow = mysql_fetch_array ($result);
					do{ printf ("<tr><td height='124' class='lesson'>
			  						<p class='lesson_name'>Шифр: <a href='view_book.php?cipher=%s'>%s</a> 
              						<p class='lesson_adds'>Авторы: %s</p>
              						<p class='lesson_adds'>Название: %s</p></td> </tr>", $myrow['cipher'],
									                                                  $myrow['cipher'],
																					  $myrow['authors'],
																					  $myrow['name']);
			          } while ($myrow = mysql_fetch_array ($result)); 
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