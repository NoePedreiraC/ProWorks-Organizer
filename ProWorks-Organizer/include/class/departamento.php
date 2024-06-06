<?php
/*
idDept
nombreDept
nivelPrivDept
OrdenApartDept
*/

function agregarDepartamento($nombreDept, $nivelPrivDept, $ordenApartDept){
	$mysqli=conecta();
	// Now search the DB to see if a record with this info already exists:
	$preSQL = "SELECT * FROM departamento ";
	$preSQL.= "WHERE nombreDept = '$nombreDept' ";
	$preSQL.= "AND nivelPrivDept = $nivelPrivDept ";
	$preSQL.= "AND ordenApartDept = $ordenApartDept ";
	$preSQL.= "LIMIT 1";

	$check = $mysqli->query($preSQL);
	if (!$check) {
		die('There was an error running the [PRE] query agregarDepartamento [' . $mysqli->error . ']');
	}

	if ($check->num_rows > 0) {
		$row = mysqli_fetch_array($check);
		$id = $row['idDept'];
	}
	else {
		$sql="INSERT INTO departamento (nombreDept, nivelPrivDept, ordenApartDept)";
		$sql.=" VALUES ('$nombreDept', $nivelPrivDept, $ordenApartDept)";
		
		//$sql="INSERT INTO departamento (nombreDept, nivelPrivDept)";
		//$sql.=" VALUES ($nombreDept, $nivelPrivDept)";

		if(!$result = $mysqli->query($sql)){
			die('Ha ocurrido un error ejecutando la sentencia agregarDepartamento [' . $mysqli->error . ']');
		}
		$id = $mysqli->insert_id;
	}
	desconecta($mysqli);
	return $id;
}

function modificarDepartamento($idDept, $nombreDept, $nivelPrivDept, $ordenApartDept){
	//estaAutorizado();
	$sql="UPDATE departamento SET ";
	$sql.= "nombreDept = '$nombreDept', ";
	$sql.= "nivelPrivDept = $nivelPrivDept, ";
	$sql.= "ordenApartDept = $ordenApartDept ";
	$sql.= "WHERE idDept = $idDept";
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia modificarDepartamento[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

function eliminarDepartamento($idDepartamento){
	//estaAutorizado();
	$sql = "DELETE FROM departamento WHERE idDept = $idDepartamento LIMIT 1";
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia eliminarDepartamento[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

function obtenerDepartamentos(){
	//estaAutorizado();
	$sql = 'SELECT * FROM departamento/* ORDER BY ordenApartDept*/';
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia obtenerDepartamentos[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

function obtenerDepartamentoPorId($idDepartamento){
	$sql = "SELECT * FROM departamento WHERE idDept = $idDepartamento";
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia obtenerDepartamentoPorId[' . $db->error . ']');
	}
	desconecta($db);
	return mysqli_fetch_object($result);
}

// --------------------------------------------------------------------------------------------------------

/*
idDepaTraba
idDepartamento_DepaTraba
idTrabajador_DepaTraba
*/

function agregarDepartamentoTrabajador($idDepartamento_DepaTraba, $idTrabajador_DepaTraba){
	$mysqli=conecta();
	// Now search the DB to see if a record with this info already exists:
	$preSQL = "SELECT * FROM departamento_trabajador ";
	$preSQL.= "WHERE idDepartamento_DepaTraba = '$idDepartamento_DepaTraba' ";
	$preSQL.= "AND idTrabajador_DepaTraba = $idTrabajador_DepaTraba ";
	$preSQL.= "LIMIT 1";

	$check = $mysqli->query($preSQL);
	if (!$check) {
		die('There was an error running the [PRE] query agregarDepartamento [' . $mysqli->error . ']');
	}

	if ($check->num_rows > 0) {
		$row = mysqli_fetch_array($check);
		$id = $row['idDepaTraba'];
	}
	else {
		$sql="INSERT INTO departamento_trabajador (idDepartamento_DepaTraba, idTrabajador_DepaTraba)";
		$sql.=" VALUES ('$idDepartamento_DepaTraba', $idTrabajador_DepaTraba)";
		
		//$sql="INSERT INTO departamento (nombreDept, nivelPrivDept)";
		//$sql.=" VALUES ($nombreDept, $nivelPrivDept)";

		if(!$result = $mysqli->query($sql)){
			die('Ha ocurrido un error ejecutando la sentencia agregarDepartamento [' . $mysqli->error . ']');
		}
		$id = $mysqli->insert_id;
	}
	desconecta($mysqli);
	return $id;
}

function modificarDepartamentoTrabajador($idDepaTraba, $idDepartamento_DepaTraba, $idTrabajador_DepaTraba){
	//estaAutorizado();
	$sql="UPDATE departamento_trabajador SET ";
	$sql.= "idDepartamento_DepaTraba = '$idDepartamento_DepaTraba',";
	$sql.= "idTrabajador_DepaTraba = $idTrabajador_DepaTraba ";
	$sql.= "WHERE idDepaTraba = $idDepaTraba";
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia modificarDepartamento[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

function eliminarDepartamentoTrabajador($idDepaTraba){
	//estaAutorizado();
	$sql = "DELETE FROM departamento_trabajador WHERE idDepaTraba = $idDepaTraba LIMIT 1";
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia eliminarDepartamento[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}
?>
