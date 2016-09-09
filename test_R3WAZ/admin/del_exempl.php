<?php
include ("LOCK.php");
include ("blocks/db.php");
$number = $_GET['number'];


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Удаление</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color: #FFFFFF;">
<table width="690" border="1" align="center" class="main_border">
  <?php include ("blocks/header.php"); ?> <!-- Шапка сайта -->
  <tr>
    <td>
      <table width="690" border="1">
        <tr> <?php include ("blocks/lefttd.php"); ?> <!--Левый блок-->
          <td width="500" valign="top" bgcolor="#FFFFFF" ><table width="81%" height="130" border="1" align="left" class="lesson">
            
              <?php
			  $result = mysql_query ("SELECT * FROM instances WHERE number = '$number'");
			  $myrow = mysql_fetch_array ($result);
			  if ($myrow['strgplace'] == 2)
			  {
				  echo "Экземпляр, который Вы пытаетесь удалить, в данный момент выдан на руки. Удаление невозможно.";
			  }
			  else{
				  	$result = mysql_query ("DELETE FROM instances WHERE number = '$number'");
				  
			  	 	if ($result)
			  		{
				  		echo "Экземпляр успешно удален";
			  		}
			  		else
			  		{
				  		echo "Что-то пошло не так";
			  		}
			  }
			  
			  ?>
            
          </table> 
          
        </tr>
    </table></td>
  </tr>
  <?php include ("blocks/footer.php"); ?><!-- Нижняя часть -->
</table>
</body>
</html>