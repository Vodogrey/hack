<?php

include ("blocks/db.php");
$numberbook = $_POST['numberbook']; if ($numberbook == '') unset($numberbook);
$real_returndate = date ('Y-m-d');

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
		 	if (isset($numberbook)) //Проверка существования переменных
		 	{
				$result = mysql_query("SELECT * FROM subscription WHERE numberbook = '$numberbook' AND returning = '0'");
				$myrow = mysql_fetch_array($result);
				if ($myrow['id']!='')
				{
			    	mysql_query ("BEGIN WORK");
					$returndate = $myrow['returndate'];
					$librarycard = $myrow['librarycard'];
					$id = $myrow ['id'];
					if ($returndate < $real_returndate)
					{
						$result = mysql_query ("UPDATE readers SET indebted = '1' WHERE librarycard = '$librarycard'");
					}
					else
					{
						$result = true;
					}
					
					if ($result == true)
					{
						
						$result = mysql_query ("UPDATE subscription SET returndate = '$real_returndate', 
																		returning = '1'
												WHERE id = '$id'");
						$result2 = mysql_query ("UPDATE instances SET strgplace = '1' WHERE number = '$numberbook'");						
						if ($result == true && $result2 == true)
						{
							mysql_query ("COMMIT WORK");
							echo "<p>Всё прошло успешно</p>";
						}
						else
						{
							mysql_query ("ROLLBACK WORK");
							echo "<p>Ошибка2, код 2</p>";
						}
					}
					else
					{
						mysql_query ("ROLLBACK WORK");
						echo "<p>Ошибка, код 1</p>";
					}
				}
				else
				{
					echo "<p>Книга уже находится в библиотеке или не существует. 
					         Проверьте правильность введенной информации</p>";
				}
					
	     	}
		 	else 
		 	{ 
			 	echo "<p>Вы не ввели номер книги.</p>";
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