<?php
include 'conexion.php';

// Consulta para obtener los datos de la tabla
$sql = "SELECT * FROM personas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_persona']}</td> <!-- Cambia a 'id_persona' si ese es el nombre correcto -->
                <td>{$row['appaterno']}</td>
                <td>{$row['apmaterno']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['fdn']}</td>
                <td>{$row['curp']}</td>
                <td>{$row['sexo']}</td>
                <td>
                    <button class='btn btn-warning btnEditar' data-id='{$row['id_persona']}'>Editar</button>
                    <button class='btn btn-danger btnEliminar' data-id='{$row['id_persona']}'>Eliminar</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No hay registros.</td></tr>";
}

$conn->close();
?>
