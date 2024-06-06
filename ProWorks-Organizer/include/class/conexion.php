<?php
    //LOCAL
	define("SERVIDOR","localhost");
	define("BD", "local"); // CAMBIAR A LA HORA DE LLEVARLO A PRODUCCION 
	define("USUARIO","root"); // CAMBIAR A LA HORA DE LLEVARLO A PRODUCCION 
	define("PASSW", "1234"); // CAMBIAR A LA HORA DE LLEVARLO A PRODUCCION 

	function conecta($year=""){
		if (date("Y")==$year) $year="";
		if ($year=="") $mysqli = new mysqli(SERVIDOR,USUARIO,PASSW,BD);
		else $mysqli = new mysqli(SERVIDOR,USUARIO,PASSW,BD."_".$year);
		if ($mysqli->connect_errno) {
    		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		if (!$mysqli->set_charset("utf8")) {
			echo "Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error;
		}
		return $mysqli;
	}

	function desconecta($mysqli){
		$mysqli->close();
	}
	
?>
