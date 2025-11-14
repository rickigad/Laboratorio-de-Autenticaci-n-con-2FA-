<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>

    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    >

    <style>
        body {
            background: #eef1f5;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 30px;
            padding-bottom: 30px;
        }
        .card {
            width: 500px;
            border-radius: 12px;
        }
    </style>
</head>
<body>

<div class="card shadow p-4">
    <h3 class="text-center mb-3">📝 Registro de Usuario</h3>

    <form action="procesar_registro.php" method="POST">

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Sexo</label>
            <select name="sexo" class="form-control">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <input type="text" name="usuario" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" name="pass1" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Confirmar Contraseña</label>
            <input type="password" name="pass2" class="form-control" required>
        </div>

        <button class="btn btn-success w-100">Registrar</button>

        <p class="text-center mt-3">
            ¿Ya tienes cuenta? <a href="index.php">Iniciar sesión</a>
        </p>

    </form>
</div>

</body>
</html>
