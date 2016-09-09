<?php include ("blocks/db.php"); 
$result = mysql_query ("SELECT * FROM settings WHERE page='articles'", $db);
$myrow = mysql_fetch_array ($result);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="description" content="<?php echo $myrow['meta_d']; ?>">
<meta name="keywords" content="<?php echo $myrow['meta_k']; ?>">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $myrow['title']; ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color: #FFFFFF;">
<table width="690" border="1" align="center" class="main_border">
  <?php include ("blocks/header.php"); ?> <!-- Шапка сайта -->
  <tr>
    <td>
      <table width="690" border="1">
        <tr> <?php include ("blocks/lefttd.php"); ?> <!--Левый блок-->
          <td width="500" valign="top" bgcolor="#FFFFFF" ><?php echo $myrow['text']; ?>
          <?php
		  $result = mysql_query ("SELECT id, title, date, author, description 
		                          FROM articles", $db);
		  $myrow = mysql_fetch_array($result);					  
		  
		   do{
            	printf ("<table align='center' class='lesson'>
              			<tr>
                		<td class='leccon_title'><p class='lesson_name'><a href='view_articl.php?id=%s'>%s</a></p>
						                         <p class='lesson_adds'>Дата добавления: %s</p>
												 <p class='lesson_adds'>Автор: %s</p></td>
              			</tr>
						
              			<tr>
                		<td><p>%s</p></td>
              			</tr>
          				</table><br>", 
						$myrow['id'], $myrow['title'], $myrow['date'], 
						$myrow['author'],$myrow['description']);
		     } while ($myrow = mysql_fetch_array($result));
          ?>
          
          </td>
        </tr>
    </table></td>
  </tr>
  <?php include ("blocks/footer.php"); ?><!-- Нижняя часть -->
</table>
</body>
</html>