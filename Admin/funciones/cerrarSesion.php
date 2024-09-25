<?php
    session_start();
    session_unset();  
    session_destroy();  
    header('Location: ../../Seguridad Vial/login.php');
    exit();
?>