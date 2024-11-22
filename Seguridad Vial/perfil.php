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
     // -- LECCIONES -- 
       //checar el id de lecciones y modulos
       $sql = "SELECT * FROM modulos WHERE usuarios_id = $id"; //aquí varía el nombre del módulo
       $res = $con->query($sql);
       $modulos = []; // Crear un array vacío para almacenar los resultados

       while ($row = $res->fetch_assoc()) {
          $modulos[] = $row['id']; // Agregar cada fila al array
       }
       $totalLecciones = 0;

       // Contar las lecciones asociadas a cada modulos_id
      foreach ($modulos as $moduloId) {
      // Contar lecciones para el moduloId actual
       $query = "SELECT COUNT(*) AS total_lecciones FROM lecciones WHERE modulos_id = ?";
       $stmt = $con->prepare($query);
       $stmt->bind_param("i", $moduloId);
       $stmt->execute();
       $result = $stmt->get_result();
       $row = $result->fetch_assoc();
       // Sumar el total de lecciones al contador
       $totalLecciones += $row['total_lecciones'];
      }

    // -- VIDEOS -- 
      $totalVideos = 0;
      // Contar las lecciones asociadas a cada modulos_id
      foreach ($modulos as $moduloId) {
        // Contar lecciones para el moduloId actual
       $query = "SELECT COUNT(*) AS total_videos FROM videos WHERE lecciones_modulos_id = ?";
       $stmt = $con->prepare($query);
       $stmt->bind_param("i", $moduloId);
       $stmt->execute();
       $result = $stmt->get_result();
       $row = $result->fetch_assoc();
       // Sumar el total de lecciones al contador
       $totalVideos += $row['total_videos'];
      }

      // -- JUEGOS -- 
       $totalJuegos = 0;
       // Contar las lecciones asociadas a cada modulos_id
      foreach ($modulos as $moduloId) {
       // Contar lecciones para el moduloId actual
       $query = "SELECT COUNT(*) AS total_juegos FROM juegos WHERE lecciones_modulos_id = ?";
       $stmt = $con->prepare($query);
       $stmt->bind_param("i", $moduloId);
       $stmt->execute();
       $result = $stmt->get_result();
       $row = $result->fetch_assoc();
       // Sumar el total de lecciones al contador
       $totalJuegos += $row['total_juegos'];
      }

      $total = $totalLecciones + $totalVideos + $totalJuegos; 
      echo "<script>console.log($total)</script>";

      $Porcentaje = $total * 1.49;
      echo "<script>console.log($Porcentaje)</script>";

?>

<html>
<head>
    <title>Perfil</title>
    <link rel="stylesheet" href="../CSS/perfil.css">
</head>
<body>
    <br><br><br><br><br>
    <div align='center' style='font-weight: bold; font-size: 40px; font-family: "Share Tech Mono", monospace;'><span style=" background-color: rgba(89, 128, 68, 20%);">Detalles del perfil</span></div>
    <br>
    <div class="content">
     <div class='card-container'>
            <div class='upper-container'>
                <div class='image-container'>
                <img src='../imagenes/Perfil.png'/>
                </div>
            </div>
            <div class='lower-container'>
                <?php echo "<div>
                    <h3>🚶🏼‍♀️ $nombre 🚶🏼‍♂️</h3>
                    <h4 style='margin-right: 10px; color:#2b2424;'>📩 Correo:</h4>
                    <p id='correo-texto'>$correo</p>
                    <input type='email' id='correo-input' style='display: none;' value=$correo>"?>
                    <center><button id="editar-btn" onclick="editarCorreo()">Editar</button></center>
                    <button id="guardar-btn" onclick="guardarCorreo()" style="display: none;">Guardar</button>
                    
                    <h4 style='margin-right: 22px; color:#2b2424;'>🎮 Nivel:</h4>
                    <?php echo"<p>$nivel</p>
                </div>";?><br>
                </center> <h4 style='margin-right: 10px; color:#2b2424;'>⏳ Progreso</h4> </center>
                <div class="progress-container">
                </center> <progress max="100" value="<?php  echo $Porcentaje; ?>"></progress></center>
                <span id="tooltip" class="tooltip"><?php echo $Porcentaje; ?>%</span>
                </div>
            </div>
     </div>
        <div class="arrowsContainer">
            <div><a href="IndexSV.php"><img src="../imagenes/regresar.png" width="90px" height="90px"></a></div>
        </div>
    </div> 
    <footer>
    <div class="links">
            <a href="Terminos.php">Términos y condiciones</a>
            <a href="Politica.php">Política de privacidad</a>
            <a href="Contacto_formulario.php">Contáctanos</a>
        </div>
        <span class="copyright">&copy; VialSmart 2024</span>
    </footer>
</body>
</html>

<script>

function editarCorreo() {
    document.getElementById("correo-texto").style.display = "none";
    document.getElementById("correo-input").style.display = "inline";
    document.getElementById("editar-btn").style.display = "none";
    document.getElementById("guardar-btn").style.display = "inline";
}

function guardarCorreo() {
    const nuevoCorreo = document.getElementById("correo-input").value;

    // Lógica para enviar el correo actualizado al servidor mediante AJAX o formulario
    // Aquí se puede agregar la llamada AJAX a un archivo PHP que actualice el correo en la base de datos
               // --- Llamada AJAX para actualizar la base de datos ---
              var xhr = new XMLHttpRequest();
              xhr.open("POST", "../Admin/funciones/EditarCorreo.php", true);
              xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
              xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                  if (xhr.status === 200) {
                    console.log("Respuesta del servidor: ", xhr.responseText); // Verifica la respuesta del servidor
                  } else {
                   console.error("Error: ", xhr.statusText); // Si hay un error, lo mostramos
                  }
                }
              };
              console.log("Enviando petición AJAX");
              xhr.send("nuevoCorreo=" + nuevoCorreo + "&id=" + <?php echo $id; ?>);

    document.getElementById("correo-texto").textContent = nuevoCorreo;
    document.getElementById("correo-texto").style.display = "inline";
    document.getElementById("correo-input").style.display = "none";
    document.getElementById("editar-btn").style.display = "inline";
    document.getElementById("guardar-btn").style.display = "none";
}


document.getElementById("progreso").addEventListener("mouseover", function() {
    const porcentaje = this.value;
    const tooltip = document.getElementById("tooltip");
    tooltip.textContent = porcentaje + "%";
});
</script>