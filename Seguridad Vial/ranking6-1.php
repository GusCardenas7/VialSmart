<?php
    require "../Admin/funciones/comprobarSesion.php";
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ranking Juego 6.1</title>
    <link rel="stylesheet" href="../CSS/logros.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
         body {
            background-color: #f4f4f4;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1028%26quot%3b)' fill='none'%3e%3crect width='1440' height='560' x='0' y='0' fill='rgba(252%2c 218%2c 57%2c 1)'%3e%3c/rect%3e%3cpath d='M1205.51 311.2 a166.75 166.75 0 1 0 333.5 0 a166.75 166.75 0 1 0 -333.5 0z' fill='rgba(39%2c 45%2c 32%2c 0.57)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1015.919%2c303.903C1053.574%2c302.333%2c1082.4%2c275.028%2c1101.891%2c242.772C1122.266%2c209.053%2c1137.403%2c168.469%2c1118.711%2c133.789C1099.296%2c97.768%2c1056.762%2c80.749%2c1015.919%2c83.266C978.993%2c85.542%2c951.851%2c113.431%2c932.955%2c145.237C913.516%2c177.957%2c898.93%2c216.771%2c916.565%2c250.498C935.238%2c286.21%2c975.655%2c305.581%2c1015.919%2c303.903' fill='rgba(39%2c 45%2c 32%2c 0.57)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M340.253%2c338.394C385.607%2c340.505%2c431.545%2c322.305%2c454.768%2c283.29C478.463%2c243.482%2c473.347%2c193.824%2c450.187%2c153.703C427.024%2c113.578%2c386.575%2c85.82%2c340.253%2c84.914C292.357%2c83.977%2c244.602%2c106.694%2c222.607%2c149.251C201.97%2c189.18%2c219.087%2c235.258%2c242.826%2c273.424C264.923%2c308.95%2c298.461%2c336.449%2c340.253%2c338.394' fill='rgba(39%2c 45%2c 32%2c 0.57)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M383.02 407.15 a125.03 125.03 0 1 0 250.06 0 a125.03 125.03 0 1 0 -250.06 0z' fill='rgba(39%2c 45%2c 32%2c 0.57)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M117.05 253.64 a101.93 101.93 0 1 0 203.86 0 a101.93 101.93 0 1 0 -203.86 0z' fill='rgba(39%2c 45%2c 32%2c 0.57)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M1404.3403661414761 214.69792795162283L1340.432224698825 77.64647635095375 1267.2889145408071 278.60606939427396z' fill='rgba(39%2c 45%2c 32%2c 0.57)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M109.86248242854579-15.902802353112246L46.404335899420005 157.9313769893332 206.17966722535152 132.62545055960814z' fill='rgba(39%2c 45%2c 32%2c 0.57)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M940.061%2c528.289C994.704%2c527.423%2c1033.987%2c482.327%2c1061.269%2c434.974C1088.494%2c387.719%2c1109.078%2c330.378%2c1081.029%2c283.607C1053.5%2c237.702%2c993.54%2c230.593%2c940.061%2c232.859C891.331%2c234.924%2c844.113%2c253.309%2c818.37%2c294.736C791.154%2c338.533%2c788.183%2c393.196%2c812.01%2c438.925C837.788%2c488.399%2c884.281%2c529.173%2c940.061%2c528.289' fill='rgba(39%2c 45%2c 32%2c 0.57)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M906.76 345.57 a99.8 99.8 0 1 0 199.6 0 a99.8 99.8 0 1 0 -199.6 0z' fill='rgba(39%2c 45%2c 32%2c 0.57)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M191.6231162316751 366.021927546359L62.07609826735353 470.92703424189335 166.98120496288792 600.474052206215 296.5282229272095 495.5689455106806z' fill='rgba(39%2c 45%2c 32%2c 0.57)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M179.83086689461018 129.35330078752946L226.61409692202923 73.59921832919147 119.59135822081274 31.30141451723189z' fill='rgba(39%2c 45%2c 32%2c 0.57)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M20.01 464 a124.94 124.94 0 1 0 249.88 0 a124.94 124.94 0 1 0 -249.88 0z' fill='rgba(39%2c 45%2c 32%2c 0.57)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M791.4006822791054 54.38946318315009L701.5789378299145 41.76584024383592 778.7770593397912 144.21120763234097z' fill='rgba(39%2c 45%2c 32%2c 0.57)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M327.36 352.58 a178.36 178.36 0 1 0 356.72 0 a178.36 178.36 0 1 0 -356.72 0z' fill='rgba(39%2c 45%2c 32%2c 0.57)' class='triangle-float2'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1028'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cstyle%3e %40keyframes float1 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-10px%2c 0)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float1 %7b animation: float1 5s infinite%3b %7d %40keyframes float2 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-5px%2c -5px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float2 %7b animation: float2 4s infinite%3b %7d %40keyframes float3 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(0%2c -10px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float3 %7b animation: float3 6s infinite%3b %7d %3c/style%3e%3c/defs%3e%3c/svg%3e");
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
        <h2 class="ranking-title">Mejores puntuaciones - Juego 6.1: Identificación de situaciones de riesgo</h2>
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
        fetch(`../Admin/funciones/obtenerPuntuaciones.php?nombre_juego='Identificacion de situaciones de riesgo'`)
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