<?php
$host = "localhost";
$user = "2024_nhanczka";
$password = "Niebo.164";
$dbname = "2024_nhanczka";
$prefix = "prefix nazwy tabeli";

// Create connection
$link = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
 echo "Connected successfully";

?>