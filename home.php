<?php
session_start();
if (!isset($_SESSION['auth'])) exit("No has iniciado sesión.");
?>

<h1>Bienvenido al sistema</h1>
<p>Autenticado con 2FA correctamente.</p>
