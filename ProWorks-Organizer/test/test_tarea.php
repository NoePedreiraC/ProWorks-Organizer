<?php 
echo "Estas son Pruebas <br>";
include "../include/class/conexion.php";
include "../include/class/departamento.php";
include "../include/class/maquina.php";
include "../include/class/material.php";
include "../include/class/tarea.php";
include "../include/class/trabajador.php";
include "../include/class/trabajo.php"; 


// CREACIÓN MAQUINAS

/*
echo "Llamada 1";
$Id1 = agregarMaquina("Nombre1", "Marca1", "Modelo1", 1);
echo "Id de la máquina agregada 1: $Id1 <br>";

echo "Llamada 2";
$Id2 = agregarMaquina("Nombre2", "Marca2", "Modelo2", 2);
echo "Id de la máquina agregada 2: $Id2 <br>";

echo "Llamada 3";
$Id3 = agregarMaquina("Nombre3", "Marca3", "Modelo3", 3);
echo "Id de la máquina agregada 3: $Id3 <br>";

echo "Llamada 4";
$Id4 = agregarMaquina("Nombre4", "Marca4", "Modelo4", 4);
echo "Id de la máquina agregada 4: $Id4 <br>";

echo "Llamada 5";
$Id5 = agregarMaquina("Nombre5", "Marca5", "Modelo5", 3);
echo "Id de la máquina agregada 5: $Id5 <br>";



// ELIMINACIÓN MAQUINAS


echo "Eliminación 1 <br>";

$IdMaquinaAEliminar = 1 ; 
$resultadoEliminacion = eliminarMaquina($IdMaquinaAEliminar);

if ($resultadoEliminacion) {
    echo "La máquina con ID $IdMaquinaAEliminar ha sido eliminada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar eliminar la máquina con ID $IdMaquinaAEliminar.";
}


// MODIFICACIÓN MAQUINAS

echo "Modificación 1 <br>";


$IdMaquinaAModificar = 11 ;
$nuevoNombre = "NombreM";
$nuevaMarca = "MarcaM";
$nuevoModelo = "ModeloM";
$nuevoIdDepartamento = 2;
$resultadoModificacion = modificarMaquina($IdMaquinaAModificar, $nuevoNombre, $nuevaMarca, $nuevoModelo, $nuevoIdDepartamento);

if ($resultadoModificacion) {
    echo "La máquina con ID $IdMaquinaAModificar ha sido modificada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar modificar la máquina con ID $IdMaquinaAModificar.";
}

*/
/*
//CREACIÓN TAREA

echo "Llamada 1";
$Id1 = agregarTarea( 1, 1, 1, 1, "RutaArchivo1", "Nombre1", "Cadena1", 22, 33,  "Clientes1", "Concepto1", '2024-04-02 09:25', '2024-04-02 09:25', '2024-04-03 07:30', 20, "Observaciones1");
echo "Id de la máquina agregada 1: $Id1 <br>";

echo "Llamada 2";
$Id2 = agregarTarea( 2, 2, 2, 2, "RutaArchivo2", "Nombre2", "Cadena2", 222, 333,  "Clientes2", "Concepto2", '2024-04-02 09:25', '2024-04-02 09:25', '2024-04-03 07:30', 22, "Observaciones2");
echo "Id de la máquina agregada 2: $Id2 <br>";

echo "Llamada 3";
$Id3 = agregarTarea( 3, 3, 3, 3, "RutaArchivo3", "Nombre3", "Cadena3", 23, 32,  "Clientes3", "Concepto3", '2024-04-02 09:25', '2024-04-02 09:25', '2024-04-03 07:30', 23, "Observaciones3");
echo "Id de la máquina agregada 3: $Id3 <br>";

echo "Llamada 4";
$Id4 = agregarTarea( 4, 4, 4, 4, "RutaArchivo4", "Nombre4", "Cadena4", 24, 34,  "Clientes4", "Concepto4", '2024-04-02 09:25', '2024-04-02 09:25', '2024-04-03 07:30', 24, "Observaciones4");
echo "Id de la máquina agregada 4: $Id4 <br>";

echo "Llamada 5";
$Id5 = agregarTarea( 5, 5, 5, 5, "RutaArchivo5", "Nombre5", "Cadena5", 25, 35,  "Clientes5", "Concepto5", '2024-04-02 09:25', '2024-04-02 09:25', '2024-04-03 07:30', 25, "Observaciones5");
echo "Id de la máquina agregada 5: $Id1 <br>";


// ELIMINACIÓN TAREA

echo "Eliminación 1 <br>";

$IdTareaAEliminar = 0 ; 
$resultadoEliminacion = eliminarTarea($IdTareaAEliminar);

if ($resultadoEliminacion) {
    echo "La tarea con ID $IdTareaAEliminar ha sido eliminada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar eliminar la tarea con ID $IdTareaAEliminar.";
}

// MODIFICACIÓN TAREA

echo "Modificación 1 <br>";


$idTareaAModificar = 45 ;
$nuevoIdTrabajo = 6;
$nuevoIdPadre = 6;
$nuevoIdDepartamento = 6;
$nuevoIdCreador = 6;
$nuevaRutaArchivo = "ArchivoM";
$nuevoNombre = "NombreM";
$nuevaCadena = "CadenaM";
$nuevoUnidadesArchivo = 6;
$nuevoUnidadesTotales = 6;
$nuevoClientes = "ClienteM";
$nuevoConcepto = "ConceptoM";
$nuevaFechaCreacion = '2022-04-02 09:09';
$nuevaFechaInicio = '2022-04-02 09:09';
$nuevaFechaFin = '2022-05-02 10:10:10';
$nuevoTiempoExtra = 14;
$nuevoObservaciones = "ObservacionM";

$resultadoModificacion = modificarTarea($idTareaAModificar, $nuevoIdTrabajo, $nuevoIdPadre, $nuevoIdDepartamento, $nuevoIdCreador, $nuevaRutaArchivo, $nuevoNombre, $nuevaCadena, $nuevoUnidadesArchivo, $nuevoUnidadesTotales, $nuevoClientes, $nuevoConcepto, $nuevaFechaCreacion, $nuevaFechaInicio, $nuevaFechaFin, $nuevoTiempoExtra, $nuevoObservaciones);

if ($resultadoModificacion) {
    echo "La máquina con ID $idTareaAModificar ha sido modificada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar modificar la máquina con ID $idTareaAModificar.";
}

*/
/*
//CREACIÓN PAUSAS

echo "Llamada 1";
$Id1 = agregarPausa( 1, 1, '2024-04-02', '2024-04-03');
echo "Id de la pausa agregada 1: $Id1 <br>";

echo "Llamada 2";
$Id2 = agregarPausa( 2, 2, '2024-04-01 09:25:10', '2024-04-02 07:30:10');
echo "Id de la pausa agregada 1: $Id2 <br>";

echo "Llamada 3";
$Id3 = agregarPausa( 3, 3, '2024-03-02 09:25:10', '2024-03-03 07:30:10');
echo "Id de la pausa agregada 1: $Id3 <br>";


//ELIMINACIÓN PAUSA

echo "Eliminación 1 <br>";

$IdPausaAEliminar = 3 ; 
$resultadoEliminacion = eliminarPausa($IdPausaAEliminar);

if ($resultadoEliminacion) {
    echo "La tarea con ID $IdPausaAEliminar ha sido eliminada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar eliminar la tarea con ID $IdTareaAEliminar.";
}


//MODIFICACIÓN PAUSA
echo "Modificación 1 <br>";

$IdPausaAModificar = 2 ;
$nuevoIdTarea = 6;
$nuevoIdTrabajador = 6;
$nuevoInicioPausa = '2022-04-02 09:09:09';
$nuevoFinPausa = '2022-05-02 10:10:10';

$resultadoModificacion = modificarPausa($IdPausaAModificar, $nuevoIdTarea, $nuevoIdTrabajador, $nuevoInicioPausa, $nuevoFinPausa);

if ($resultadoModificacion) {
    echo "La máquina con ID $IdPausaAModificar ha sido modificada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar modificar la máquina con ID $IdPausaAModificar.";
}
*/
/*
//CREACION TAREAMATERIAL

 
echo "Llamada 1";
$Id1 = agregarTareaMaterial( 1, 1, 20, 20.5, "Comentario1" );
echo "Id de la TareaMaterial 1: $Id1 <br>";

echo "Llamada 2";
$Id2 = agregarTareaMaterial( 2, 2, 30, 29.5, "Comentario2" );
echo "Id de la TareaMaterial 1: $Id2 <br>";

echo "Llamada 3";
$Id3 = agregarTareaMaterial( 3, 3, 23, 24, "Comentario3" );
echo "Id de la TareaMaterial 1: $Id3 <br>";

echo "Llamada 4";
$Id4 = agregarTareaMaterial( 4, 4, 43, 43, "Comentario4" );
echo "Id de la TareaMaterial 1: $Id4 <br>";

//ELIMINACIÓN TAREAMATERIAL

echo "Eliminación 1 <br>";

$IdTareaMaterialAEliminar = 4 ; 
$resultadoEliminacion = eliminarTareaMaterial($IdTareaMaterialAEliminar);

if ($resultadoEliminacion) {
    echo "La tarea con ID $IdTareaMaterialAEliminar ha sido eliminada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar eliminar la tarea con ID $IdTareaMaterialAEliminar.";
}

//MODIFICACIÓN TAREAMATERIAL

echo "Modificación 1 <br>";

$IdTareaMaterialAModificar = 2 ;
$nuevoIdTarea = 6;
$nuevoIdMaterial = 6;
$nuevoMaterialPrevisto = 10;
$nuevoMaterialUtilizado = 10.5;
$nuevoComentario = "ComentarioM";

$resultadoModificacion = modificarTareaMaterial($IdTareaMaterialAModificar, $nuevoIdTarea, $nuevoIdMaterial, $nuevoMaterialPrevisto, $nuevoMaterialUtilizado, $nuevoComentario);

if ($resultadoModificacion) {
    echo "La máquina con ID $IdTareaMaterialAModificar ha sido modificada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar modificar la máquina con ID $IdTareaMaterialAModificar.";
}
*/

/*
//CREACIÓN MATERIAL

echo "Llamada 1";
$Id1 = agregarMaterial( "Nombre1", "Material1" );
echo "Id del Material 1: $Id1 <br>";

echo "Llamada 2";
$Id2 = agregarMaterial( "Nombre2", "Material2" );
echo "Id del Material 2: $Id2 <br>";

echo "Llamada 3";
$Id3 = agregarMaterial( "Nombre3", "Material3" );
echo "Id del Material 3: $Id3 <br>";

echo "Llamada 4";
$Id4 = agregarMaterial( "Nombre4", "Material4" );
echo "Id del Material 4: $Id4 <br>";


//ELIMINACIÓN MATERIAL

echo "Eliminación 1 <br>";

$IdMaterialAEliminar = 4 ; 
$resultadoEliminacion = eliminarMaterial($IdMaterialAEliminar);

if ($resultadoEliminacion) {
    echo "La tarea con ID $IdMaterialAEliminar ha sido eliminada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar eliminar la tarea con ID $IdMaterialAEliminar.";
}

//MODIFICACIÓN MATERIAL

echo "Modificación 1 <br>";

$IdMaterialAModificar = 2 ;
$nuevoNombre = "NombreM";
$nuevoTipoMaterial = "MaterialM";


$resultadoModificacion = modificarMaterial($IdMaterialAModificar, $nuevoNombre, $nuevoTipoMaterial);

if ($resultadoModificacion) {
    echo "La máquina con ID $IdMaterialAModificar ha sido modificada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar modificar la máquina con ID $IdMaterialAModificar.";
}
*/
/*
//CREACIÓN DEPARTAMENTO
echo "Llamada 1 <br>";
$Id1 = agregarDepartamento( "Nombre1", 1, 1 );
echo "El Id del Departamento 1: $Id1 <br>";

echo "Llamada 2 <br>";
$Id2 = agregarDepartamento( "Nombre2", 2, 2 );
echo "El Id del Departamento : $Id2 <br>";

echo "Llamada 3 <br>";
$Id3 = agregarDepartamento( "Nombre3", 3, 3 );
echo "El Id del Departamento : $Id3 <br>";

echo "Llamada 4 <br>";
$Id4 = agregarDepartamento( "Nombre4", 4, 4 );
echo "El Id del Departamento : $Id4 <br>";


//ELIMINACIÓN DEPARTAMENTO

echo "Eliminación 1 <br>";

$IdDepartamentoAEliminar = 4 ; 
$resultadoEliminacion = eliminarDepartamento($IdDepartamentoAEliminar);

if ($resultadoEliminacion) {
    echo "La tarea con ID $IdDepartamentoAEliminar ha sido eliminada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar eliminar la tarea con ID $IdDepartamentoAEliminar.";
} 

//MODIFICACIÓN DEPARTAMENTO

echo "Modificación 1 <br>";

$IdDepartamentoAModificar = 2 ;
$nuevoNombreDept = "NombreM";
$nuevoNivelPrivDept = 9;
$nuevoOrdenApartDept = 9;


$resultadoModificacion = modificarDepartamento($IdDepartamentoAModificar, $nuevoNombreDept, $nuevoNivelPrivDept, $nuevoOrdenApartDept);

if ($resultadoModificacion) {
    echo "El Departamento con ID $IdDepartamentoAModificar ha sido modificada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar modificar la máquina con ID $IdDepartamentoAModificar.";
}
*/
/* 
// CREACIÓN PAUSA TRABAJADOR
echo "Llamada 1 <br>";
$Id1 = agregarTareaTrabajador(1, 1, '2022-04-02 09:09', '2022-04-02 09:09', 10);
echo "El Id de la Tarea del Trabajador 1: $Id1 <br>";

echo "Llamada 2 <br>";
$Id2 = agregarTareaTrabajador(2, 2, '2022-04-02 10:10', '2022-04-02 10:20', 5);
echo "El Id de la Tarea del Trabajador 2: $Id2 <br>";

echo "Llamada 3 <br>";
$Id3 = agregarTareaTrabajador(4, 4, '2022-04-02 11:11', '2022-04-02 11:30', 15);
echo "El Id de la Tarea del Trabajador 3: $Id3 <br>";


// MODIFICACIÓN PAUSA TRABAJADOR
echo "Modificación 1 <br>";

$IdTarea = 1;
$IdTrabajador = 1;
$InicioTareaTrabajador = '2022-04-02 09:00';
$FinTareaTrabajador = '2022-04-02 17:00';
$TiempoExtra = 0;

$resultadoModificacion = modificarTareaTrabajador($IdTarea, $IdTrabajador, $InicioTareaTrabajador, $FinTareaTrabajador, $TiempoExtra);

if ($resultadoModificacion) {
    echo "La tarea del trabajador con ID $IdTrabajador ha sido modificada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar modificar la tarea del trabajador con ID $IdTrabajador.";
}


  
echo "Eliminación 1 <br>";

$IdTareaAEliminar = 3; 
$IdTrabajadorAEliminar = 1;
$resultadoEliminacion = eliminarTareaTrabajador($IdTareaAEliminar, $IdTrabajadorAEliminar);

if ($resultadoEliminacion) {
    echo "La tarea del trabajador con ID $IdTrabajadorAEliminar ha sido eliminada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar eliminar la tarea del trabajador con ID $IdTrabajadorAEliminar.";
}

*/
/*
// CREACIÓN DEPARTAMENTO TRABAJADOR
echo "Llamada 1 <br>";
$Id1 = agregarDepartamentoTrabajador(1, 1 );
echo "Se ha creado el Id del departamento del Trabajador 1: $Id1 <br>";

echo "Llamada 2 <br>";
$Id2 = agregarDepartamentoTrabajador(2, 2 );
echo "Se ha creado el Id del departamento del Trabajador 2: $Id2 <br>";

echo "Llamada 3 <br>";
$Id3 = agregarDepartamentoTrabajador(4, 4 );
echo "Se ha creado el Id del departamento del Trabajador 3: $Id3 <br>";


// MODIFICACIÓN DEPARTAMENTO TRABAJADOR
echo "Modificación 1 <br>";

$idDepaTraba = 1;
$idDepartamento_DepaTraba = 1;
$idTrabajador_DepaTraba = 1;

$resultadoModificacion = modificarDepartamentoTrabajador($idDepaTraba, $idDepartamento_DepaTraba, $idTrabajador_DepaTraba);

if ($resultadoModificacion) {
    echo "La tarea del trabajador con ID $idDepaTraba ha sido modificada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar modificar la tarea del trabajador con ID $idDepaTraba.";
}

// ELIMINACIÓN DEPARTAMENTO TRABAJADOR 
  
echo "Eliminación 1 <br>";

$idDepartamentoAEliminar = 3; 
$resultadoEliminacion = eliminarDepartamentoTrabajador( $idDepartamentoAEliminar);

if ($resultadoEliminacion) {
    echo "La tarea del trabajador con ID $idDepartamentoAEliminar ha sido eliminada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar eliminar la tarea del trabajador con ID $idDepartamentoAEliminar.";
}
*/
/*
// CREACIÓN DEPARTAMENTO TRABAJADOR
echo "Llamada 1 <br>";
$Id1 = agregarDepartamentoTrabajador(1, 1 );
echo "Se ha creado el Id del departamento del Trabajador 1: $Id1 <br>";

echo "Llamada 2 <br>";
$Id2 = agregarDepartamentoTrabajador(2, 2 );
echo "Se ha creado el Id del departamento del Trabajador 2: $Id2 <br>";

echo "Llamada 3 <br>";
$Id3 = agregarDepartamentoTrabajador(4, 4 );
echo "Se ha creado el Id del departamento del Trabajador 3: $Id3 <br>";


// MODIFICACIÓN DEPARTAMENTO TRABAJADOR
echo "Modificación 1 <br>";

$idDepaTraba = 1;
$idDepartamento_DepaTraba = 1;
$idTrabajador_DepaTraba = 1;

$resultadoModificacion = modificarDepartamentoTrabajador($idDepaTraba, $idDepartamento_DepaTraba, $idTrabajador_DepaTraba);

if ($resultadoModificacion) {
    echo "La tarea del trabajador con ID $idDepaTraba ha sido modificada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar modificar la tarea del trabajador con ID $idDepaTraba.";
}

// ELIMINACIÓN DEPARTAMENTO TRABAJADOR 
  
echo "Eliminación 1 <br>";

$idDepartamentoAEliminar = 3; 
$resultadoEliminacion = eliminarDepartamentoTrabajador( $idDepartamentoAEliminar);

if ($resultadoEliminacion) {
    echo "La tarea del trabajador con ID $idDepartamentoAEliminar ha sido eliminada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar eliminar la tarea del trabajador con ID $idDepartamentoAEliminar.";
}

// CREACIÓN DEPARTAMENTO TRABAJADOR
echo "Llamada 1 <br>";
$Id1 = agregarTareaAgrupada(1, 1, 22, "Obsdervaciones1" );
echo "Se ha creado el Id del departamento del Trabajador 1: $Id1 <br>";

echo "Llamada 2 <br>";
$Id2 = agregarDepartamentoTrabajador(2, 2 );
echo "Se ha creado el Id del departamento del Trabajador 2: $Id2 <br>";

echo "Llamada 3 <br>";
$Id3 = agregarDepartamentoTrabajador(4, 4 );
echo "Se ha creado el Id del departamento del Trabajador 3: $Id3 <br>";


// MODIFICACIÓN DEPARTAMENTO TRABAJADOR
echo "Modificación 1 <br>";

$idTarea = 1;
$idTrabajador = 1;
$tiempoTotal = 22;
$observaciones = "ObservacionesM";

$resultadoModificacion = modificarDepartamentoTrabajador($idTarea, $idTrabajador, $tiempoTotal, $observaciones);

if ($resultadoModificacion) {
    echo "La tarea del trabajador con ID $idTarea ha sido modificada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar modificar la tarea del trabajador con ID $idTarea.";
}

// ELIMINACIÓN DEPARTAMENTO TRABAJADOR 
  
echo "Eliminación 1 <br>";

$idDepartamentoAEliminar = 3; 
$resultadoEliminacion = eliminarDepartamentoTrabajador( $idDepartamentoAEliminar);

if ($resultadoEliminacion) {
    echo "La tarea del trabajador con ID $idDepartamentoAEliminar ha sido eliminada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar eliminar la tarea del trabajador con ID $idDepartamentoAEliminar.";
}
*/

/*
//CREACION TAREAMATERIAL

echo "Llamada 1";
$Id1 = agregarTareaMaquina( 1, 1, "Comentario1" );
echo "Id de la TareaMaterial 1: $Id1 <br>";

echo "Llamada 2";
$Id2 = agregarTareaMaquina( 2, 2, "Comentario2" );
echo "Id de la TareaMaterial 1: $Id2 <br>";

echo "Llamada 3";
$Id3 = agregarTareaMaquina( 3, 3, "Comentario3" );
echo "Id de la TareaMaterial 1: $Id3 <br>";

echo "Llamada 4";
$Id4 = agregarTareaMaquina( 4, 4, "Comentario4" );
echo "Id de la TareaMaterial 1: $Id4 <br>";

//ELIMINACIÓN TAREAMATERIAL

echo "Eliminación 1 <br>";

$IdTareaMaquinaAEliminar = 4 ; 
$resultadoEliminacion = eliminarTareaMaterial($IdTareaMaquinaAEliminar);

if ($resultadoEliminacion) {
    echo "La tarea con ID $IdTareaMaquinaAEliminar ha sido eliminada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar eliminar la tarea con ID $IdTareaMaquinaAEliminar.";
}

//MODIFICACIÓN TAREAMATERIAL

echo "Modificación 1 <br>";

$IdTareaMauinaAModificar = 2 ;
$nuevoIdTarea = 6;
$nuevoIdMaterial = 6;
$nuevoComentario = "ComentarioM";

$resultadoModificacion = modificarTareaMaquina ($IdTareaMauinaAModificar, $nuevoIdTarea, $nuevoIdMaterial,  $nuevoComentario);

if ($resultadoModificacion) {
    echo "La máquina con ID $IdTareaMauinaAModificar ha sido modificada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar modificar la máquina con ID $IdTareaMauinaAModificar.";
}
*/
/* 
//CREACION TRABAJADOR

echo "Llamada 1";
$Id1 = agregarTrabajador('Trabajador1');
echo "Id de la Trabajador 1: $Id1 <br>";

echo "Llamada 2";
$Id2 = agregarTrabajador('Trabajador2');
echo "Id de la Trabajador 2: $Id2 <br>";

echo "Llamada 3";
$Id3 = agregarTrabajador('Trabajador3');
echo "Id de la Trabajador 3: $Id3 <br>";

echo "Llamada 4";
$Id4 = agregarTrabajador('Trabajador4');
echo "Id de la Trabajador 4: $Id4 <br>";


//ELIMINACIÓN TRABAJADOR

echo "Eliminación 1 <br>";

$IdTrabajador = 4 ; 
$resultadoEliminacion = eliminarTareaMaterial($IdTrabajador);

if ($resultadoEliminacion) {
    echo "El trabajador con ID $IdTrabajador ha sido eliminada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar eliminar el trabajador con ID $IdTrabajador.";
}


//MODIFICACIÓN TRABAJADOR

echo "Modificación 1 <br>";

$idTrabajadorAModificar = 2 ;
$nuevoNombretrabajador = "TrabajadorM";

$resultadoModificacion = modificarTrabajador ($idTrabajadorAModificar, $nuevoNombretrabajador);

if ($resultadoModificacion) {
    echo "La máquina con ID $idTrabajadorAModificar ha sido modificada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar modificar la máquina con ID $idTrabajadorAModificar.";
}


//CREACION TRABAJO

echo "Llamada 1";
$Id1 = agregarTrabajo('Trabajo1');
echo "Id de la Trabajo 1: $Id1 <br>";

echo "Llamada 2";
$Id2 = agregarTrabajo('Trabajo2');
echo "Id de la Trabajo 2: $Id2 <br>";

echo "Llamada 3";
$Id3 = agregarTrabajo('Trabajo3');
echo "Id de la Trabajo 3: $Id3 <br>";

echo "Llamada 4";
$Id4 = agregarTrabajo('Trabajo4');
echo "Id de la Trabajo 4: $Id4 <br>";


//ELIMINACIÓN TRABAJO

echo "Eliminación 1 <br>";

$IdTrabajo = 4 ; 
$resultadoEliminacion = eliminarTrabajo($IdTrabajo);

if ($resultadoEliminacion) {
    echo "El trabajador con ID $IdTrabajo ha sido eliminada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar eliminar el trabajador con ID $IdTrabajo.";
}


//MODIFICACIÓN TRABAJO

echo "Modificación 1 <br>";

$idTrabajoAModificar = 2 ;
$nuevoNombretrabajo = "TrabajadorM";

$resultadoModificacion = modificarTrabajo ($idTrabajoAModificar, $nuevoNombretrabajo);

if ($resultadoModificacion) {
    echo "La máquina con ID $idTrabajoAModificar ha sido modificada correctamente.";
} else {
    echo "Ha ocurrido un error al intentar modificar la máquina con ID $idTrabajoAModificar.";
}
*/
?>