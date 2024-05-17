<?php
include "../../include/class/conexion.php";
include "../../include/class/maquina.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombre']) && isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['iddepartamento'])) {
        // Obtener los datos recibidos

        
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : null;
        $iddepartamento = isset($_POST['iddepartamento']) ? $_POST['iddepartamento'] : null;


        echo "Datos recibidos:\n";
        echo "Nombre: $nombre\n";
        echo "Marca: $marca\n";
        echo "Modelo: $modelo\n";
        echo "IdDepartamento $iddepartamento";
        agregarMaquina($nombre, $marca, $modelo, $iddepartamento);
    } else {
        echo "Error: Faltan datos en la solicitud POST.";
    }
} else {
    echo "Error: Se esperaba una solicitud POST.";
}
?>
