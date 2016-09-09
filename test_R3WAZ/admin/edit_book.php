<?php
include ("LOCK.php");
include ("blocks/db.php");


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Редактирование книги:</title>
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
		  
		  

$cipher = $_GET['cipher'];
$result = mysql_query ("SELECT * FROM books WHERE cipher = '$cipher'");
$myrow = mysql_fetch_array($result);

print <<<HERE
<form name="form1" method="post" action="update_book.php">
          	<p>
            	<label for="authors">Введите авторов книги</label>
            	<br>
<input value="$myrow[authors]" name="authors" type="text" id="authors" title="authors">
          	</p>
          	<p>
          	  <label for="name">Введите название книги:</label>
          	  <br>
<input value="$myrow[name]" type="text" name="name" id="name">
          	</p>
          	<p>
          	  <label for="placepublic">Введите место публикации:</label>
          	  <br>
<input value="$myrow[placepublic]" type="text" name="placepublic" id="placepublic">
          	</p>
          	<p>
          	  <label for="pagenumber">Введите количество страниц:</label>
          	  <br>
<input value="$myrow[pagenumber]" name="pagenumber" type="text" id="pagenumber">
          	</p>
          	<p>
          	  <label for="publicdate">Введите год публикации:</label>
			  <br>
              <input value="$myrow[publicdate]" name="publicdate" type="text" id="publicdate">

              </p>
          	<p>
          	  
          	
          	  <label for="udk">УДК:</label>
          	  <br>
<input value="$myrow[udk]" type="text" name="udk" id="udk">
              </p>
			  <input type="hidden" name="cipher" value="$myrow[cipher]">
          	<p>
          	  <input name="submit" type="submit" id="submit"  value="Сохранить изменения">
          	  <br>
        	  </p>
          </form>
HERE;

		  
		  ?>
          
          
          </td>
        </tr>
    </table></td>
  </tr>
  <?php include ("blocks/footer.php"); ?><!-- Нижняя часть -->
</table>
</body>
</html>