<?php

$host = "eu-cdbr-azure-north-e.cloudapp.net";
$user = "b7625632439068";
$pwd = "1b4fd4f4";
$db = "pj";


function login($arg_1, $arg_2)
{
	
$sql_select = "SELECT * FROM registration_tbl";
$stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll(); 

 echo "<table>";

if(count($registrants) > 0) {
    echo "<h2>People who are registered:</h2>";
    echo "<table>";
    echo "<tr><th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Date</th></tr>";
    foreach($registrants as $registrant) {
        echo "<tr><td>".$registrant['name']."</td>";
        echo "<td>".$registrant['email']."</td>";
        echo "<td>".$registrant['date']."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h3>No one is currently registered.</h3>";
}
}

$func = 'login';





try {
    $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	 echo "Connected successfully"; 
	$func("sfdd"," sdf"); 
}
catch(Exception $e){
    die(var_dump($e));
}

    ?>