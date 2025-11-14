<?php
$host = "localhost";
$user = "labuser";
$pass = "ClaveSegura123";
$dbname = "auth2fa";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

