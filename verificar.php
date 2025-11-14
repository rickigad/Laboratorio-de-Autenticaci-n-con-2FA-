<?php
session_start();
require "db.php";

$user = $_POST['user'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM usuarios WHERE usuario=? OR correo=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $user);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows == 0) exit("Usuario no existe");

$data = $res->fetch_assoc();

if (!password_verify($pass, $data['password_hash'])) {
    exit("Contraseña incorrecta");
}

$_SESSION['pending_2fa'] = $data['id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificación 2FA</title>

    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    >

    <style>
        body {
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            width: 380px;
            border-radius: 12px;
        }
    </style>
</head>
<body>

<div class="card shadow p-4">
    <h3 class="text-center mb-3">🔑 Código 2FA</h3>

    <p class="text-center">Ingresa el código generado en tu app de autenticación</p>

    <form action="validar_2fa.php" method="POST">

        <div class="mb-3">
            <label class="form-label">Código</label>
            <input type="text" name="codigo" maxlength="6" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Validar</button>
    </form>
</div>

</body>
</html>
