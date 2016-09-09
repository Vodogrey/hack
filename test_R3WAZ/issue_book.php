<?php

$number = $_GET['number'];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Выдать книгу</title>
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
<form name="form1" method="post" action="issue.php">
            <p>&nbsp;</p>
            <p class="label">
<label for="librarycard" class="label">Введите номер читательского билета:<br>
              </label>
              <br>
<input  name="librarycard" type="text" id="librarycard">
            </p>
          	<p class="label">        	
<label for="returndate" class="label">Введите дату возврата (в формате ГГГГ-ММ-ДД):<br></label>
          	  <br>
<input  type="text" name="returndate" id="returndate">
			</p>
<input type="hidden" name="number" value="$number">
          	<p class="label">
<input name="submit" type="submit" id="submit"  value="Выдать"><br>
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