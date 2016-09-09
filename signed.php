<?php

include 'db_data.php';

$username = $_POST['username']; if ($username == '') unset ($username);
$date = $_POST['date'];
$experience = $_POST['experience'];
$login = $_POST['login']; if ($login == '') unset ($login);
$password = $_POST['password']; if ($password == '') unset ($password);
$cpassword = $_POST['cpassword']; if ($cpassword == '') unset ($cpassword);
$email = $_POST['email']; if ($email == '') unset ($email);
$secquestion = $_POST['secquestion']; if ($secquestion == '') unset ($secquestion);
$answer = $_POST['answer']; if ($answer == '') unset ($answer);
$callsign = $_POST['callsign'];


if ($db) echo "Connect OK";

if ($username && $login && $password && $cpassword && $email && $secquestion && $answer)
{
	echo "All right";
	if ($password == $cpassword)
	{
		echo "passwords OK";
		$sql = "INSERT INTO users (LOGIN_USERS, PASSWORD_USERS, FIRSTNAME_USERS,
										  BIRTHDATE_USERS, FIRSTCONNECT_USERS)
					   VALUES ('$login', '$password', '$username', '$date', '$experience')";
		
				
		if (mysql_query($sql))
			echo "insert OK";
		else 
			echo "Input error";
		mysql_query("commit");
		if ($callsign != '')
		{
			$sql = "INSERT INTO cals (CALL_CALLS) values ('$callsign')";
			if (mysql_query($sql)) echo "callsign OK";
			mysql_query("commit");
			$result = mysql_query("SELECT * FROM users WHERE LOGIN_USERS = '$login'");
			$myrow = mysql_fetch_array($result);
			$myuserid = $myrow['ID_USERS'];
			if (!empty($myuserid)) {echo "userid OK"; echo $myuserid;}
			$result = mysql_query("SELECT * FROM cals WHERE CALL_CALLS = '$callsign'");
			$myrow = mysql_fetch_array($result);
			$mycallid = $myrow['ID_CALLS'];
			if (!empty($mycallid)) {echo "callid OK"; echo $mycallid;}
			if (mysql_query("INSERT INTO usercalls (ID_USER, ID_CALL, ISOWNER_USERCALLS) VALUES ('$myuserid', '$mycallid', 1)"))
				echo "Call and user sync";
			
			
			
			
		}
		header ('Location: index.php');
	}
	} else header ('Location: sign_up.php');
 

; 




?>