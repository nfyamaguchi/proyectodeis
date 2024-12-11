<?php
include 'conexion.php'; // Asegúrate de que este archivo conecta correctamente a la base de datos

header('Content-Type: application/json'); // Indicar que el contenido es JSON

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el ID enviado desde AJAX
    $id = $_POST['id'];

    // Validar que el ID no esté vacío y sea numérico
    if (!empty($id) && is_numeric($id)) {
        $stmt = $conn->prepare("SELECT * FROM personas WHERE id_persona = ?");
        $stmt->bind_param("i", $id); // El tipo "i" indica que es un entero
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc(); // Obtener el registro como un array asociativo
            echo json_encode($data); // Enviar los datos en formato JSON
        } else {
            echo json_encode(["error" => "No se encontró el registro."]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "ID no válido."]);
    }

    $conn->close(); // Cerrar la conexión
} else {
    echo json_encode(["error" => "Método no permitido."]);
}
