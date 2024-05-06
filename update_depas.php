<?php
// update_depas.php

// Incluir la clase Depas
require_once('includes/Depas.php');

// Verificar si la solicitud es del tipo PUT
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Obtener los datos del cuerpo de la solicitud
    $data = json_decode(file_get_contents("php://input"), true);

    // Verificar si se recibieron los datos necesarios
    if (isset($data['id']) && isset($data['nombre']) && isset($data['habitaciones']) && isset($data['banos']) && isset($data['precio'])) {
        // Llamar a la función de actualización de la clase Depas
        Depas::update_depas($data['id'], $data['nombre'], $data['habitaciones'], $data['banos'], $data['precio']);
    }
}
?>
