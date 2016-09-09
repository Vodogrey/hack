<?php

include ("blocks/db.php");
$librarycard = $_GET['librarycard'];
$result = mysql_query("SELECT * FROM readers WHERE librarycard = '$librarycard'");
$myrow = mysql_fetch_array ($result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Редактирование данных</title>
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
print <<<HERE
<form name="form1" method="post" action="update_reader.php">
          	<p>
            	<label for="fullname">Введите полное имя</label>
            	<br>
<input value="$myrow[fullname]" name="fullname" type="text" id="fullname" title="fullname">
          	</p>
          	<p>
          	  <label for="name">Введите паспортные данные:</label>
          	  <br>
<input value="$myrow[pasport]" type="text" name="pasport" id="pasport">
          	</p>
			<input type="hidden" name="librarycard" value="$myrow[librarycard]">
			<p>
			<input name="indebted" type="checkbox" id="indebted" >
          <label for="checkbox">Задолженность </label>
		  </p>  
          	<p>
          	  <input name="submit" type="submit" id="submit"  value="Сохранить изменения">
          	  <br>
        	  </p>
			
          	
HERE;
?>          
          
          
        </tr>
    </table></td>
  </tr>
  <?php include ("blocks/footer.php"); ?><!-- Нижняя часть -->
</table>
</body>
</html>