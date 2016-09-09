<?php
include ("LOCK.php");
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
          <form name="form1" method="post" action="add_book.php">
          <p>
            	<label for="cipher">Введите шифр книги</label>
            	<br>
<input  name="cipher" type="text" id="cipher" title="cipher">
          	</p>
          	<p>
            	<label for="authors">Введите авторов книги</label>
            	<br>
<input  name="authors" type="text" id="authors" title="authors">
          	</p>
          	<p>
          	  <label for="name">Введите название книги:</label>
          	  <br>
<input  type="text" name="name" id="name">
          	</p>
          	<p>
          	  <label for="placepublic">Введите место публикации:</label>
          	  <br>
<input  type="text" name="placepublic" id="placepublic">
          	</p>
          	<p>
          	  <label for="pagenumber">Введите количество страниц:</label>
          	  <br>
<input  name="pagenumber" type="text" id="pagenumber">
          	</p>
          	<p>
          	  <label for="publicdate">Введите год публикации:</label>
			  <br>
              <input  name="publicdate" type="text" id="publicdate">

              </p>
          	<p>        	
          	  <label for="udk">УДК:</label>
          	  <br>
<input  type="text" name="udk" id="udk">
              <p>
			  <input name="submit" type="submit" id="submit"  value="Добавить книгу">
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