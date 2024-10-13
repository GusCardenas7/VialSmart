<?php
    require "../Admin/funciones/comprobarSesion.php";
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ranking Juego 7.1</title>
    <link rel="stylesheet" href="../CSS/logros.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
        body {
            background-color: #f4f4f4;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1103%26quot%3b)' fill='none'%3e%3crect width='1440' height='560' x='0' y='0' fill='rgba(255%2c 204%2c 204%2c 1)'%3e%3c/rect%3e%3cpath d='M150 100 L250 200 350 100 250 0z' fill='rgba(255%2c 102%2c 102%2c 0.6)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M1300 80 a120 120 0 1 0 240 0 a120 120 0 1 0 -240 0z' fill='rgba(255%2c 102%2c 102%2c 0.6)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M900 500 L1000 420 850 320 750 400z' fill='rgba(255%2c 102%2c 102%2c 0.6)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M500 300 C520 310 540 290 560 270 C580 250 600 230 620 210 C640 190 660 170 680 150' fill='rgba(255%2c 102%2c 102%2c 0.6)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M300 460 C320 470 340 450 360 430 C380 410 400 390 420 370 C440 350 460 330 480 310' fill='rgba(255%2c 102%2c 102%2c 0.6)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1000 300 C1020 310 1040 290 1060 270 C1080 250 1100 230 1120 210 C1140 190 1160 170 1180 150' fill='rgba(255%2c 102%2c 102%2c 0.6)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M600 500 L650 550 700 500 650 450z' fill='rgba(255%2c 102%2c 102%2c 0.6)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M100 150 L150 200 200 150 150 100z' fill='rgba(255%2c 102%2c 102%2c 0.6)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1200 400 L1250 450 1300 400 1250 350z' fill='rgba(255%2c 102%2c 102%2c 0.6)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M800 200 C820 210 840 190 860 170 C880 150 900 130 920 110 C940 90 960 70 980 50' fill='rgba(255%2c 102%2c 102%2c 0.6)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M300 100 C320 110 340 90 360 70 C380 50 400 30 420 10 C440 -10 460 -30 480 -50' fill='rgba(255%2c 102%2c 102%2c 0.6)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1100 350 C1120 360 1140 340 1160 320 C1180 300 1200 280 1220 260 C1240 240 1260 220 1280 200' fill='rgba(255%2c 102%2c 102%2c 0.6)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M500 500 L550 550 600 500 550 450z' fill='rgba(255%2c 102%2c 102%2c 0.6)' class='triangle-float1'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1103'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cstyle%3e %40keyframes float1 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-10px%2c 0)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float1 %7b animation: float1 5s infinite%3b %7d %40keyframes float2 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-5px%2c -5px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float2 %7b animation: float2 4s infinite%3b %7d %40keyframes float3 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(0%2c -10px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float3 %7b animation: float3 6s infinite%3b %7d %3c/style%3e%3c/defs%3e%3c/svg%3e"); 
        }
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
        <h2 class="ranking-title">Mejores puntuaciones - Juego 7.1: Respuestas en caso de emergencia</h2>
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
            <a href="">Términos y condiciones</a>
            <a href="">Política de privacidad</a>
            <a href="../contacto_formulario.php">Contáctanos</a>
        </div>
        <span class="copyright">&copy; VialSmart 2024</span>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // Llamada AJAX para obtener los datos del ranking
        fetch(`../Admin/funciones/obtenerPuntuaciones.php?nombre_juego='Respuestas en casos de emergencia'`)
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