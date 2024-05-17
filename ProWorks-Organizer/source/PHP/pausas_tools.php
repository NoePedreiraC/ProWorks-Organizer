<?php
include "../../include/class/conexion.php";
include "../../include/class/tarea.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idTareaPausa']) && isset($_POST['idTrabajadorPausa']) && isset($_POST['inicioPausa']) && isset($_POST['finPausa']) ) {
        // Obtener los datos recibidos
        
        $idTareaPausa = $_POST['idTareaPausa'];
        $idTrabajadorPausa = $_POST['idTrabajadorPausa'];
        $inicioPausa = $_POST['inicioPausa'];
        $finPausa = isset($_POST['finPausa']) ? $_POST['finPausa'] : null;
      
        echo "Datos recibidos:\n";
        echo "idTareaPausa: $idTareaPausa\n";
        echo "idTrabajadorPausa: $idTrabajadorPausa\n";
        echo "inicioPausa: $inicioPausa\n";
        echo "finPausa: $finPausa\n";

       
        agregarPausa($idTareaPausa,$idTrabajadorPausa, $inicioPausa, $finPausa,  );
    } else {
        echo "Error: Faltan datos en la solicitud POST.";
    }
} else {
    echo "Error: Se esperaba una solicitud POST.";
}
?>
