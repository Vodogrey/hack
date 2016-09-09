<?php
include ("LOCK.php");
include ("blocks/db.php");
$cipher = $_GET['cipher'];
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
			  	mysql_query ("BEGIN WORK");
				$result = mysql_query ("SELECT * FROM instances WHERE (cipherbook = '$cipher' AND strgplace = '2')");
				$myrow = mysql_fetch_array ($result);
				if ($myrow ['number']!='')
				{
					echo "<p>Имеются экземпляры на руках читателей. Пожалуйста, дождитесь принятия всех книг.</p>";
					mysql_query ("ROLLBACK WORK");
				}
				else
				{
					$result = mysql_query ("DELETE FROM instances WHERE cipherbook = '$cipher'");
					$result2 = mysql_query ("DELETE FROM books WHERE cipher = '$cipher'");
					if ($result && $result2)
					{
						echo "Удаление прошло успешно.";
						mysql_query ("COMMIT WORK");
					}
					else
					{
						echo "Что-то пошло не так.";
						mysql_query ("ROLLBACK WORK");
					}
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