<?php
    require "../Admin/funciones/comprobarSesion.php";
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ranking Juego 5.2</title>
    <link rel="stylesheet" href="../CSS/logros.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
         body {
            background-color: #f4f4f4;
background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1008%26quot%3b)' fill='none'%3e%3crect width='1440' height='560' x='0' y='0' fill='rgba(232%2c 134%2c 134%2c 1)'%3e%3c/rect%3e%3cpath d='M215.79 380.29 a116.92 116.92 0 1 0 233.84 0 a116.92 116.92 0 1 0 -233.84 0z' fill='rgba(49%2c 27%2c 27%2c 0.19)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M1184.8201873773733 362.1596719420809L1055.1137343029764 332.21457774348215 1025.1686401043776 461.92103081787906 1154.8750931787745 491.8661250164778z' fill='rgba(49%2c 27%2c 27%2c 0.19)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M434.9401942507237 446.4799331896722L320.32256366639785 390.57717952949326 379.0374405905448 561.097563773998z' fill='rgba(49%2c 27%2c 27%2c 0.19)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M163.925%2c137.167C198.98%2c136.588%2c234.428%2c126.727%2c253.642%2c97.401C274.733%2c65.21%2c279.657%2c23.223%2c260.417%2c-10.107C241.175%2c-43.441%2c202.41%2c-58.567%2c163.925%2c-58.019C126.467%2c-57.485%2c91.343%2c-39.554%2c72.081%2c-7.423C52.256%2c25.647%2c48.25%2c67.906%2c68.923%2c100.452C88.433%2c131.166%2c127.543%2c137.768%2c163.925%2c137.167' fill='rgba(49%2c 27%2c 27%2c 0.19)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M519.0691728023392 308.17262644956423L485.42577787975154 173.23633955463328 350.4894909848206 206.87973447722086 384.1328859074082 341.8160213721518z' fill='rgba(49%2c 27%2c 27%2c 0.19)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M89.90775729661 76.67927504122487L30.892484244828808 54.02543419885131 26.419359507159058 153.87526419770987z' fill='rgba(49%2c 27%2c 27%2c 0.19)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M863.2813149151898 185.40437385005725L969.4692720010943 224.0536294668633 901.9305705319958 79.21641676415277z' fill='rgba(49%2c 27%2c 27%2c 0.19)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M1173.3752696610022 461.7932381596218L1113.1845765385365 531.0347099364412 1247.1421307649987 586.70001373173z' fill='rgba(49%2c 27%2c 27%2c 0.19)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M841.07 48.46 a142.61 142.61 0 1 0 285.22 0 a142.61 142.61 0 1 0 -285.22 0z' fill='rgba(49%2c 27%2c 27%2c 0.19)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M606.3 61.15 a129.99 129.99 0 1 0 259.98 0 a129.99 129.99 0 1 0 -259.98 0z' fill='rgba(49%2c 27%2c 27%2c 0.19)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M128.05474955467122 192.62536576199614L140.987895582794 87.29334410538058 35.65587392617847 74.36019807725778 22.722727898055666 179.69221973387334z' fill='rgba(49%2c 27%2c 27%2c 0.19)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M1033.98 84.43 a184.88 184.88 0 1 0 369.76 0 a184.88 184.88 0 1 0 -369.76 0z' fill='rgba(49%2c 27%2c 27%2c 0.19)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M741.71823913542 477.4862678098418L656.2443943900112 475.9943163001463 740.2262876257246 562.9601125552507z' fill='rgba(49%2c 27%2c 27%2c 0.19)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1049.05 494.12 a138.77 138.77 0 1 0 277.54 0 a138.77 138.77 0 1 0 -277.54 0z' fill='rgba(49%2c 27%2c 27%2c 0.19)' class='triangle-float2'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1008'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cstyle%3e %40keyframes float1 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-10px%2c 0)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float1 %7b animation: float1 5s infinite%3b %7d %40keyframes float2 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-5px%2c -5px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float2 %7b animation: float2 4s infinite%3b %7d %40keyframes float3 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(0%2c -10px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float3 %7b animation: float3 6s infinite%3b %7d %3c/style%3e%3c/defs%3e%3c/svg%3e");        }
        .ranking-container {
            max-width: 700px;
            margin: 3rem auto;
            background-color: #FFF9C4;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .ranking-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #1B5E20;
        }
        .ranking-table {
            width: 100%;
            border-collapse: collapse;
        }
        .ranking-table th, .ranking-table td {
            padding: 12px 15px;
            text-align: center;
            background-color: #F44336;
            border-bottom: 1px solid #ddd;
            color: white;
        }
        .ranking-table th {
            background-color: #FF5722; /* Color de encabezado más atractivo */
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }
        .ranking-table td:first-child {
            font-weight: bold;
            font-size: 18px;
        }
        
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 20px;
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/5/55/Magnifying_glass_icon.svg'); /* Aquí puedes agregar un ícono */
            background-repeat: no-repeat;
            background-position: 10px center;
            background-size: 1.2rem;
            margin-bottom: 1rem;
            padding-left: 2.2rem;
            background-color: white;
            border: 2px solid #FFEB3B; /* Borde amarillo */
            color: #212121; /* Gris oscuro */
        }

        .dataTables_filter input::placeholder {
            color: #aaa;
            font-size: 15px;
        }

        .dataTables_wrapper .dataTables_length label,
        .dataTables_wrapper .dataTables_filter label {
            color: #1B5E20; /* Verde oscuro */
            font-weight: 500;
        }

        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
            color: #1B5E20;
        }

        /* Botones de paginación de DataTables */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            background-color: #FFEB3B; /* Fondo amarillo */
            color: #212121; /* Texto gris oscuro */
            margin: 2px;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Botón de paginación activo */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #4CAF50 !important; /* Verde para el botón activo */
            color: white !important; /* Texto blanco */
            border: 1px solid #388E3C; /* Verde más oscuro para el borde */
        }

        /* Botones deshabilitados (Anterior, Siguiente cuando no están disponibles) */
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            background-color: #BDBDBD; /* Gris claro para deshabilitados */
            color: white !important;
            cursor: not-allowed;
        }

        /* Dropdown para seleccionar el número de elementos por página */
        .dataTables_wrapper .dataTables_length select {
            background: #FFF9C4; /* Fondo amarillo suave */
            border: 2px solid #1B5E20; /* Borde verde oscuro */
            color: #212121; /* Texto gris oscuro */
            padding: 5px;
            border-radius: 5px;
        }

        /* Hover effect para los botones de paginación */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #F44336;
            color: white !important;
        }

        /* CSS para los primeros 3 lugares */
        .gold td {
            background-color: #4CAF50; /* Verde para los primeros 3 lugares */
            color: white;
            font-weight: bold;
        }

        .silver td {
            background-color: #FFC107; /* Amarillo para el cuarto lugar */
            color: black;
            font-weight: bold;
        }

        .bronze td {
            background-color: #F44336; /* Rojo para el quinto lugar o menos */
            color: white;/* Bronce */
            font-weight: bold;
        }
        
        .arrowsContainer {
            margin: 0 3rem 1rem;
        }
    </style>
</head>
<body> 
    <?php 
        include '../funciones/menu.php'; 
    ?>
    <br><br><br>
    <div class="ranking-container content">
        <h2 class="ranking-title">Mejores puntuaciones - Juego 5.2: Primeros auxilios básicos</h2>
        <table class="ranking-table" id="ranking-table">
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Nombre</th>
                    <th>Mejor Puntuación</th>
                    <th>Nivel del Jugador</th>
                </tr>
            </thead>
            <tbody id="ranking-list">
                <!-- Aquí se insertarán los jugadores dinámicamente -->
            </tbody>
        </table>
    </div>
    <div class="arrowsContainer">
        <div><a href="ranking.php"><img src="../imagenes/regresar.png" width="90px" height="90px"></a></div>
    </div>
    <footer>
        <div class="links">
            <a href="Terminos.php">Términos y condiciones</a>
            <a href="Politica.php">Política de privacidad</a>
            <a href="Contacto_formulario.php">Contáctanos</a>
        </div>
        <span class="copyright">&copy; VialSmart 2024</span>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // Llamada AJAX para obtener los datos del ranking
        fetch(`../Admin/funciones/obtenerPuntuaciones.php?nombre_juego='Primeros auxilios basicos'`)
            .then(response => response.json())
            .then(data => {
                const rankingList = document.getElementById('ranking-list');

                if (data.length > 0) {
                    data.forEach((item, index) => {
                        const listItem = document.createElement('tr');

                        // Aplica clases especiales para los primeros tres jugadores
                        let clase = '';
                        if (item.posicion === 1 ) {
                            clase = 'gold';
                        } else if (item.posicion === 2 || item.posicion === 3 ) {
                            clase = 'silver';
                        } else if (item.posicion >= 4 ) {
                            clase = 'bronze';
                        }

                        listItem.className = clase; // Aplica la clase según la posición

                        listItem.innerHTML = `
                            <td>${item.posicion}</td>
                            <td>${item.nombre_usuario}</td>
                            <td>${item.mejor_puntaje} pts</td>
                            <td>Nivel ${item.nivel}</td>
                        `;
                        rankingList.appendChild(listItem);
                    });

                    // Inicializar DataTables después de cargar los datos
                    $('#ranking-table').DataTable({
                        "paging": true,
                        "searching": true,
                        "lengthMenu": [5, 10, 25],
                        "language": {
                            "search": "",
                            "paginate": {
                                "previous": "Anterior",
                                "next": "Siguiente"
                            },
                            "lengthMenu": "Mostrar _MENU_ jugadores por página",
                            "zeroRecords": "No se encontraron resultados",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ jugadores",
                            "infoEmpty": "No hay jugadores disponibles",
                            "infoFiltered": "(filtrado de _MAX_ jugadores en total)"
                        }
                    });

                    $('.dataTables_filter input').attr('placeholder', 'Buscar jugador...');

                } else {
                    rankingList.innerHTML = '<tr><td colspan="4">No hay jugadores en el ranking</td></tr>';
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>