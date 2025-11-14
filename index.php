<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>

    <!-- Bootstrap -->
    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    >

    <style>
        body {
            background: #f2f4f7;
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
    <h3 class="text-center mb-3">🔐 Iniciar Sesión</h3>

    <form action="verificar.php" method="POST">

        <div class="mb-3">
            <label class="form-label">Usuario o Correo</label>
            <input type="text" name="user" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" name="pass" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Ingresar</button>

        <p class="text-center mt-3">
            ¿No tienes cuenta? <a href="registro.php">Registrarse</a>
        </p>

    </form>
</div>

</body>
</html>
