<?php
/*
idMaquina
idDepartamentoMaquina 
nombreMaquina
marcaMaquina
modeloMaquina	

*/


function agregarMaquina($nombreMaquina, $marcaMaquina, $modeloMaquina, $idDepartamentoMaquina){
    $mysqli=conecta();
    // Now search the DB to see if a record with this info already exists:
	$preSQL = "SELECT * FROM maquina ";
	$preSQL.= "WHERE nombreMaquina = '$nombreMaquina' "; 
	$preSQL.= "AND marcaMaquina = '$marcaMaquina' ";  
    $preSQL.= $modeloMaquina ? "AND modeloMaquina = '$modeloMaquina' " : ""; 
	$preSQL.= $idDepartamentoMaquina ? "AND idDepartamentoMaquina = $idDepartamentoMaquina " : ""; 
	$preSQL.= "LIMIT 1";

    $check = $mysqli->query($preSQL);
	if (!$check) {
		die('There was an error running the [PRE] query agregarMaquina [' . $mysqli->error . ']');
	}

    if ($check->num_rows > 0) { 
		$row = mysqli_fetch_array($check);
		$Id = $row['idMaquina']; 
	} 
	else {
		
		$sql="INSERT INTO maquina ( nombreMaquina, marcaMaquina, modeloMaquina, idDepartamentoMaquina)";
		$sql.=" VALUES ( '$nombreMaquina', '$marcaMaquina', ".($modeloMaquina ? "'$modeloMaquina'" : "NULL").", ".($idDepartamentoMaquina ? $idDepartamentoMaquina : "NULL").")";
	
		if(!$result = $mysqli->query($sql)){
			die('Ha ocurrido un error ejecutando la sentencia agregarMaquina [' . $mysqli->error . ']');
		}
		$Id = $mysqli->insert_id;
	}
	desconecta($mysqli);
	return $Id; 
}


function modificarMaquina($idMaquina, $nombreMaquina, $marcaMaquina, $modeloMaquina, $idDepartamentoMaquina){
	//estaAutorizado();
	$sql="UPDATE maquina SET ";
	$sql.= "nombreMaquina = '$nombreMaquina', ";  
	$sql.= "marcaMaquina = '$marcaMaquina', ";  
    $sql .= "modeloMaquina = " . ($modeloMaquina ? "'$modeloMaquina'" : "NULL") . ", ";  
	$sql .= "idDepartamentoMaquina = " . ($idDepartamentoMaquina ? "$idDepartamentoMaquina" : "NULL") . " ";
	$sql.= "WHERE idMaquina = $idMaquina";
	$db=conecta();
	echo $sql;
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia modificarMaquina[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

function eliminarMaquina($idMaquina){
	//estaAutorizado();
	$sql = "DELETE FROM maquina WHERE idMaquina = $idMaquina LIMIT 1"; 
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia eliminarDepartamento[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

function obtenerMaquinas(){
    $sql = "SELECT * FROM maquina"; 
    $db = conecta();
    if(!$result = $db->query($sql)){
        die('Ha ocurrido un error ejecutando la sentencia obtenerMaquinas[' . $db->error . ']');
    }
    desconecta($db);
    return $result; 
}

function obtenerMaquinasPorId(){
	$sql = "SELECT * FROM maquinas WHERE idMaquina = '$nuevoIdMaquina'";
    $db = conecta();
    $result = mysqli_query($db, $sql);
    
    if (mysqli_num_rows($result) == 0) {
        agregarMaquina($nuevoIdMaquina);
    }
}
?>