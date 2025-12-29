<?php
$host = "127.0.0.1";
$user = "root";
$pass = "3256Asd!?";
$db = "defacto_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("0/Bağlantı hatası: " . $conn->connect_error); 
}
?>
