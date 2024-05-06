<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Table</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        .button-container {
            text-align: right;
        }
    </style>
</head>
<body>

<h2>CONDOMINIOS KESF</h2>

<div class="button-container">

    <button class="button" onclick="mostrarFormulario()">Agregar</button>
    <button class="button" onclick="actualizarDepartamento()">Editar</button>
    <button class="button" onclick="mostrarEliminar()">Eliminar</button>
</div>

</div>

<div class="table-container">
    <table id="departamentos">
        <tr>
            <th>ID</th>
            <th>Nombre Departamento</th>
            <th>Número de Habitaciones</th>
            <th>Número de Baños</th>
            <th>Precio</th>
        </tr>
        <!-- Aquí se agregarán las filas de datos dinámicamente -->
        <?php
        // Incluir la conexión y obtener los datos de los departamentos
        require_once('includes/Database.php');
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('SELECT * FROM departamentos1');
        $stmt->execute();
        $departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($departamentos as $departamento) {
            echo "<tr>";
            echo "<td>" . $departamento['id'] . "</td>";
            echo "<td>" . $departamento['nombre_Depa'] . "</td>";
            echo "<td>" . $departamento['numero_Habi'] . "</td>";
            echo "<td>" . $departamento['numero_Banos'] . "</td>";
            echo "<td>$" . $departamento['precio'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <div id="form-container" class="form-container">
    <h3>Agregar Departamento</h3>
    <form id="formulario-departamento" class="formulario-departamento">
        <input type="text" name="nombre_Depa" class="form-input" placeholder="Nombre Departamento"><br>
        <input type="number" name="numero_Habi" class="form-input" placeholder="Número de Habitaciones"><br>
        <input type="number" name="numero_Banos" class="form-input" placeholder="Número de Baños"><br>
        <input type="number" name="precio" class="form-input" placeholder="Precio"><br>
        <button type="submit" class="form-button">Guardar</button>
        <button type="button" class="form-button" onclick="cancelarEdicion()">Cancelar</button>
    </form>
    <div id="mensaje"></div> 
</div>

    <script>
    const formulario = document.getElementById('formulario-departamento');
    formulario.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(formulario);
        fetch('create_depas.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('mensaje').innerText = data.message;
            formulario.reset();
            setTimeout(() => {
                document.getElementById('mensaje').innerText = '';
            }, 3000);
        })
        .catch(error => console.error('Error:', error));
    });
    function cancelarEdicion() {
        document.getElementById("form-container").style.display = "none";
    }
    
    function actualizarDepartamento() {
        var id = prompt("Ingrese el ID del departamento que desea actualizar:");
        if (id !== null) {
            var nombre = prompt("Ingrese el nuevo nombre del departamento:");
            var habitaciones = prompt("Ingrese el nuevo número de habitaciones:");
            var banos = prompt("Ingrese el nuevo número de baños:");
            var precio = prompt("Ingrese el nuevo precio:");

            // Crear un objeto con los datos a enviar
            var data = {
                id: id,
                nombre: nombre,
                habitaciones: habitaciones,
                banos: banos,
                precio: precio
            };

            // Enviar la solicitud PUT utilizando fetch
            fetch('update_depas.php', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data) // Convertir el objeto de datos a JSON
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                // Puedes recargar la página para actualizar la tabla después de la actualización
                location.reload();
            })
            .catch(error => console.error('Error:', error));
        }
    }
    </script>

            <script>
                function mostrarEliminar() {
                    var id = prompt("Ingrese el ID del departamento que desea eliminar:");
                    if (id !== null) {
                        if (confirm(`¿Estás seguro de que deseas eliminar el departamento con ID ${id}?`)) {
                            eliminarDepartamento(id);
                        }
                    }
                }

                function eliminarDepartamento(id) {
                    fetch(`delete_depas.php?id=${id}`, {
                        method: 'DELETE'
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        // Actualizar la tabla (opcional)
                        // Puedes volver a cargar los datos de la tabla o eliminar la fila eliminada visualmente sin recargar la página
                    })
                    .catch(error => console.error('Error:', error));
                }
            </script>

    <script>
        function eliminarDepartamento(id) {
            if (confirm(`¿Estás seguro de que deseas eliminar el departamento con ID ${id}?`)) {
                // Enviar la solicitud al servidor mediante AJAX para eliminar el departamento con el ID proporcionado
                fetch(`delete_depas.php?id=${id}`, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    // Manejar la respuesta del servidor (por ejemplo, mostrar un mensaje de confirmación)
                    alert(data.message);

                    // Actualizar la tabla (opcional)
                    // Puedes volver a cargar los datos de la tabla o eliminar la fila eliminada visualmente sin recargar la página
                })
                .catch(error => console.error('Error:', error));
            }
        }
    </script>

<script src="diseño.js"></script>

</body>
</html>
