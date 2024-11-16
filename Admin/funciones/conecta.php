<?php 
    define("HOST", 'localhost');
    define("BD", 'vialsmart');
    define("USER_BD", 'root');
    define("PASS_BD", '');
    

    function conecta() {
        // Crear conexión
        $con = new mysqli(HOST, USER_BD, PASS_BD, BD);

        // Verificar si hay errores de conexión
        if ($con->connect_error) {
            die("Conexión fallida: " . $con->connect_error);  // Mensaje en caso de error
        }

        return $con;
    } 


}




?>