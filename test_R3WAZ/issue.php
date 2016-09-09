<?php

include ("blocks/db.php");
$librarycard = $_POST['librarycard']; if ($librarycard == '') unset($librarycard);
$returndate = $_POST['returndate']; if ($returndate == '') unset($returndate);
$number = $_POST['number'];
$issuedate = date ('Y-m-d');

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Выдача</title>
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
		 	if (isset($librarycard) && isset($returndate)) //Проверка существования переменных
		 	{
				$result = mysql_query ("SELECT librarycard FROM readers WHERE librarycard = '$librarycard'");
				$myrow = mysql_fetch_array($result);
				if ($myrow['librarycard']!='')
				{
			    	mysql_query ("BEGIN WORK");
				
					$result = mysql_query ("INSERT INTO subscription (issuedate, returndate, librarycard, numberbook)
			    		          			VALUES ('$issuedate', '$returndate', '$librarycard', '$number')");
					if ($result == true)
					{
						$result = mysql_query ("UPDATE instances SET strgplace = '2', lastdate = '$issuedate'
												WHERE number = '$number'");
						if ($result == true)
						{
							mysql_query ("COMMIT WORK");
							echo "<p>Всё прошло успешно</p>";
						}
						else
						{
							mysql_query ("ROLLBACK WORK");
							echo "<p>Ошибка</p>";
						}
					}
					else
					{
						mysql_query ("ROLLBACK WORK");
						echo "<p>Ошибка</p>";
					}
				}
				else
				{
					echo "<p>Читатель с таким номером не зарегистрирован.</p>";
				}
					
	     	}
		 	else 
		 	{ 
			 	echo "<p>Вы ввели не всю информацию.</p>";
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