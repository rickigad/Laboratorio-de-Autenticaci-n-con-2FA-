<?php
require "db.php";
require_once "classes/RegistroUsuario.php";
require_once "classes/Sanitizer.php";

$reg = new RegistroUsuario($conn);

$nombre = Sanitizer::string($_POST['nombre']);
$apellido = Sanitizer::string($_POST['apellido']);
$sexo = $_POST['sexo'];
$usuario = Sanitizer::usuario($_POST['usuario']);
$correo = Sanitizer::email($_POST['correo']);
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if (!$correo) exit("Correo inválido.");

if ($pass1 !== $pass2) exit("Las contraseñas no coinciden.");

if ($reg->usuarioExiste($usuario)) exit("El usuario ya existe.");
if ($reg->correoExiste($correo)) exit("El correo ya existe.");

$secreto = $reg->registrar($nombre, $apellido, $sexo, $usuario, $correo, $pass1);

if ($secreto) {
    echo "<h3>Registro exitoso</h3>";
    echo "<p>Escanea este código QR en Google Authenticator:</p>";

    $otpauth = "otpauth://totp/$usuario?secret=$secreto&issuer=Lab2FA";

    echo "<img src='https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=$otpauth'>";
} else {
    echo "Error registrando";
}
?>
