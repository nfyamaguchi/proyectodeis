<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_persona = $_POST['id_persona'];
    $appaterno = $_POST['appaterno'];
    $apmaterno = $_POST['apmaterno'];
    $nombre = $_POST['nombre'];
    $fdn = $_POST['fdn'];
    $curp = $_POST['curp'];
    $sexo = $_POST['sexo'];

    // Validar campos obligatorios
    if (empty($appaterno) || empty($nombre) || empty($fdn) || empty($curp) || empty($sexo)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    if (empty($id_persona)) {
        // Si no hay ID, agregar un nuevo registro
        $sql = "INSERT INTO personas (appaterno, apmaterno, nombre, fdn, curp, sexo) 
                VALUES ('$appaterno', '$apmaterno', '$nombre', '$fdn', '$curp', '$sexo')";
        if ($conn->query($sql) === TRUE) {
            echo "Persona registrada exitosamente.";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        // Si hay ID, actualizar el registro existente
        $sql = "UPDATE personas SET 
                    appaterno = '$appaterno', 
                    apmaterno = '$apmaterno', 
                    nombre = '$nombre', 
                    fdn = '$fdn', 
                    curp = '$curp', 
                    sexo = '$sexo' 
                WHERE id_persona = $id_persona";
        if ($conn->query($sql) === TRUE) {
            echo "Persona actualizada exitosamente.";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
}
?>
