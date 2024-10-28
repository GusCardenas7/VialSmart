<?php
    require "../Admin/funciones/comprobarSesion.php";
?>

<html>
<head>
    <title>Logros conseguidos</title>
    <link rel="stylesheet" href="../CSS/verLogros.css">
    <script src="../JavaScript/leccionesPrincipal.js"></script>
</head>
<body> 
    <?php 
        include '../funciones/menu.php'; 

        //Obtenemos el id de usuario
        require "../Admin/funciones/conecta.php";   
        $con = conecta();
        $id_usuario = $_SESSION['idU'];

        // Obtener todos los logros
        $sql = "SELECT * FROM logros WHERE usuarios_id = $id_usuario";
        $res = $con->query($sql);
        $logros = [];

        while ($row = $res->fetch_assoc()) {
            $logros[] = [
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'descripcion' => $row['descripcion'],
                'desbloqueado' => $row['desbloqueado'] // Asegúrate de que esto se esté configurando correctamente
            ];
        }
    ?>
    <br><br><br><br><br>
    <div id="module1" class="module content">
        <div class="moduleTitle tracking-in-expand-forward-top">Logros conseguidos y no conseguidos</div><br>
        <div id="lessons" class="lessons">
            <?php 
            foreach ($logros as $index => $logro): ?>
                <div id="lesson<?php echo $index+1; ?>" class="blur-in-expand lesson <?php echo $logro['desbloqueado'] ? '' : 'blocked'; ?>">
                    <img id="lesson-image<?php echo $index+1; ?>" src="../imagenes/logros/logro<?php echo $index+1; ?>.png" alt="Lección <?php echo $index+1; ?>">
                    <div id="lesson-title<?php echo $index+1; ?>" class="lesson-title"><?php echo $logro['nombre']; ?>: <?php echo $logro['descripcion']; ?></div>
                </div>
            <?php endforeach; ?> 
        </div>
    </div>
    <footer>
        <div class="links">
            <a href="">Términos y condiciones</a>
            <a href="">Política de privacidad</a>
            <a href="../contacto_formulario.php">Contáctanos</a>
        </div>
        <span class="copyright">&copy; VialSmart 2024</span>
    </footer>
</body>
</html>