<?php
include "../../include/class/conexion.php";
include "../../include/class/tarea.php";
include "../../include/class/material.php";
include "../../include/class/maquina.php";

$json = json_encode($_POST);
$data = json_decode($json, true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = isset($_POST['accion']) ? $_POST['accion'] : null;

    switch ($accion) {
        case 'nuevo':
            // Obtener los datos recibidos
            $idTrabajo_Tarea = $_POST['idTrabajo_Tarea'];
            $idPadre_Tarea = isset($_POST['idPadre_Tarea']) ? $_POST['idPadre_Tarea'] : null;
            $idDepartamento_Tarea = $_POST['idDepartamento_Tarea'];
            $idCreador_Tarea = $_POST['idCreador_Tarea'];
            $rutaArchivos_Tarea = isset($_POST['rutaArchivos_Tarea']) ? $_POST['rutaArchivos_Tarea'] : null;
            $nombre_Tarea = $_POST['nombre_Tarea'];
            $unidadesArchivo_Tarea = isset($_POST['unidadesArchivo_Tarea']) ? $_POST['unidadesArchivo_Tarea'] : null;
            $unidadesTotales_Tarea = isset($_POST['unidadesTotales_Tarea']) ? $_POST['unidadesTotales_Tarea'] : null;
            $cadena_Tarea = $_POST['cadena_Tarea'];
            $idCliente_Tarea = $_POST['idCliente_Tarea'];
            $concepto_Tarea = isset($_POST['concepto_Tarea']) ? $_POST['concepto_Tarea'] : null;
            $fechaCreacion_Tarea = isset($_POST['fechaCreacion_Tarea']) ? $_POST['fechaCreacion_Tarea'] : null;
            $fechaInicio_Tarea = isset($_POST['fechaInicio_Tarea']) ? $_POST['fechaInicio_Tarea'] : null;
            $fechaFin_Tarea = isset($_POST['fechaFin_Tarea']) ? $_POST['fechaFin_Tarea'] : null;
            $tiempoExtra_Tarea = isset($_POST['tiempoExtra_Tarea']) ? $_POST['tiempoExtra_Tarea'] : null;
            $observaciones_Tarea = isset($_POST['observaciones_Tarea']) ? $_POST['observaciones_Tarea'] : null;

            $idTareaNueva=agregarTarea($idTrabajo_Tarea, $idPadre_Tarea, $idDepartamento_Tarea, $idCreador_Tarea, $rutaArchivos_Tarea, $nombre_Tarea,  $unidadesArchivo_Tarea, $unidadesTotales_Tarea, $cadena_Tarea, $idCliente_Tarea, $concepto_Tarea, $fechaCreacion_Tarea, $fechaInicio_Tarea, $fechaFin_Tarea, $tiempoExtra_Tarea, $observaciones_Tarea);

/*  */
            // Agregar material si se proporcionan los datos necesarios
            if (isset($_POST['nombre_Material']) && isset($_POST['tipo_Material'])) {
                $nombreMaterial = $_POST['nombre_Material'];
                $tipoMaterial = $_POST['tipo_Material'];

                $idMaterial = obtenerIdMaterialPorNombreYTipo($nombreMaterial, $tipoMaterial);

                if ($idMaterial == -1)
                    $idMaterial = agregarMaterial($nombreMaterial,$tipoMaterial);
                agregarTareaMaterial($idTareaNueva,$idMaterial);
            }


            // Agregar máquina si se proporciona el nombre
            if (isset($_POST['nombreMaquina'])) {
                $nombreMaquina = $_POST['nombreMaquina'];

                $idMaquina = obtenerIdMaquinaPorNombre($nombreMaquina);

                if ($idMaquina == -1)
                   $idMaquina = agregarMaquina($nombreMaquina);
                agregarTareaMaquina($idTareaNueva,$idMaquina);
            }
            
        break;

        case 'eliminar':
            if (isset($_POST['Id'])) {
                $idTarea = $_POST['Id'];
                if (eliminarTarea($idTarea)) {
                    echo "La tarea con ID $idTarea ha sido eliminada.";
                } else {
                    echo "Error al intentar eliminar la tarea con ID $idTarea.";
                }
            } else {
                echo "Error: Se esperaba el ID de la tarea a eliminar en la solicitud POST.";
            }
        break;

        case 'consulta':
            if (isset($_POST['idTarea'])) {
                $idTarea = $_POST['idTarea'];
                $tarea = devolverTarea($idTarea);
                if ($tarea) {
                    $data = array();
                    foreach ($tarea as $campo => $valor) {
                        $data[$campo] = $valor;
                    }
                    $pausas = obtenerPausasPorIdDeTarea($idTarea); 
                    if ($pausas) {
                        $arrayPausas = array();
                        while ($row = $pausas->fetch_assoc()) {
                            $arrayPausas[] = $row;
                        }
                        $data['pausas'] = $arrayPausas;
                    } else {
                        $data['pausas'] = array();
                    }
                    echo json_encode($data);

                } else {
                    echo json_encode(array("error" => "No se encontró ninguna tarea con ID $idTarea."));
                }
            } else {
                echo json_encode(array("error" => "Error: Se esperaba el ID de la tarea en la solicitud POST."));
            }
        break;

        case 'modificar':
            if (isset($_POST['idTarea'])) {
                $idTarea = $_POST['idTarea'];
                $idPadre_Tarea = isset($_POST['idPadre_Tarea']) ? $_POST['idPadre_Tarea'] : null;
                $idDepartamento_Tarea = $_POST['idDepartamento_Tarea'];
                $idTrabajo_Tarea = $_POST['idTrabajo_Tarea'];
                $idCreador_Tarea = $_POST['idCreador_Tarea'];
                $rutaArchivos_Tarea = isset($_POST['rutaArchivos_Tarea']) ? $_POST['rutaArchivos_Tarea'] : null;
                $nombre_Tarea = $_POST['nombre_Tarea'];
                $unidadesArchivo_Tarea = isset($_POST['unidadesArchivo_Tarea']) ? $_POST['unidadesArchivo_Tarea'] : null;
                $unidadesTotales_Tarea = isset($_POST['unidadesTotales_Tarea']) ? $_POST['unidadesTotales_Tarea'] : null;
                $cadena_Tarea = $_POST['cadena_Tarea'];
                $idCliente_Tarea = $_POST['idCliente_Tarea'];
                $concepto_Tarea = isset($_POST['concepto_Tarea']) ? $_POST['concepto_Tarea'] : null;
                $fechaCreacion_Tarea = isset($_POST['fechaCreacion_Tarea']) ? $_POST['fechaCreacion_Tarea'] : null;
                $fechaInicio_Tarea = isset($_POST['fechaInicio_Tarea']) ? $_POST['fechaInicio_Tarea'] : null;
                $fechaFin_Tarea = isset($_POST['fechaFin_Tarea']) ? $_POST['fechaFin_Tarea'] : null;
                $tiempoExtra_Tarea = isset($_POST['tiempoExtra_Tarea']) ? $_POST['tiempoExtra_Tarea'] : null;
                $observaciones_Tarea = isset($_POST['observaciones_Tarea']) ? $_POST['observaciones_Tarea'] : null;


                
                // Modificar la tarea
                if (modificarTarea($idTarea, $idTrabajo_Tarea, $idPadre_Tarea, $idDepartamento_Tarea, $idCreador_Tarea, $rutaArchivos_Tarea, $nombre_Tarea, $unidadesArchivo_Tarea, $unidadesTotales_Tarea, $cadena_Tarea, $idCliente_Tarea, $concepto_Tarea, $fechaCreacion_Tarea, $fechaInicio_Tarea, $fechaFin_Tarea, $tiempoExtra_Tarea, $observaciones_Tarea)) {
                    echo "La tarea con ID $idTarea ha sido modificada.";
                } else {
                    echo "Error al intentar modificar la tarea con ID $idTarea.";
                }
            } else {
                echo "Error: Se esperaba el ID de la tarea a modificar en la solicitud POST.";
            }

        break;
//____________________________________________________________

        case 'obtenerTareas':
            $idPadre = isset($_POST['idPadre']) ? $_POST['idPadre'] : null;
            $tareas = obtenerTareas($idPadre);

            if ($tareas) {
                $rows = array();
                while ($tarea = mysqli_fetch_object($tareas)) {
                    $rows[] = $tarea;
                }
                echo json_encode($rows);
            } else {
                echo json_encode(array("error" => "No se encontraron tareas."));
            }
        break;
//____________________________________________________________

    case 'obtenerMaterialesPorTipo':
        // Obtener y devolver las MaterialesPorTipo
        $tipoMaterial = isset($_POST['tipoMaterial']) ? $_POST['tipoMaterial'] : "";
        $materiales = obtenerMateriales($tipoMaterial); 
        $rows = array();
        while ($tipoMaterial = mysqli_fetch_object($materiales)) {
            $rows[] = $tipoMaterial->tipoMaterial;
        }
        $materiales->close();
        echo json_encode($rows);
    break;
  
//____________________________________________________________
        case 'obtenerTipoMateriales':
            // Obtener y devolver los materiales
            $tipoMateriales = obtenerTipoMateriales();
            $rows = array();
            while ($tipoMaterial = mysqli_fetch_object($tipoMateriales)) {
                $rows[] = $tipoMaterial->tipoMaterial;
            }
            $tipoMateriales->close();
            echo json_encode($rows);
        break;

    
        case 'obtenerMaquinas':
            // Obtener y devolver las máquinas
            $maquinas = obtenerMaquinas(); 
            $rows = array();
            while ($maquina = mysqli_fetch_object($maquinas)) {
                $rows[] = $maquina->nombreMaquina;
            }
            $maquinas->close();
            echo json_encode($rows);
        break;

//_________________________________________________________________________


        case 'obtenerMaterialesTarea':
            $idTarea = $_POST['idTarea'];
            $rows = array();
            $materialestarea = obtenerMaterialTareaPorId($idTarea);

            while($materialTarea= mysqli_fetch_object($materialestarea)){
                $rows[] =  obtenerMaterialPorId($materialTarea->idMaterial_TareMate)->nombreMaterial;
                //$rows[] =$material->idMaterial_TareMate;
            }       
            //$materiales->close();
            echo json_encode($rows);
           
        break;
//___________________________________________________________________________________________________________       
case 'actualizarFechaInicioTarea':
    $idTarea = isset($_POST['idTarea']) ? $_POST['idTarea'] : null;
    $fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaInicio'] : null;

    if ($idTarea !== null && $fechaInicio !== null) {
        if (actualizarFechaInicioTarea($conexion, $idTarea, $fechaInicio)) {
            $fechaInicio_Tarea = isset($_POST['fechaInicio_Tarea']) ? $_POST['fechaInicio_Tarea'] : null;
            // Modificar la tarea con la nueva fecha de inicio
            if (actualizarFechaInicioTarea($conexion, $idTarea, $fechaInicio_Tarea)) {
                echo "La tarea con ID $idTarea ha sido modificada.";
            } else {
                echo "Error al intentar modificar la tarea con ID $idTarea.";
            }
            echo "La fecha de inicio de la tarea ha sido registrada en la base de datos.";
        } else {
            echo "Error: No se pudo registrar la fecha de inicio de la tarea en la base de datos.";
        }
    }
    break;

//___________________________________________________________________________________________________________       

    case 'actualizarFechaFinTarea':
        $idTarea = isset($_POST['idTarea']) ? $_POST['idTarea'] : null;
        $fechaFin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : null;

        if ($idTarea !== null && $fechaFin !== null) {
            if (devolverTarea($idTarea)) { 
                // Modificar la tarea con la nueva fecha de inicio
                if (actualizarFechaFinTarea( $idTarea, $fechaFin)) 
                    echo "La tarea con ID $idTarea ha sido modificada.";
                 else 
                    echo "Error al intentar modificar la tarea con ID $idTarea. ";
                
                echo "La fecha de fin de la tarea ha sido registrada en la base de datos. ";
            } else {
                echo "Error: No se pudo registrar la fecha de fin de la tarea en la base de datos.";
            }
        }
    break;
//___________________________________________________________________________________________________________    
        

//___________________________________________________________________________________________________________    

    
    default:
        echo "Error: Operación no válida.";
    break;
    }
}
    
     else {
        echo "Error: Se esperaba una solicitud POST.";
}
?>