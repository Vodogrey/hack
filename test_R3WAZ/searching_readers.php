<?php

include ("blocks/db.php");
$librarycard = '%'.$_POST['librarycard'].'%';
$fullname = '%'.$_POST['fullname'].'%';
$pasport = '%'.$_POST['pasport'].'%';
$result = mysql_query("SELECT * FROM readers WHERE librarycard LIKE '$librarycard' AND fullname LIKE '$fullname'
                                                                                   AND pasport LIKE '$pasport'");
$myrow = mysql_fetch_array ($result);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Найденные читатели:</title>
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
            
              <?php do{ if ($myrow['indebted']==0)
			  			{$indebted = 'Нет';} else {$indebted = 'Есть';}
				  
				  			 printf ("<tr><td height='124' class='lesson'>
			  						<p class='lesson_name'>Номер билета: %s</p> 
              						<p class='lesson_adds'>Имя: %s</p>
              						<p class='lesson_adds'>Паспорт: %s</p>
									<p class='lesson_adds'>Задолженность: %s</p>
									<p class='lesson_adds'><a href='edit_reader.php?librarycard=%s'>Редактировать</a>
									&nbsp;&nbsp;           <a href='del_reader.php?librarycard=%s'>Удалить</a></p> 
									                                  </td> </tr>", $myrow['librarycard'],
									                                                  $myrow['fullname'],
																					  $myrow['pasport'],
																					  $indebted,
																					  $myrow['librarycard'],
																					  $myrow['librarycard']);
			          } while ($myrow = mysql_fetch_array ($result)); ?>
            
          </table> 
          
        </tr>
    </table></td>
  </tr>
  <?php include ("blocks/footer.php"); ?><!-- Нижняя часть -->
</table>
</body>
</html>