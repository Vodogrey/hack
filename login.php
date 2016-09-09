<?php


include 'db_data.php';

$username = $_POST['username'];
$pass= $_POST['password'];


try {
    $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	 echo "Connected successfully"; 	 
	 $sql_select = "select * from users where LOGIN_USERS = '$username' and PASSWORD_USERS = '$pass'";
	 
     $stmt = $conn->query($sql_select);
	 if ($stmt) { 
     $registrants = $stmt->fetchAll(); 
	if(count($registrants) > 0)
		{ 
	header ('Location: QSO.html');
      setcookie("login", $username);
      setcookie("pass", $pass);
	} 
	 else 	header ('Location: index.php');
	 }
	
}
catch(Exception $e){
    die(var_dump($e));
	header ('Location: index.php'); 
}

?>