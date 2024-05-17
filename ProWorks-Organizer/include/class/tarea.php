<?php
/*
idTarea 
idTrabajo_Tarea
idPadre_Tarea
idDepartamento_Tarea
idCreador_Tarea 
rutaArchivos_Tarea
nombre_Tarea
cadena_Tarea	
unidadesArchivo_Tarea
unidadesTotales_Tarea -
idCliente_Tarea
concepto_Tarea
fechaCreacion_Tarea
fechaInicio_Tarea
fechaFin_Tarea
tiempoExtra_Tarea
observaciones_Tarea
*/

function agregarTarea($idTrabajo_Tarea, $idPadre_Tarea, $idDepartamento_Tarea, $idCreador_Tarea, $rutaArchivos_Tarea, $nombre_Tarea, $unidadesArchivo_Tarea, $unidadesTotales_Tarea, $cadena_Tarea, $idCliente_Tarea, $concepto_Tarea, $fechaCreacion_Tarea, $fechaInicio_Tarea, $fechaFin_Tarea, $tiempoExtra_Tarea, $observaciones_Tarea) {
    $mysqli = conecta();
    
    // Construcción de la consulta SQL teniendo en cuenta los campos nulos
    $sql = "INSERT INTO tarea (idTrabajo_Tarea, idPadre_Tarea, idDepartamento_Tarea, idCreador_Tarea, rutaArchivos_Tarea, nombre_Tarea, unidadesArchivo_Tarea, unidadesTotales_Tarea, cadena_Tarea, idCliente_Tarea, concepto_Tarea, fechaCreacion_Tarea, fechaInicio_Tarea, fechaFin_Tarea, tiempoExtra_Tarea, observaciones_Tarea)";
    $sql .= " VALUES ('$idTrabajo_Tarea', " . ($idPadre_Tarea ? "'$idPadre_Tarea'" : "NULL") . ", '$idDepartamento_Tarea', $idCreador_Tarea ," . ($rutaArchivos_Tarea ? "'$rutaArchivos_Tarea'" : "NULL") . ", '$nombre_Tarea', '$unidadesArchivo_Tarea', " . ($unidadesTotales_Tarea ? "'$unidadesTotales_Tarea'" : "NULL") . ",'$cadena_Tarea', '$idCliente_Tarea', " . ($concepto_Tarea ? "'$concepto_Tarea'" : "NULL") . ", " . ($fechaCreacion_Tarea ? "'$fechaCreacion_Tarea'" : "NULL") . ", " . ($fechaInicio_Tarea ? "'$fechaInicio_Tarea'" : "NULL") . ", " . ($fechaFin_Tarea ? "'$fechaFin_Tarea'" : "NULL") . ", " . ($tiempoExtra_Tarea ? "'$tiempoExtra_Tarea'" : "NULL") . ", " . ($observaciones_Tarea ? "'$observaciones_Tarea'" : "NULL") . ")";

    if(!$result = $mysqli->query($sql)){
        die('Ha ocurrido un error ejecutando la sentencia agregarTarea [' . $mysqli->error . ']');
    }
    $idTarea = $mysqli->insert_id;
    desconecta($mysqli);
    return $idTarea;
}


function devolverTarea($idTarea) {
    $mysqli = conecta();

    $sql = "SELECT * FROM tarea WHERE idTarea = '$idTarea'";

    if(!$result = $mysqli->query($sql)){
        die('Ha ocurrido un error ejecutando la consulta devolverTarea [' . $mysqli->error . ']');
    }

    if($result->num_rows === 0) {
        return array("error" => "No se encontró ninguna tarea con ese ID");
    }

    $tarea = $result->fetch_assoc();

    desconecta($mysqli);
    return $tarea;
}

function modificarTarea($idTarea, $idTrabajo_Tarea, $idPadre_Tarea, $idDepartamento_Tarea, $idCreador_Tarea, $rutaArchivos_Tarea, $nombre_Tarea, $unidadesArchivo_Tarea, $unidadesTotales_Tarea, $cadena_Tarea, $idCliente_Tarea, $concepto_Tarea, $fechaCreacion_Tarea, $fechaInicio_Tarea, $fechaFin_Tarea, $tiempoExtra_Tarea, $observaciones_Tarea) {
    $mysqli = conecta();
    
    // Construcción de la consulta SQL para actualizar los campos nulos
    $sql = "UPDATE tarea SET ";
    $sql .= "idPadre_Tarea = " . ($idPadre_Tarea ? "'$idPadre_Tarea'" : "NULL") . ", ";
    $sql .= "idTrabajo_Tarea = $idTrabajo_Tarea, ";
    $sql .= "idDepartamento_Tarea = $idDepartamento_Tarea, ";
    $sql .= "idCreador_Tarea = '$idCreador_Tarea', ";
    $sql .= "rutaArchivos_Tarea = " . ($rutaArchivos_Tarea ? "'$rutaArchivos_Tarea'" : "NULL") . ", ";
    $sql .= "nombre_Tarea = '$nombre_Tarea', ";
    $sql .= "unidadesArchivo_Tarea = " . ($unidadesArchivo_Tarea ? "'$unidadesArchivo_Tarea'" : "NULL") . ", ";
    $sql .= "unidadesTotales_Tarea = " . ($unidadesTotales_Tarea ? "'$unidadesTotales_Tarea'" : "NULL") . ", ";
    $sql .= "cadena_Tarea = $cadena_Tarea, ";
    $sql .= "idCliente_Tarea = '$idCliente_Tarea', ";
    $sql .= "concepto_Tarea = " . ($concepto_Tarea ? "'$concepto_Tarea'" : "NULL") . ", ";
    $sql .= "fechaCreacion_Tarea = " . ($fechaCreacion_Tarea ? "'$fechaCreacion_Tarea'" : "NULL") . ", ";
    $sql .= "fechaInicio_Tarea = " . ($fechaInicio_Tarea ? "'$fechaInicio_Tarea'" : "NULL") . ", ";
    $sql .= "fechaFin_Tarea = " . ($fechaFin_Tarea ? "'$fechaFin_Tarea'" : "NULL") . ", ";
    $sql .= "tiempoExtra_Tarea = " . ($tiempoExtra_Tarea ? "'$tiempoExtra_Tarea'" : "NULL") . ", ";
    $sql .= "observaciones_Tarea = " . ($observaciones_Tarea ? "'$observaciones_Tarea'" : "NULL") . " ";
    $sql .= "WHERE idTarea ='$idTarea' ";
    echo $sql;
    if(!$result = $mysqli->query($sql)){
        die('Ha ocurrido un error ejecutando la sentencia modificarTarea [' . $mysqli->error . ']');
    }
    desconecta($mysqli);
    return $result;
}

function eliminarTarea($idTarea) {
    $mysqli = conecta();
    
    // Escapar el valor de $idTarea para evitar inyecciones de SQL " se le agrega una barra invertida delante para que no se interprete como parte de una instrucción SQL maliciosa."
    $idTarea = $mysqli->real_escape_string($idTarea);
    
    $sql = "DELETE FROM tarea WHERE idTarea = '$idTarea' LIMIT 1";
    
    if(!$result = $mysqli->query($sql)){
        die('Ha ocurrido un error ejecutando la sentencia eliminarTarea [' . $mysqli->error . ']');
    }
    desconecta($mysqli);
    return $result;
}

function obtenerTareas($idPadre){
    if (is_null($idPadre)) 
        $sql = "SELECT * FROM tarea WHERE idPadre_Tarea IS NULL";
    else 
        $sql = "SELECT * FROM tarea WHERE idPadre_Tarea = $idPadre";
    $db = conecta();
    if(!$result = $db->query($sql)){
        die('Ha ocurrido un error ejecutando la sentencia obtenerTareas[' . $db->error . ']');
    }
    desconecta($db);
    return $result;
}

/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*
idPausa
idTareaPausa
idTrabajadorPausa
inicioPausa
finPausa
*/

function agregarPausa($idTareaPausa, $idTrabajadorPausa, $inicioPausa, $finPausa){
    $mysqli=conecta();
    // Now search the DB to see if a record with this info already exists:
	$preSQL = "SELECT * FROM registro_pausa_tarea ";
	$preSQL.= "WHERE idTareaPausa = $idTareaPausa ";
    $preSQL.= "AND idTrabajadorPausa = '$idTrabajadorPausa' ";
	$preSQL.= "AND inicioPausa = '$inicioPausa' ";
    $preSQL.= $finPausa ? "AND finPausa = '$finPausa' " : "";  
	$preSQL.= "LIMIT 1";

    $check = $mysqli->query($preSQL);
	if (!$check) {
		die('There was an error running the [PRE] query agregarPausa [' . $mysqli->error . ']');
	}
	
    if ($check->num_rows > 0) {
		$row = mysqli_fetch_array($check);
		$idTarea = $row['idPausa'];
	}
    else {
		
		$sql="INSERT INTO registro_pausa_tarea (idTareaPausa, idTrabajadorPausa, inicioPausa, finPausa)";
		$sql.=" VALUES ( $idTareaPausa, '$idTrabajadorPausa', '$inicioPausa', " . ($finPausa ? "'$finPausa'" : "NULL") . ")";

		if(!$result = $mysqli->query($sql)){
			die('Ha ocurrido un error ejecutando la sentencia agregarPausa [' . $mysqli->error . ']');
		}
		$idTarea = $mysqli->insert_id;
	}
	desconecta($mysqli);
	return $idTarea;
}



function modificarPausa($IdPausa, $idTareaPausa,$idTrabajadorPausa, $InicioPausa, $FinPausa){
	//estaAutorizado();
	$sql="UPDATE registro_pausa_tarea SET ";
	$sql.= "idTareaPausa = $idTareaPausa, "; 
    $sql.= "idTrabajadorPausa = $idTrabajadorPausa, ";
	$sql.= "InicioPausa = '$InicioPausa', ";
    $sql .= "FinPausa = " . ($FinPausa ? "'$FinPausa'" : "NULL") . " ";
	$sql.= "WHERE IdPausa = $IdPausa";
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia modificarPausa[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

function eliminarPausa($IdPausa){
	//estaAutorizado();
	$sql = "DELETE FROM registro_pausa_tarea WHERE IdPausa = $IdPausa LIMIT 1"; 
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia eliminarPausa[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}
function obtenerPausaPorId($IdPausa){
	$sql = "SELECT * FROM tarea WHERE IdPausa = $IdPausa"; 
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia obtenerPausaPorId[' . $db->error . ']');
	}
	desconecta($db);
	return mysqli_fetch_object($result);
}

/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*
idTareMate 
idTarea_TareMate
idMaterial_TareMate
materialPrevisto_TareMate
materialUtilizado_TareMate
comentario_TareMate
*/

function agregarTareaMaterial($idTarea_TareMate, $idMaterial_TareMate, $materialPrevisto_TareMate, $materialUtilizado_TareMate, $comentario_TareMate){
    $mysqli = conecta();
    
    // Buscar en la base de datos si ya existe un registro con esta información:
    $preSQL = "SELECT * FROM tarea_material ";
    $preSQL .= "WHERE idTarea_TareMate = $idTarea_TareMate ";
    $preSQL .= "AND idMaterial_TareMate = $idMaterial_TareMate ";
    $preSQL .= $materialPrevisto_TareMate ? "AND materialPrevisto_TareMate = '$materialPrevisto_TareMate' " : "";
    $preSQL .= $materialUtilizado_TareMate ? "AND materialUtilizado_TareMate = '$materialUtilizado_TareMate' " : "";
    $preSQL .= $comentario_TareMate ? "AND comentario_TareMate = '$comentario_TareMate' " : "";
    $preSQL .= "LIMIT 1";

    $check = $mysqli->query($preSQL);
    if (!$check) {
        die('Ha ocurrido un error ejecutando la consulta previa en agregarTareaTrabajador [' . $mysqli->error . ']');
    }
    
    if ($check->num_rows > 0) {
        $row = mysqli_fetch_array($check);
        $idTarea = $row['idTareMate'];
    } else {
       
        $sql = "INSERT INTO tarea_material (idTarea_TareMate, idMaterial_TareMate, materialPrevisto_TareMate, materialUtilizado_TareMate, comentario_TareMate)";
        $sql .= " VALUES ($idTarea_TareMate, $idMaterial_TareMate, '$materialPrevisto_TareMate', $materialUtilizado_TareMate, $comentario_TareMate)";

        if(!$result = $mysqli->query($sql)){
            die('Ha ocurrido un error ejecutando la sentencia agregarTareaTrabajador [' . $mysqli->error . ']');
        }
        $idTarea = $mysqli->insert_id;
    }
    desconecta($mysqli);
    return $idTarea;
}



function modificarTareaMaterial($idTareMate , $idTarea_TareMate, $idMaterial_TareMate, $materialPrevisto_TareMate, $materialUtilizado_TareMate, $comentario_TareMate){
	//estaAutorizado();
	$sql="UPDATE tarea_material SET ";
	$sql.= "idTarea_TareMate = $idTarea_TareMate, ";
	$sql.= "idMaterial_TareMate = $idMaterial_TareMate, "; 
	$sql .= "materialPrevisto_TareMate = " . ($materialPrevisto_TareMate ? "'$materialPrevisto_TareMate'" : "NULL") . ", ";
	$sql .= "materialUtilizado_TareMate = " . ($materialUtilizado_TareMate ? "'$materialUtilizado_TareMate'" : "NULL") . ", ";
    $sql .= "comentario_TareMate = " . ($comentario_TareMate ? "'$comentario_TareMate'" : "NULL") . " "; ;
	$sql.= "WHERE idTareMate  = $idTareMate ";
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia modificarTareaMaterial[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

function eliminarTareaMaterial($idTareMate ){
	//estaAutorizado();
	$sql = "DELETE FROM tarea_material WHERE idTareMate  = $idTareMate  LIMIT 1"; 
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia eliminarTareaMaterial[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}
function obtenerMaterialTareaPorId($idTarea_TareMate ){
	$sql = "SELECT * FROM tarea_material WHERE idTarea_TareMate  = $idTarea_TareMate "; 
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia obtenerMaterialPorId[' . $db->error . ']');
	}
	desconecta($db);
	return ($result);
}

//---------------------------------------------------------------------------------------------------------------------------------------

/*
IdTareaTraba 
idTarea_TareaTraba
idTrabajador_TareaTraba
inicioTareaTrabajador
finTareaTrabajador		
tiempoExtra
*/

function agregarTareaTrabajador($idTarea_TareaTraba, $idTrabajador_TareaTraba, $inicioTareaTrabajador, $finTareaTrabajador, $tiempoExtra) {
    $mysqli = conecta();
    
    // Buscar en la base de datos si ya existe un registro con esta información
    $preSQL = "SELECT * FROM tarea_trabajador ";
    $preSQL .= "WHERE idTarea_TareaTraba = $idTarea_TareaTraba ";
    $preSQL .= "AND idTrabajador_TareaTraba = $idTrabajador_TareaTraba ";
    $preSQL .= "AND inicioTareaTrabajador = '$inicioTareaTrabajador' ";
    $preSQL .= $finTareaTrabajador ? "AND finTareaTrabajador = '$finTareaTrabajador' " : "";  
    $preSQL .= "LIMIT 1";

    $check = $mysqli->query($preSQL);
    if (!$check) {
        die('Ha ocurrido un error ejecutando la consulta previa en agregarTareaTrabajador [' . $mysqli->error . ']');
    }
    
    if ($check->num_rows > 0) {

        return "El registro ya existe";
    } else {
        $sql = "INSERT INTO tarea_trabajador (idTarea_TareaTraba, idTrabajador_TareaTraba, inicioTareaTrabajador, finTareaTrabajador, tiempoExtra)";
        $sql .= " VALUES ($idTarea_TareaTraba, $idTrabajador_TareaTraba, '$inicioTareaTrabajador', ";
        $sql .= $finTareaTrabajador ? "'$finTareaTrabajador'" : "NULL";
        $sql .= ", $tiempoExtra)";

        if(!$result = $mysqli->query($sql)){
            die('Ha ocurrido un error ejecutando la sentencia agregarTareaTrabajador [' . $mysqli->error . ']');
        }
        $idTarea = $mysqli->insert_id;
        desconecta($mysqli);
        return $idTarea;
    }
}



function modificarTareaTrabajador($idTarea_TareaTraba, $idTrabajador_TareaTraba, $inicioTareaTrabajador, $finTareaTrabajador, $tiempoExtra) {
    $sql = "UPDATE tarea_trabajador SET ";
    $sql .= "idTarea_TareaTraba = $idTarea_TareaTraba, "; 
    $sql .= "idTrabajador_TareaTraba = $idTrabajador_TareaTraba, ";
    $sql .= "inicioTareaTrabajador = '$inicioTareaTrabajador', ";
    $sql .= "finTareaTrabajador = " . ($finTareaTrabajador ? "'$finTareaTrabajador'" : "NULL") . ", ";
    $sql .= "tiempoExtra = $tiempoExtra ";
    $sql .= "WHERE idTarea_TareaTraba = $idTarea_TareaTraba ";
    $sql .= "AND idTrabajador_TareaTraba = $idTrabajador_TareaTraba";

    $db = conecta();
    if(!$result = $db->query($sql)) {
        die('Ha ocurrido un error ejecutando la sentencia modificarTareaTrabajador [' . $db->error . ']');
    }
    desconecta($db);
    return $result;
}

function eliminarTareaTrabajador($idTarea_TareaTraba, $idTrabajador_TareaTraba) {
    $sql = "DELETE FROM tarea_trabajador WHERE idTarea_TareaTraba = $idTarea_TareaTraba AND idTrabajador_TareaTraba = $idTrabajador_TareaTraba LIMIT 1"; 
    
    $db = conecta();
    if(!$result = $db->query($sql)){
        die('Ha ocurrido un error ejecutando la sentencia eliminarPausaTrabajador [' . $db->error . ']');
    }
    desconecta($db);
    return $result;
}

//---------------------------------------------------------------------------------------------------------------------------------------

/*
idGrupo  
idTarea
idTrabajador
tiempoTotal
observaciones		
*/

function agregarTareaAgrupada($idTarea, $idTrabajador, $tiempoTotal, $observaciones,) {
    $mysqli = conecta();
    
    // Buscar en la base de datos si ya existe un registro con esta información
    $preSQL = "SELECT * FROM tarea_agrupada ";
    $preSQL .= "WHERE idTarea = $idTarea ";
    $preSQL .= "AND idTrabajador = $idTrabajador ";
    $preSQL .= "AND tiempoTotal = $tiempoTotal ";
    $preSQL .= "AND observaciones = '$observaciones' ";  
    $preSQL .= "LIMIT 1";

    $check = $mysqli->query($preSQL);
    if (!$check) {
        die('Ha ocurrido un error ejecutando la consulta previa en agregarTareaAgrupada [' . $mysqli->error . ']');
    }
    
    if ($check->num_rows > 0) {

        return "El registro ya existe";
    } else {
        $sql = "INSERT INTO tarea_agrupada (idTarea, idTrabajador, tiempoTotal, observaciones)";
        $sql .= " VALUES ($idTarea, $idTrabajador, '$tiempoTotal','$observaciones')";
    

        if(!$result = $mysqli->query($sql)){
            die('Ha ocurrido un error ejecutando la sentencia agregarTareaAgrupada [' . $mysqli->error . ']');
        }
        $idTarea = $mysqli->insert_id;
        desconecta($mysqli);
        return $idTarea;
    }
}

function modificarTareaAgrupada($idGrupo, $idTarea, $idTrabajador, $tiempoTotal, $observaciones) {
    $sql = "UPDATE tarea_agrupada SET ";
    $sql .= "idTarea = $idTarea, "; 
    $sql .= "idTrabajador = $idTrabajador, ";
    $sql .= "idTrabajador = '$idTrabajador', ";
    $sql .= "tiempoTotal = '$tiempoTotal' ";
    $sql .= "observaciones = $observaciones ";
    $sql .= "WHERE idGrupo = $idGrupo ";

    $db = conecta();
    if(!$result = $db->query($sql)) {
        die('Ha ocurrido un error ejecutando la sentencia modificarTareaTrabajador [' . $db->error . ']');
    }
    desconecta($db);
    return $result;
}

function eliminacionTareaAgrupada($idTarea,) {
    $sql = "DELETE FROM tarea_agrupada WHERE idGrupo = $idGrupo LIMIT 1"; 
    
    $db = conecta();
    if(!$result = $db->query($sql)){
        die('Ha ocurrido un error ejecutando la sentencia eliminarPausaTrabajador [' . $db->error . ']');
    }
    desconecta($db);
    return $result;
}


//---------------------------------------------------------------------------------------------------------------------------------------

/*
idTareMaqui   
idTarea_TareMaqui
idmaquina_taremaqui
comentario_TareMaqui (Null)
		
*/

function agregarTareaMaquina($idTarea_TareMaqui, $idmaquina_taremaqui, $comentario_TareMaqui){
    $mysqli = conecta();
    
    // Buscar en la base de datos si ya existe un registro con esta información:
    $preSQL = "SELECT * FROM tarea_maquina ";
    $preSQL .= "WHERE idTarea_TareMaqui = $idTarea_TareMaqui ";
    $preSQL .= "AND idmaquina_taremaqui = $idmaquina_taremaqui ";
    $preSQL .= $comentario_TareMaqui ? "AND comentario_TareMaqui = '$comentario_TareMaqui' " : "";
    $preSQL .= "LIMIT 1";

    $check = $mysqli->query($preSQL);
    if (!$check) {
        die('Ha ocurrido un error ejecutando la consulta previa en agregarTareaMaquina [' . $mysqli->error . ']');
    }
    
    if ($check->num_rows > 0) {
        $row = mysqli_fetch_array($check);
        $idTarea = $row['idTareMaqui'];
    } else {
       
        $sql = "INSERT INTO tarea_maquina (idTarea_TareMaqui, idmaquina_taremaqui, comentario_TareMaqui)";
        $sql .= " VALUES ($idTarea_TareMaqui, $idmaquina_taremaqui, '$comentario_TareMaqui')";

        if(!$result = $mysqli->query($sql)){
            die('Ha ocurrido un error ejecutando la sentencia agregarTareaMaquina [' . $mysqli->error . ']');
        }
        $idTarea = $mysqli->insert_id;
    }
    desconecta($mysqli);
    return $idTarea;
}



function modificarTareaMaquina($idTareMaqui , $idTarea_TareMaqui, $idmaquina_taremaqui, $comentario_TareMaqui){
	//estaAutorizado();
	$sql="UPDATE tarea_maquina SET ";
	$sql.= "idTarea_TareMaqui = $idTarea_TareMaqui, ";
	$sql.= "idmaquina_taremaqui = $idmaquina_taremaqui, "; 
    $sql .= "comentario_TareMaqui = " . ($comentario_TareMaqui ? "'$comentario_TareMaqui'" : "NULL") . " "; ;
	$sql.= "WHERE idTareMaqui  = $idTareMaqui ";
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia modificarTareaMaterial[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

function eliminarTareaMaquina($idTareMaqui ){
	//estaAutorizado();
	$sql = "DELETE FROM tarea_maquina WHERE idTareMaqui  = $idTareMaqui  LIMIT 1"; 
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia eliminarTareaMaterial[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

function obtenerIdMaquinaPorNombre($nombreMaquina) {
    // Verificar si el material ya existe en la base de datos
    $sqlBuscarMaquina = "SELECT idMaquina FROM maquina WHERE nombreMaquina = '$nombreMaquina'";
    $resultBuscarMaquina = $mysqli->query($sqlBuscarMaquina);

    if ($sqlBuscarMaquina->num_rows > 0) {
        // Si el material existe, obtener su ID
        $row = $resultBuscarMaquina->fetch_assoc();
        $idMaquina = $row['idMaquina'];
    } else {
     $idMaquina= -1;
    }
    desconecta($mysqli);
    return $resultTareaMaquina;
}
?>
