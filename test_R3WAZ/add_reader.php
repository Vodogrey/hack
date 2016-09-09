<?php

include ("blocks/db.php");
$login = $_POST['login']; if ($login == '') unset($login);
$password = $_POST['password']; if ($password == '') unset($password);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Регистрация</title>
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
		 	if (isset($login) && isset($password) ) //Проверка существования переменных
		 	{
			
				$result = mysql_query ("INSERT INTO USERS (ID_USERS, LOGIN_USERS, PASSWORD_USERS)
			    	          			VALUES (4, '$login', '$password')");
				if ($result == true)
				{
					echo "<p>Регистрация прошла успешно.</p>";
				}
				else
				{
					echo "<p>Что-то пошло не так.</p>";
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