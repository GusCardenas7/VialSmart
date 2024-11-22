<?php
    session_start();

    // Verificar si el usuario está autenticado
    if (!isset($_SESSION['correoU'])) {
        header("Location: login.php");
        session_destroy();
        die();
    }

    // Control del tiempo de inactividad
    if (!isset($_SESSION['login_time'])) {
        $_SESSION['login_time'] = time();
    } elseif (time() - $_SESSION['login_time'] > 1800) {  // 30 minutos de inactividad
        session_unset();  
        session_destroy();  
        header('Location: login.php');
        exit();
    }

    // Actualizar el tiempo de actividad
    $_SESSION['login_time'] = time();
?>
