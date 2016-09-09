
<?php 
/*$db = mysql_connect ("localhost","php","12345");
mysql_select_db ("biblioteka", $db); */
$host = "eu-cdbr-azure-north-e.cloudapp.net";
$user = "b7625632439068";
$pwd = "1b4fd4f4";
//$db = "pj";

$db = mysql_connect ($host, $user, $pwd);
mysql_select_db ("pj",$db);

/*try {
    $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	 echo "Connected successfully"; 
	$func("sfdd"," sdf"); 
}*/
?>
