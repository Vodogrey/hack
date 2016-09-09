<?php

$host = "eu-cdbr-azure-north-e.cloudapp.net";
$user = "b7625632439068";
$pwd = "1b4fd4f4";
$db = "pj";

$username = $_POST['username'];
$pass= $_POST['password'];

function login($arg_1, $arg_2)
{  

  //echo "functional ok"; 
  echo 	"$arg_1";
  echo 	"$arg_2";
$sql_select = mysql_query("SELECT * FROM PJ.USERS");
if($sql_select) {
 
echo 	" 1 ";} else echo 	" 9 ";




$stmt = $conn->query($sql_select);
  echo 	"$ 2 ";
$registrants = $stmt->fetchAll(); 
  echo 	" 3 ";
if(count($registrants) > 0) {
    echo "<h2>People who are registered:</h2>";
    
    echo "</table>";
} else {
    echo "<h3>No one is currently registered.</h3>";
}


}


try {
    $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	 echo "Connected successfully"; 	 
	 $sql_select = "select * from users where LOGIN_USERS = '$username' and PASSWORD_USERS = '$pass'";
	 
     $stmt = $conn->query($sql_select);
	 if ($stmt){
		 
     $registrants = $stmt->fetchAll(); 
	if(count($registrants) > 0)
		{ 
	header ('Location: QSO.html'); 
	} 
	 else 	header ('Location: index.html'); }
	
}
catch(Exception $e){
    die(var_dump($e));
	header ('Location: index.html'); 
}

    ?>