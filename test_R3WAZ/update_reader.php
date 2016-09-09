<?php

include ("blocks/db.php");
$fullname = $_POST['fullname']; if ($fullname == '') unset($fullname);
$pasport = $_POST['pasport']; if ($pasport == '') unset($pasport);
$librarycard = $_POST['librarycard']; if ($librarycard == '') unset($librarycard);
if (isset ($_POST['indebted']))
{
	$indebted = 1;
}
else
{
	$indebted = 0;
}
echo $indebted;
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Редактирование информации о книге</title>
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
		 if (isset($librarycard) && isset($pasport) && isset($fullname)) //Проверка существования переменных
		 {
			
			$result = mysql_query ("UPDATE readers
			              SET fullname = '$fullname', pasport = '$pasport', indebted = '$indebted' 						  
						  WHERE librarycard = '$librarycard'");
			if ($result == true)
			{
				echo "<p>Информация успешно обновлена.</p>";
			}
			else
			{
				echo "<p>Информация не была обновлена!</p>";
			}
						   
			 
	     }
		 else 
		 { 
			 echo "<p>Вы ввели не всю информацию. Информация не может быть обновлена.</p>";
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