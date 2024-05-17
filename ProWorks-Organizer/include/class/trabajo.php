<?php
/*
idTrabajador -> idTrabajo
nombreTrabajador -> nombreTrabajo

*/

function agregarTrabajo($nombreTrabajo){
	$mysqli=conecta();
	// Now search the DB to see if a record with this info already exists:
	$preSQL = "SELECT * FROM  trabajo ";
    $preSQL .= $nombreTrabajo ? "WHERE nombreTrabajo = '$nombreTrabajo' " : "";
	$preSQL.= "LIMIT 1";

	$check = $mysqli->query($preSQL);
	if (!$check) {
		die('There was an error running the [PRE] query agregarDepartamento [' . $mysqli->error . ']');
	}

	if ($check->num_rows > 0) {
		$row = mysqli_fetch_array($check);
		$id = $row['idTrabajo'];
	}
	else {
		$sql="INSERT INTO  trabajo (nombreTrabajo)";
		$sql.=" VALUES ('$nombreTrabajo')";
		
		//$sql="INSERT INTO  trabajo (nombreTrabajo)";
		//$sql.=" VALUES ($nombreTrabajo)";

		if(!$result = $mysqli->query($sql)){
			die('Ha ocurrido un error ejecutando la sentencia agregarDepartamento [' . $mysqli->error . ']');
		}
		$id = $mysqli->insert_id;
	}
	desconecta($mysqli);
	return $id;
}

function modificarTrabajo($idTrabajo, $nombreTrabajo){
	//estaAutorizado();
	$sql="UPDATE  trabajo SET ";
    $sql .= "nombreTrabajo = " . ($nombreTrabajo ? "'$nombreTrabajo'" : "NULL") . " ";
	$sql.= "WHERE idTrabajo = $idTrabajo";
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia modificarDepartamento[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

function eliminarTrabajo($idTrabajo){
	//estaAutorizado();
	$sql = "DELETE FROM  trabajo WHERE idTrabajo = $idTrabajo LIMIT 1";
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia eliminarDepartamento[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

?>
