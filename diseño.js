function mostrarFormulario() {
    document.getElementById("form-container").style.display = "block";
}

function cancelarEdicion() {
    document.getElementById("form-container").style.display = "none";
}

function guardarEdicion() {
    // Aquí puedes agregar la lógica para guardar la edición de una fila
}

function mostrarEdicion() {
    // Aquí puedes agregar la lógica para mostrar el formulario de edición
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




