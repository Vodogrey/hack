<?php


include 'db_data.php';

$username = $_POST['username'];
$pass= $_POST['password'];


try {
	if ($db) echo "Connect OK";
	$sql_select = "select * from users where (LOGIN_USERS = '$username' or EMAIL_USERS = '$username') and PASSWORD_USERS = '$pass'";
	
	if (mysql_query($sql_select))
			echo "select OK";
	
	if (!$result = mysql_query($sql_select))
			echo ":c";

	if(mysql_num_rows($result) == 1) {
		header ('Location: QSO.php');
		setcookie("login", $username);
	    setcookie("pass", $pass);
		}
	else {
		header ('Location: index.php');
	}
}
catch(Exception $e){
    die(var_dump($e));
	header ('Location: index.php'); 
}

?>