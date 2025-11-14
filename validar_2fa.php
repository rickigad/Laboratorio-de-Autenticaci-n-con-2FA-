<?php
session_start();
require "db.php";

if (!isset($_SESSION['pending_2fa'])) exit("Sesión no válida.");

$id = $_SESSION['pending_2fa'];

$sql = "SELECT secreto_2fa FROM usuarios WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$data = $res->fetch_assoc();

$secreto = $data['secreto_2fa'];
$codigo  = $_POST['codigo'];

// Autoload de Composer
require __DIR__ . "/vendor/autoload.php";

use OTPHP\TOTP;

// Crear TOTP
$totp = TOTP::create($secreto);

// Validar
if ($totp->verify($codigo)) {

    unset($_SESSION['pending_2fa']);
    $_SESSION['auth'] = $id;

    header("Location: home.php");
    exit;

} else {
    echo "Código incorrecto.";
}
?>
