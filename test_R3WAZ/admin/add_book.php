<?php
include ("LOCK.php");
include ("blocks/db.php");
$cipher = $_POST['cipher']; if ($cipher == '') unset($cipher);
$authors = $_POST['authors']; if ($authors == '') unset($authors);
$name = $_POST['name']; if ($name == '') unset($name);
$placepublic = $_POST['placepublic']; if ($placepublic == '') unset($placepublic);
$pagenumber = $_POST['pagenumber']; if ($pagenumber == '') unset($pagenumber);
$publicdate = $_POST['publicdate']; if ($publicdate == '') unset($publicdate);
$udk = $_POST['udk']; 

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
		 if (isset($cipher) && isset($authors) && isset($name) && isset($placepublic)
		                   && isset($pagenumber) && isset ($publicdate)) //Проверка существования переменных
		 {
			
			$result = mysql_query ("INSERT INTO books (cipher, authors, name, placepublic, pagenumber, publicdate, udk)
			              VALUES ('$cipher', '$authors', '$name', '$placepublic', '$pagenumber', '$publicdate', '$udk')");
			if ($result == true)
			{
				echo "<p>Книга успешно добавлена</p>";
			}
			else
			{
				echo "<p>Книга не была добавлена!</p>";
				
			}
						   
			 
	     }
		 else 
		 { 
			 echo "<p>Вы ввели не всю информацию. Книга не может быть добавлена.</p>";
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