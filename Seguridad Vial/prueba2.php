<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking de Educación Vial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
        }
        .ranking-container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .ranking-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }
        .ranking-table {
            width: 100%;
            border-collapse: collapse;
        }
        .ranking-table th, .ranking-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .ranking-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-transform: uppercase;
        }
        .ranking-table td:first-child {
            font-weight: bold;
            font-size: 18px;
        }
        

.dataTables_filter input {
    border-radius: 20px;
    padding-left: 30px;
    background-image: url('https://upload.wikimedia.org/wikipedia/commons/5/55/Magnifying_glass_icon.svg'); /* Aquí puedes agregar un ícono */
    background-repeat: no-repeat;
    background-position: 10px center;
    background-size: 1.2rem;
    margin-bottom: 1rem;
}
.dataTables_filter input::placeholder {
    color: #aaa;
    font-size: 15px;
    padding-left: 2rem; /* Mueve el texto del placeholder */
}
/* CSS para los primeros 3 lugares */
.gold td {
    color: gold;
    font-weight: bold;
}

.silver td {
    color: silver;
    font-weight: bold;
}

.bronze td {
    color: #cd7f32; /* Bronce */
    font-weight: bold;
}

    </style>
</head>
<body>

<div class="ranking-container">
    <h2 class="ranking-title">Top Jugadores de Educación Vial</h2>
    <table class="ranking-table display" id="ranking-table">
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Llamada AJAX para obtener los datos del ranking
    fetch('../Admin/funciones/obtenerPuntuaciones.php')
        .then(response => response.json())
        .then(data => {
            const rankingList = document.getElementById('ranking-list');

            if (data.length > 0) {
                data.forEach((item, index) => {
                    const listItem = document.createElement('tr');

                    // Aplica clases especiales para los primeros tres jugadores
                    let clase = '';
                    if (item.posicion === 1) {
                        clase = 'gold';
                    } else if (item.posicion === 2) {
                        clase = 'silver';
                    } else if (item.posicion === 3) {
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
                        "search": "Buscar jugador:",
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
