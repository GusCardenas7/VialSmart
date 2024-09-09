<html>
<head>
    <title>Perfil</title>
    <link rel="stylesheet" href="../CSS/perfil.css">
</head>
<body>
    <?php 
        include '../funciones/menu.php'
    ?>
    <br><br><br><br><br>
    <div align='center' style='font-weight: bold; font-size: 40px;'>Detalles del perfil:</div>
    <div class="content">
    <div class='card-container'>
            <div class='upper-container'>
                <div class='image-container'>
                <img src='../imagenes/fotoPerfil.jpg'/>
                </div>
            </div>
            <div class='lower-container'>
                <div>
                    <h3>Gustavo Cardenas</h3>
                    <h4 style='margin-right: 10px;'>Correo:</h4>
                    <p>guscardenas63@gmail.com</p>
                    <br>
                    <h4 style='margin-right: 22px;'>Nivel:</h4>
                    <p>7</p>
                    <br>
                    <h4 style='margin-right: 15px;'>Status:</h4>
                    <p>Activo</p>
                </div>
            </div>
        </div>
        <div class="arrowsContainer">
            <div><a href="IndexSV.php"><img src="../imagenes/regresar.png" width="90px" height="90px"></a></div>
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