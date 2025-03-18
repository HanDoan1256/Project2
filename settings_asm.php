<?php
$host = 'feenix-mariadb.swin.edu.au';
$user = 's105080751';
$pwd = 'Duong105080751';
$sql_db = 's105080751_db';

$conn = new mysqli($host, $user, $pwd, $sql_db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>