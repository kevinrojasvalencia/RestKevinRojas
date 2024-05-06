<?php
require_once('Database.php');

class Depas {
    public static function create_depas($nombre_Depa, $numero_Habi, $numero_Banos, $precio) {
        $database = new Database();
        $conn = $database->getConnection();
        
        // Verifica la conexión antes de preparar la consulta
        if(!$conn) {
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(array("message" => "Error de conexión a la base de datos"));
            return;
        }

        $stmt = $conn->prepare('INSERT INTO departamentos1 (nombre_Depa, numero_Habi, numero_Banos, precio) 
        VALUES (:nombre_Depa, :numero_Habi, :numero_Banos, :precio)');
        $stmt->bindParam(':nombre_Depa', $nombre_Depa);
        $stmt->bindParam(':numero_Habi', $numero_Habi); 
        $stmt->bindParam(':numero_Banos', $numero_Banos); 
        $stmt->bindParam(':precio', $precio);  

        if($stmt->execute()){
            header('HTTP/1.1 201 Created');
            echo json_encode(array("message" => "Departamento creado con éxito"));
        }else{
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(array("message" => "No se ha podido crear el departamento"));
        }
    }
    
    public static function delete_depas($id) {
        $database = new Database();
        $conn = $database->getConnection();

        // Verifica la conexión antes de preparar la consulta
        if(!$conn) {
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(array("message" => "Error de conexión a la base de datos"));
            return;
        }

        $stmt = $conn->prepare('DELETE FROM departamentos1 WHERE id=:id');
        $stmt->bindParam(':id', $id);

        if($stmt->execute()){
            header('HTTP/1.1 200 OK');
            echo json_encode(array("message" => "Departamento eliminado con éxito"));
        }else{
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(array("message" => "No se ha podido eliminar el departamento"));
        }
    }

    public static function get_all_depas() {
        $database = new Database();
        $conn = $database->getConnection();

        // Verifica la conexión antes de preparar la consulta
        if(!$conn) {
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(array("message" => "Error de conexión a la base de datos"));
            return;
        }

        $stmt = $conn->prepare('SELECT * FROM departamentos1');       

        if($stmt->execute()){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            header('HTTP/1.1 200 OK');
            echo json_encode($result);
        }else{
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(array("message" => "No se ha podido listar los departamentos"));
        }
    }
    
    public static function update_depas($id, $nombre_Depa, $numero_Habi, $numero_Banos, $precio) {
        $database = new Database();
        $conn = $database->getConnection();

        // Verifica la conexión antes de preparar la consulta
        if(!$conn) {
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(array("message" => "Error de conexión a la base de datos"));
            return;
        }

        $stmt = $conn->prepare('UPDATE departamentos1 SET nombre_Depa=:nombre_Depa, numero_Habi=:numero_Habi, 
        numero_Banos=:numero_Banos, precio=:precio WHERE id=:id');
        $stmt->bindParam(':nombre_Depa', $nombre_Depa);
        $stmt->bindParam(':numero_Habi', $numero_Habi); 
        $stmt->bindParam(':numero_Banos', $numero_Banos); 
        $stmt->bindParam(':precio', $precio);  
        $stmt->bindParam(':id', $id);  

        if($stmt->execute()){
            header('HTTP/1.1 200 OK');
            echo json_encode(array("message" => "Departamento actualizado con éxito"));
        }else{
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(array("message" => "No se ha podido actualizar el departamento"));
        }
    }
}
?>
