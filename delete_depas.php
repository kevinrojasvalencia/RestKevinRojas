<?php
require_once('includes/Depas.php');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = Depas::delete_Depas($id);

    if ($result) {

        header('Content-Type: application/json');
        echo json_encode(array('success' => true, 'message' => 'Departamento eliminado con éxito'));
    } else {

        header('Content-Type: application/json');
        echo json_encode(array('success' => false, 'message' => 'Error al eliminar el departamento'));
    }
} else {
   
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(array('success' => false, 'message' => 'Se requiere un ID válido para eliminar el departamento'));
}
?>
