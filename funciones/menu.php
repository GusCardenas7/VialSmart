<?php
    if(isset($_SESSION['nombreU']) && !empty($_SESSION['nombreU'])) {
        $nombre = $_SESSION['nombreU'];
        echo "<div class='menu'>
            <img class='logo' src='../imagenes/logo.png' alt='' />
            <ul align='right'>
                <li style='color:#6cda1a;'> <b>Bienvenid@ $nombre</b></li>
                <li> <b><a href='../Seguridad Vial/IndexSV.php'>Inicio</a></b></li>
                <li> <b><a href='../Seguridad Vial/lecciones.php'>Lecciones</a></b></li>
                <li> <b><a href='../Seguridad Vial/videos.php'>Videos</a></b></li>
                <li> <b><a href='../Seguridad Vial/Juegos.php'>Juegos</a></b></li>
                <li> <b><a href='../Seguridad Vial/logros.php'>Logros</a></b></li>
                <li> <b><a href='../Seguridad Vial/perfil.php'>Perfil</a></b></li>
                <li> <b><a href='../Admin/funciones/cerrarSesion.php'>Cerrar sesión</a></b></li>
            </ul>
        </div>";
    } else {
        echo "<div class='menu'>
            <img class='logo' src='../imagenes/logo.png' alt='' />
            <ul align='right'>
                <li style='color:#6cda1a;'> <b>Bienvenid@</b></li>
                <li> <b><a href='../Seguridad Vial/IndexSV.php'>Inicio</a></b></li>
                <li> <b><a href='../Seguridad Vial/lecciones.php'>Lecciones</a></b></li>
                <li> <b><a href='../Seguridad Vial/videos.php'>Videos</a></b></li>
                <li> <b><a href='../Seguridad Vial/Juegos.php'>Juegos</a></b></li>
                <li> <b><a href='../Seguridad Vial/login.php'>Iniciar sesión</a></b></li>
            </ul>
        </div>";
    }
?>

<style>
.menu {
    padding: 0;
    background: #ffffff;
    position: absolute;
    top: 0%;
    right: 0%;
    left: 0%;
    width: 100%;
    margin: auto;
    font-family: Arial, Helvetica, sans-serif;
}

.menu li a {
    text-decoration: none;
    color: black;
    padding: 8px;
    display: block;
}

li {
    font-size: 21px;
    font-family: 'Share Tech Mono', monospace;
    list-style: none;
    display: flex;
    margin: 0 8px;
}

.menu li {
    display: inline-block;
    text-align: center;
}

.menu li a:hover {
    background: #F0EB7F;
}

.logo {
    position: absolute;
    width: 10%;
    height: 98%;
    left: 30px;
}
</style>