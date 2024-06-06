  <?php
  include "../../include/class/conexion.php";
  include "../../include/class/tarea.php";

  function obtenerTareasHijo($tareaPadre){
    $tareas = obtenerTareas($tareaPadre);
    while ($tarea = mysqli_fetch_object($tareas)){
      echo '<tr class="hija" id="botonEArchivoT'.$tarea->idTarea .'">';
      echo '<td class="hidden" id="idT'. $tarea->idTarea .'">' . '</td>'; 
      echo '<td class="hidden">' . $tarea->idPadre_Tarea . '</td>';
      echo '<td class="hidden">' .$tarea->idTrabajo_Tarea. '</td>'; 
      echo '<td class="hidden">' . $tarea->idDepartamento_Tarea . '</td>';
      echo '<td class="hidden">' . $tarea->idCreador_Tarea . '</td>';
      echo '<td class="hidden" id="rutaArchivoT'.$tarea->idTarea .'">' . $tarea->rutaArchivos_Tarea . '</td>';
  
    
      
      echo '<td onclick="viewRow($(this))" id="botonEArchivoT' . $tarea->idTarea . '" name="nombreTareaT' . $tarea->idTarea . '">' . $tarea->nombre_Tarea . '</td>';      
      echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'" >' . $tarea->unidadesArchivo_Tarea . '</td>';
      echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'" >' . $tarea->unidadesTotales_Tarea . '</td>';
      echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'">' . $tarea->cadena_Tarea . '</td>';
      echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'">' . $tarea->idCliente_Tarea . '</td>';
      echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'">' . $tarea->concepto_Tarea . '</td>';
      echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'">' . $tarea->fechaCreacion_Tarea . '</td>';
      echo '<td class="hidden">' . $tarea->fechaInicio_Tarea . '</td>';
      echo '<td class="hidden">' . $tarea->fechaFin_Tarea . '</td>';
      echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'" >' . $tarea->tiempoExtra_Tarea . '</td>';
      echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'"> <div class="scroll-div"> ' . $tarea->observaciones_Tarea . '</div></td>';
      obtenerTareasHijo($tarea->idTarea);
      
        echo '</tr>'; 
    }
  }

  // Mostrar los datos de las tareas en una tabla
  echo '<table class="tareas-table">';
  echo '<thead>';
  echo '</thead>';
  echo '<tbody>';

  $tareas = obtenerTareas(null);
  while ($tarea = mysqli_fetch_object($tareas)){
    echo '<tr>';
    echo '<tr class="padre" id="botonEArchivoT'.$tarea->idTarea .'">';
    echo '<td class="hidden" id="idT'. $tarea->idTarea .'">' . '</td>'; 
    echo '<td class="hidden">' . $tarea->idPadre_Tarea . '</td>';
    echo '<td class="hidden">' .$tarea->idTrabajo_Tarea. '</td>'; 
    echo '<td class="hidden">' . $tarea->idDepartamento_Tarea . '</td>';
    echo '<td class="hidden">' . $tarea->idCreador_Tarea . '</td>';
    echo '<td class="hidden" id="rutaArchivoT'.$tarea->idTarea .'">' . $tarea->rutaArchivos_Tarea . '</td>';

  
    
    echo '<td onclick="viewRow($(this))"  id="botonEArchivoT'. $tarea->idTarea .'" >' . $tarea->nombre_Tarea . '</td>';
    echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'" >' . $tarea->unidadesArchivo_Tarea . '</td>';
    echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'" >' . $tarea->unidadesTotales_Tarea . '</td>';
    echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'">' . $tarea->cadena_Tarea . '</td>';
    echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'">' . $tarea->idCliente_Tarea . '</td>';
    echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'">' . $tarea->concepto_Tarea . '</td>';
    echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'">' . $tarea->fechaCreacion_Tarea . '</td>';
    echo '<td class="hidden">' . $tarea->fechaInicio_Tarea . '</td>';
    echo '<td class="hidden">' . $tarea->fechaFin_Tarea . '</td>';
    echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'" >' . $tarea->tiempoExtra_Tarea . '</td>';
    echo '<td onclick="viewRow($(this))" id="botonEArchivoT'. $tarea->idTarea .'"> <div class="scroll-div"> ' . $tarea->observaciones_Tarea . '</div></td>';
    obtenerTareasHijo($tarea->idTarea);
    
      echo '</tr>'; 
  }


  echo '</tbody>';
  echo '</table>';
  ?>
