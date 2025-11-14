<?php
require_once "Sanitizer.php";
require_once __DIR__ . "/../vendor/autoload.php";

use OTPHP\TOTP;

class RegistroUsuario {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function usuarioExiste($usuario) {
        $sql = "SELECT id FROM usuarios WHERE usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0;
    }

    public function correoExiste($correo) {
        $sql = "SELECT id FROM usuarios WHERE correo = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0;
    }

    public function registrar($nombre, $apellido, $sexo, $usuario, $correo, $pass) {

        $passHash = password_hash($pass, PASSWORD_DEFAULT);

        // 🔥 Secreto Base32 válido para Google Authenticator
        $totp = TOTP::create();
        $secreto = $totp->getSecret();

        $sql = "INSERT INTO usuarios(nombre, apellido, sexo, usuario, correo, password_hash, secreto_2fa)
                VALUES(?,?,?,?,?,?,?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssss", $nombre, $apellido, $sexo, $usuario, $correo, $passHash, $secreto);

        if ($stmt->execute()) {
            return $secreto;
        } else {
            return false;
        }
    }
}
?>
