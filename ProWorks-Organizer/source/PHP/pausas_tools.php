<?php
include "../../include/class/conexion.php";
include "../../include/class/tarea.php";

$dataToReturn = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        switch ($accion) {
            case 'agregarPausa':
                if (isset($_POST['idTareaPausa']) && isset($_POST['idTrabajadorPausa']) && isset($_POST['inicioPausa'])) {
                    $idTareaPausa = $_POST['idTareaPausa'];
                    $idTrabajadorPausa = $_POST['idTrabajadorPausa'];
                    $inicioPausa = $_POST['inicioPausa'];
                    $finPausa = isset($_POST['finPausa']) ? $_POST['finPausa'] : null;

                    echo "Datos recibidos:\n";
                    echo "idTareaPausa: $idTareaPausa\n";
                    echo "idTrabajadorPausa: $idTrabajadorPausa\n";
                    echo "inicioPausa: $inicioPausa\n";
                    echo "finPausa: $finPausa\n";

                    // Aquí deberías llamar a tu función para agregar la pausa
                    $idPausa = agregarPausa($idTareaPausa, $idTrabajadorPausa, $inicioPausa, $finPausa);
                    $dataToReturn['idNuevaPausa'] = $idPausa;
                } else {
                    echo "Error: Faltan datos en la solicitud POST.";
                }
                break;

                case 'actualizarFinPausa':

                    $idPausa = isset($_POST['idPausa']) ? $_POST['idPausa'] : null;
                    $finPausa = isset($_POST['finPausa']) ? $_POST['finPausa'] : null;
    
                    if ($idPausa !== null && $finPausa !== null) {
                        // Llama a la función obtenerPausaPorId para obtener los detalles de la pausa
                        $pausa = obtenerPausaPorId($idPausa);  
                        if ($pausa) {
                            $idTareaPausa = $pausa->idTareaPausa;
                            $idTrabajadorPausa = $pausa->idTrabajadorPausa;
                            $inicioPausa = $pausa->inicioPausa;
                            $pausabd = obtenerPausaPorId($idPausa);
    
                            // Llama a la función modificarPausa para agregar el campo finPausa
                            modificarPausa($idPausa, $idTareaPausa, $idTrabajadorPausa, $inicioPausa, $finPausa);
                            echo "$idPausa";
                            echo "Se actualizó correctamente el fin de la pausa en la base de datos.";
                        } else {
                            echo "Error: No se pudo encontrar la pausa en la base de datos.";
                        }
                    } else {
                        echo "Error: Faltan datos necesarios para actualizar el fin de la pausa.";
                    }
                break;

                case 'obtenerTodasLasPausas':
                    // Obtener el ID de la tarea de la solicitud POST, si está presente
                    $idTarea = isset($_POST['idTarea']) ? $_POST['idTarea'] : null;
                
                    // Variable para almacenar la suma de los tiempos
                    $sumaTiempo = 0;
                    echo "idTareaPausa: $idTarea \n";
                    if ($idTarea !== null) {
                        // Obtener las pausas por el ID de la tarea
                        $pausasT = obtenerPausasPorIdDeTarea($idTarea);
                
                        // Verificar si se obtuvo un resultado válido
                        if ($pausasT) {
                            // Inicializar el contador de días consecutivos
                            $diasConsecutivos = 0;
                            // Variable para almacenar la fecha del día anterior
                            $fechaAnterior = null;
                
                            // Iterar sobre los resultados y calcular la suma de los tiempos
                            while ($pausa = mysqli_fetch_object($pausasT)) {
                                // Obtener la fecha de inicio y fin de la pausa
                                $inicioPausa = strtotime($pausa->inicioPausa);
                                $finPausa = strtotime($pausa->finPausa);
                            
                                // Verificar si la pausa comienza y termina en días distintos
                                if (date('Y-m-d', $inicioPausa) < date('Y-m-d', $finPausa)) {
                                    // Calcular la diferencia de días
                                    $diasInicio = date('Y-m-d', $inicioPausa);
                                    $diasFin = date('Y-m-d', $finPausa);
                                    $diasDiferencia = (strtotime($diasFin) - strtotime($diasInicio)) / (60 * 60 * 24);
                            
                                    // Sumar la diferencia de días a diasConsecutivos
                                    $diasConsecutivos += $diasDiferencia;
                                }
                                echo $diasConsecutivos;
                            
                                // Calcular la duración de la pausa
                                $duracionPausa = $finPausa - $inicioPausa;
                            
                                // Sumar la duración de la pausa a $sumaTiempo
                                $sumaTiempo += $duracionPausa;
                            }
                            
                            // Restar 16 horas multiplicadas por días consecutivos al sumaTiempo
                            $sumaTiempo -= (16 * 3600 * $diasConsecutivos);

                            echo "Fecha inicio: $inicioPausa Milisegundos \n";
                            echo "Fecha Fin: $finPausa Milisegundos \n";
                            echo "dias consecutivos: $diasConsecutivos \n";
                
                            // Cerrar el conjunto de resultados
                            mysqli_free_result($pausasT);
                
                            // Devolver el resultado
                            // echo "La suma de los tiempos de las pausas es: $sumaTiempo segundos";
                            $dataToReturn['totalTiempoPausas'] = $sumaTiempo;
                            $dataToReturn['diasConsecutivos'] = $diasConsecutivos;
                        } else {
                            // Si no se obtuvo un resultado válido, mostrar un mensaje de error
                            // echo "Error: No se pudieron obtener las pausas de la base de datos.";
                            $dataToReturn['error'] = "Error: No se pudieron obtener las pausas de la base de datos.";
                        }
                    } else {
                        // Si no se especificó el ID de la tarea, mostrar un mensaje de error
                        echo "Error: No se especificó el ID de la tarea para obtener las pausas.";
                        $dataToReturn['error'] = "Error: No se especificó el ID de la tarea para obtener las pausas.";
                    }
                break;      

            default:
                echo "Error: Acción no reconocida en la solicitud POST.";
        }
    } else {
        echo "Error: No se especificó ninguna acción en la solicitud POST.";
    }
} else {
    echo "Error: Se esperaba una solicitud POST.";
}

echo "ENDOFALERTS";
echo json_encode($dataToReturn);

?>
