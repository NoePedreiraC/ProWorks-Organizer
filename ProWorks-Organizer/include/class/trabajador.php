<?php
/*
idDept -> idTrabajador 
nombreDept -> nombreTrabajador

*/

function agregartrabajador($nombreTrabajador){
	$mysqli=conecta();
	// Now search the DB to see if a record with this info already exists:
	$preSQL = "SELECT * FROM  trabajador ";
	$preSQL.= "WHERE nombreTrabajador = '$nombreTrabajador' ";
	$preSQL.= "LIMIT 1";

	$check = $mysqli->query($preSQL);
	if (!$check) {
		die('There was an error running the [PRE] query agregarDepartamento [' . $mysqli->error . ']');
	}

	if ($check->num_rows > 0) {
		$row = mysqli_fetch_array($check);
		$id = $row['idTrabajador'];
	}
	else {
		$sql="INSERT INTO  trabajador (nombreTrabajador)";
		$sql.=" VALUES ('$nombreTrabajador')";
		
		//$sql="INSERT INTO  trabajador (nombreTrabajador)";
		//$sql.=" VALUES ($nombreTrabajador)";

		if(!$result = $mysqli->query($sql)){
			die('Ha ocurrido un error ejecutando la sentencia agregarDepartamento [' . $mysqli->error . ']');
		}
		$id = $mysqli->insert_id;
	}
	desconecta($mysqli);
	return $id;
}

function modificarTrabajador($idTrabajador, $nombreTrabajador){
	//estaAutorizado();
	$sql="UPDATE  trabajador SET ";
	$sql.= "nombreTrabajador = '$nombreTrabajador' ";
	$sql.= "WHERE idTrabajador = $idTrabajador";
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia modificarDepartamento[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

function eliminarTrabajador($idTrabajador){
	//estaAutorizado();
	$sql = "DELETE FROM  trabajador WHERE idTrabajador = $idTrabajador LIMIT 1";
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia eliminarDepartamento[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

?>
