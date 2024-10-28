<?php 
    require "../Admin/funciones/comprobarSesion.php";
    include '../funciones/menu.php';
    require "../Admin/funciones/conecta.php";

    $con = conecta();

    if(isset($_SESSION['idU'])) {
        $id = $_SESSION['idU'];
        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $res = $con->query($sql);

        $row = $res->fetch_array();
        $nombre = $row["nombre"];
        $correo = $row["correo"];
        $nivel = $row["nivel"];
    }
?>

<html>
<head>
    <title>Perfil</title>
    <link rel="stylesheet" href="../CSS/perfil.css">
</head>
<body>
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
                <?php echo "<div>
                    <h3>$nombre</h3>
                    <h4 style='margin-right: 10px;'>Correo:</h4>
                    <p>$correo</p>
                </div>";?>
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