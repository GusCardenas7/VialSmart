<?php
    session_start();
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cerrando sesión</title>
</head>
<body>
    <script>
        sessionStorage.clear();
        window.location.href = "../../Seguridad Vial/login.php";
    </script>
</body>
</html>
