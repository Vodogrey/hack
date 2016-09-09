<?php

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Регистрация читателя</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color: #FFFFFF;">
<table width="690" border="1" align="center" class="main_border">
  <?php include ("blocks/header.php"); ?> <!-- Шапка сайта -->
  <tr>
    <td>
      <table width="690" border="1">
        <tr> <?php include ("blocks/lefttd.php"); ?> <!--Левый блок-->
          <td width="500" valign="top" bgcolor="#FFFFFF" ><form name="form1" method="post" action="add_reader.php">
            <p>&nbsp;</p>
            <p class="label">
              <label for="login" class="label">Login:<br>
              </label>
              <br>
              <input  name="login" type="text" id="login">
            </p>
          	<p class="label">        	
          	  <label for="password" class="label">Password:<br></label>
          	  <br>
          	  <input  type="text" name="password" id="password">
			</p>
          	<p class="label">
          	  <input name="submit" type="submit" id="submit"  value="Зарегистрировать"><br>
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