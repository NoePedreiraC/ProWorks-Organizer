<?php
/*
idMaterial
nombreMaterial
tipoMaterial
*/

function agregarMaterial($nombreMaterial, $tipoMaterial){
    $mysqli=conecta();
    // Now search the DB to see if a record with this info already exists:
	$preSQL = "SELECT * FROM material ";
	$preSQL.= "WHERE nombreMaterial = '$nombreMaterial' ";
	$preSQL.= "AND tipoMaterial = '$tipoMaterial' ";
	$preSQL.= "LIMIT 1";


    $check = $mysqli->query($preSQL);
	if (!$check) {
		die('There was an error running the [PRE] query agregarMaterial [' . $mysqli->error . ']');
	}

    if ($check->num_rows > 0) {
		$row = mysqli_fetch_array($check);
		$Id = $row['idMaterial'];
	}

    else {
		
		$sql="INSERT INTO material ( nombreMaterial, tipoMaterial)";
		$sql.=" VALUES ( '$nombreMaterial', '$tipoMaterial')";
	
		
    	if(!$result = $mysqli->query($sql)){
       		die('Ha ocurrido un error ejecutando la sentencia agregarMaterial [' . $mysqli->error . ']');
    	}
    $Id = $mysqli->insert_id;
	}
	desconecta($mysqli);
	return $Id;
}

function modificarMaterial($idMaterial, $nombreMaterial, $tipoMaterial){
	//estaAutorizado();
	$sql="UPDATE material SET ";
	$sql.= "nombreMaterial = '$nombreMaterial', "; 
	$sql.= "tipoMaterial = '$tipoMaterial' ";
	$sql.= "WHERE idMaterial = $idMaterial";
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia modificarMaterial[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

function eliminarMaterial($idMaterial){
	//estaAutorizado();
	$sql = "DELETE FROM material WHERE idMaterial = $idMaterial LIMIT 1"; 
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia eliminarMarerial[' . $db->error . ']');
	}
	desconecta($db);
	return $result;
}

function obtenerMateriales($tipoMaterial){
	if ($tipoMaterial==""){
		$sql = "SELECT * FROM material";
	}else{
		$sql = "SELECT * FROM material WHERE tipoMaterial = '$tipoMaterial'"; 
	}
	$db=conecta();
	if(!$result = $db->query($sql)){
		die('Ha ocurrido un error ejecutando la sentencia obtenerMateriales[' . $db->error . ']');
	}
	desconecta($db);
    return $result;
}




?>
