<?php
include ("LOCK.php");
include ("blocks/db.php");
$cipher = $_GET['cipher'];
$strgplace = $_GET['strgplace'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Добавление книги</title>
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
         <?php
		 
			
			$result = mysql_query ("INSERT INTO instances (strgplace, cipherbook) VALUES ($strgplace, $cipher)");
			if ($result == true)
			{
				echo "<p>Экземпляр успешно добавлен</p>";
			}
			else
			{
				echo "<p>Экземпляр не был добавлен!</p>";
			}
						   
			 
	     
							   
		 
		 ?>
          
          
          </td>
        </tr>
    </table></td>
  </tr>
  <?php include ("blocks/footer.php"); ?><!-- Нижняя часть -->
</table>
</body>
</html>