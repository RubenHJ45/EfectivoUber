<?php

// die("Could not connect to the database $dbname :" . $pe->getMessage());
//}

$host = 'localhost';
$dbname = 'uber';
$username = 'root';
$password = '';

	try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//$conn = new PDO("mysql:host=$servername;port=8889;dbname=AppDatabase", $username, $password);


} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}



?>
