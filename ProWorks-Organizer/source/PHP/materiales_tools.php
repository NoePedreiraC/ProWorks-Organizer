<?php
include "../../include/class/conexion.php";
include "../../include/class/material.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombre']) && isset($_POST['material'])) {
        // Obtener los datos recibidos
        $nombre = $_POST['nombre'];
        $material = $_POST['material'];
        echo "Datos recibidos:\n";
        echo "Nombre: $nombre\n";
        echo "Material: $material\n";
        agregarMaterial($nombre, $material);
    } else {
        echo "Error: Faltan datos en la solicitud POST.";
    }
} else {
    echo "Error: Se esperaba una solicitud POST.";
}
?>
