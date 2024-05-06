<?php
require_once('includes/Depas.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre_Depa']) && isset($_POST['numero_Habi']) && isset($_POST['numero_Banos']) && isset($_POST['precio'])) {
    Depas::create_Depas($_POST['nombre_Depa'], $_POST['numero_Habi'], $_POST['numero_Banos'], $_POST['precio']);
} else {
    // Manejar el caso en que no se reciban todos los parámetros necesarios
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(array("message" => "No se recibieron todos los parámetros necesarios"));
}
?>
