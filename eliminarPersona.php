<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Validar que el ID no esté vacío y sea numérico
    if (!empty($id) && is_numeric($id)) {
        $id = intval($id); // Convertir a entero para mayor seguridad

        // Consulta para eliminar el registro
        $sql = "DELETE FROM personas WHERE id_persona = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Registro eliminado exitosamente.";
        } else {
            echo "Error al eliminar el registro: " . $conn->error;
        }
    } else {
        echo "ID no válido.";
    }

    $conn->close();
} else {
    echo "Método no permitido.";
}
?>
