<?php
include ("LOCK.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Поиск книг</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color: #FFFFFF;">
<table width="690" border="1" align="center" class="main_border">
  <?php include ("blocks/header.php"); ?> <!-- Шапка сайта -->
  <tr>
    <td>
      <table width="690" border="1">
        <tr> <?php include ("blocks/lefttd.php"); ?> <!--Левый блок-->
          <td width="500" valign="top" bgcolor="#FFFFFF" > <p>Введите критерии поиска:</p>
            <form name="form1" method="post" action="searching.php">
              <label for="authors"> <p>Авторы:
              </p>
              <p><input type="text" name="authors" id="authors">
                <br>
              </p>
              <p>Название:              </p>
              <p><input type="text" name="name" id="name">
                <br>
              <br>
              <input name="submit" type="submit" id="submit" value="Найти">
              <br>
            </p>
            </form>
          </td>
        </tr>
    </table></td>
  </tr>
  <?php include ("blocks/footer.php"); ?><!-- Нижняя часть -->
</table>
</body>
</html>