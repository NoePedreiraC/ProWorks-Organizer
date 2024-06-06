<?php
include "../../include/class/conexion.php";
include "../../include/class/tarea.php";

echo "ha pasado";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "ha pasado";
    if (isset($_POST['idTarea_TareMate'])&& isset($_POST['idMaterial_TareMate']) && isset($_POST['materialPrevisto_TareMate']) && isset($_POST['materialUtilizado_TareMate'])&& isset($_POST['comentario_TareMate']) ) {
        // Obtener los datos recibidos
        
        $idTarea_TareMate = $_POST['idTarea_TareMate'];
        $idMaterial_TareMate = $_POST['idMaterial_TareMate'];
        $materialPrevisto_TareMate = isset($_POST['materialPrevisto_TareMate']) ? $_POST['materialPrevisto_TareMate'] : null;
        $materialUtilizado_TareMate = isset($_POST['materialUtilizado_TareMate']) ? $_POST['materialUtilizado_TareMate'] : null;
        $comentario_TareMate = isset($_POST['comentario_TareMate']) ? $_POST['comentario_TareMate'] : null;
      
        echo "Datos recibidos:\n";
        echo "idTarea_TareMate: $idTarea_TareMate\n";
        echo "idMaterial_TareMate: $idMaterial_TareMate\n";
        echo "materialPrevisto_TareMate: $materialPrevisto_TareMate\n";
        echo "materialUtilizado_TareMate: $materialUtilizado_TareMate\n";
        echo "comentario_TareMate: $comentario_TareMate";
       
        agregarTareaMaterial( $idTarea_TareMate, $idMaterial_TareMate, $materialPrevisto_TareMate, $materialUtilizado_TareMate, $comentario_TareMate);
    } else {
        echo "Error: Faltan datos en la solicitud POST.";
    }
} else {
    echo "Error: Se esperaba una solicitud POST.";
}
?>
