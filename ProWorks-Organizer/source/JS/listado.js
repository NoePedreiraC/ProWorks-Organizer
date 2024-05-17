var contador = 1;

// Función para hacer una solicitud al archivo PHP y mostrar las tareas
function mostrarTareas() {
    $.ajax({
        url: '../PHP/listado.php',
        type: 'GET',
        success: function(response) {
            // Mostrar las tareas en el elemento con ID "tareas"
            $('#tareas').html(response);
        },
        error: function(xhr, status, error) {
            // Manejar errores en caso de que la solicitud falle
            console.error("Error al cargar las tareas: " + error);
        }
    });
}

// Evento de clic del botón "Guardar" en el formulario del popup
function guardartarea(){
    //console.log("click");
    // Obtener los valores del formulario del popup

    var nombre_Tarea = $('#nombre_Tarea').val();
    var unidadesArchivo_Tarea = $('#unidadesArchivo_Tarea').val();
    var unidadesTotales_Tarea = $('#unidadesTotales_Tarea').val();
    var cadena_Tarea = $('#cadena_Tarea').val();
    var idCliente_Tarea = $('#idCliente_Tarea').val();
    var concepto_Tarea = $('#concepto_Tarea').val();
    var fechaCreacion_Tarea = $('#fechaCreacion_Tarea').val();
    var fechaInicio_Tarea = $('#fechaInicio_Tarea').val();
    var fechaFin_Tarea = $('#fechaFin_Tarea').val();
    var tiempoExtra_Tarea = $('#tiempoExtra_Tarea').val();
    var observaciones_Tarea = $('#observaciones_Tarea').val();
    var materialTarea = $('materialTarea').val();
    var materialTareaTipo = $('materialTareaTipo').val();
    var maquinaTarea = $('maquinaTarea').val();
   
    if( nombre_Tarea != '' && cadena_Tarea != '' && idCliente_Tarea != ''){
        var elemento = '<li>' + contador + '  nombre_Tarea: ' + nombre_Tarea +  '  unidadesArchivo_Tarea: ' + unidadesArchivo_Tarea +  '  unidadesTotales_Tarea: ' + unidadesTotales_Tarea +  '  cadena_Tarea: ' + cadena_Tarea + '  idCliente_Tarea: ' + idCliente_Tarea +  '  concepto_Tarea: ' + concepto_Tarea +  '  fechaCreacion_Tarea: ' + fechaCreacion_Tarea +  '  fechaInicio_Tarea: ' + fechaInicio_Tarea +  '  fechaFin_Tarea: ' + fechaFin_Tarea +  '  tiempoExtra_Tarea: ' + tiempoExtra_Tarea +  '  observaciones_Tarea: ' + observaciones_Tarea +   '  maquinaTarea: ' + maquinaTarea +   '  materialTarea: ' + materialTarea + 'materialTareaTipo' +materialTareaTipo + '</li>';
        $('#listaElementos').append(elemento);
        contador++;
        $('#nombre_Tarea').val('');
        $('#unidadesArchivo_Tarea').val('');
        $('#unidadesTotales_Tarea').val('')
        $('#cadena_Tarea').val('');
        $('#idCliente_Tarea').val('');
        $('#concepto_Tarea').val('');
        $('#fechaCreacion_Tarea').val('');
        $('#fechaInicio_Tarea').val('');
        $('#fechaFin_Tarea').val('');
        $('#tiempoExtra_Tarea').val('');
        $('#observaciones_Tarea').val('');
        $('materialTarea').val('');
        $('materialTareaTipo').val('');
        $('maquinaTarea').val('');
        //console.log("Antes del post");
        $.post("../PHP/tareas_tools.php", { accion:"nuevo", idTrabajo_Tarea:'3', idPadre_Tarea:'3', idDepartamento_Tarea:'3',idCreador_Tarea:'3',rutaArchivos_Tarea:'RutaArchivo3', nombre_Tarea: nombre_Tarea, unidadesArchivo_Tarea: unidadesArchivo_Tarea, unidadesTotales_Tarea: unidadesTotales_Tarea,cadena_Tarea: cadena_Tarea ,idCliente_Tarea: idCliente_Tarea, concepto_Tarea: concepto_Tarea, fechaCreacion_Tarea: fechaCreacion_Tarea, fechaInicio_Tarea: fechaInicio_Tarea, fechaFin_Tarea: fechaFin_Tarea, tiempoExtra_Tarea: tiempoExtra_Tarea, observaciones_Tarea: observaciones_Tarea, nombreMaterial: materialTarea ,tipoMaterial: materialTareaTipo ,nombreMaquina:maquinaTarea  }).done(function( data ) {
            //console.log(data);
        
        });
    }
        // Cerrar el popup después de agregar la tarea (si es necesario)
        $('#popup-formulario').dialog('close');
    };


        function editRow(boton) {
         
    var idModificar = boton.attr('id').replace('botonEArchivoT', ''); 
   // console.log(idModificar);
    // Crear el objeto de datos a enviar
    var datos = {
        accion: "consulta",
        idTarea: idModificar
    };
    

    $.post("../PHP/tareas_tools.php", datos)
    .done(function(data) {
        try {
            // Verificar si la respuesta es un JSON válido
            console.log(data);
            var tarea = JSON.parse(data);
            console.log(tarea);
            // Si es válido, actualizar los campos del formulario con los datos de la tarea
            $('#idTrabajo_Tarea').val(tarea.idTrabajo_Tarea);
            $('#idPadre_Tarea').val(tarea.idPadre_Tarea);
            $('#idDepartamento_Tarea').val(tarea.idDepartamento_Tarea);
            $('#idCreador_Tarea').val(tarea.idCreador_Tarea);
            $('#nombre_Tarea').val(tarea.nombre_Tarea);
            $('#rutaArchivos_Tarea').val(tarea.rutaArchivos_Tarea);
            $('#unidadesArchivo_Tarea').val(tarea.unidadesArchivo_Tarea);
            $('#unidadesTotales_Tarea').val(tarea.unidadesTotales_Tarea);
            $('#cadena_Tarea').val(tarea.cadena_Tarea);
            $('#idCliente_Tarea').val(tarea.idCliente_Tarea);
            $('#concepto_Tarea').val(tarea.concepto_Tarea);
            $('#fechaCreacion_Tarea').val(tarea.fechaCreacion_Tarea);
            $('#fechaInicio_Tarea').val(tarea.fechaInicio_Tarea);
            $('#fechaFin_Tarea').val(tarea.fechaFin_Tarea);
            $('#tiempoExtra_Tarea').val(tarea.tiempoExtra_Tarea);
            $('#observaciones_Tarea').val(tarea.observaciones_Tarea);
        } catch (error) {
            // Si hay un error al analizar la respuesta como JSON, mostrar un mensaje de error en la consola
            console.error("Error al analizar la respuesta del servidor: " + error);
            console.log("Respuesta del servidor:", data);
        }
    })
    .fail(function( status, error) {
        console.error("Error al realizar la solicitud POST: " + error);
    });

    // Abrir el diálogo de edición
    $('#popup-formulario').dialog({
        width: 700,
        buttons: {
            "Eliminar": function() {
                var confirmarEliminar = confirm("¿Estás seguro de que quieres eliminar esta tarea?");
                if (confirmarEliminar) {
                    idEliminar = boton.attr('id').replace('botonEArchivoT', '');
                    $.post("../PHP/tareas_tools.php", { accion: "eliminar", Id: idEliminar }).done(function(data) {
                        console.log(data);
                        console.log(idEliminar);
                    });
                }
                $(this).dialog('close');
                location.reload();
            },

            "Copiar URL": function() {
                var rutaArchivos = $('#rutaArchivos_Tarea').val();
                console.log(rutaArchivos);
                // Crear un elemento de texto temporal para copiar la ruta
                var tempInput = document.createElement("input");
                tempInput.setAttribute('value', rutaArchivos); // Asignar el valor de la ruta al elemento input
                document.body.appendChild(tempInput);
                tempInput.select();    
                document.execCommand("copy"); // Ejecutar el comando de copiar
                document.body.removeChild(tempInput);
                console.log(tempInput);
                alert("La URL se ha copiado al portapapeles.");
                
            },
          

            "Modificar": function() {

                var idModificar = boton.attr('id').replace('botonEArchivoT', '');
                // Obtener los valores actualizados del formulario
                var idTarea = $('#idTarea').val();
                var idPadre_Tarea = $('#idPadre_Tarea').val();
                var idTrabajo_Tarea = $('#idTrabajo_Tarea').val();
                var idDepartamento_Tarea = $('#idDepartamento_Tarea').val();
                var idCreador_Tarea = $('#idCreador_Tarea').val();
                var rutaArchivos_Tarea = $('#rutaArchivos_Tarea').val();
                var nombre_Tarea = $('#nombre_Tarea').val();
                var unidadesArchivo_Tarea = $('#unidadesArchivo_Tarea').val();
                var unidadesTotales_Tarea = $('#unidadesTotales_Tarea').val(); 
                var cadena_Tarea = $('#cadena_Tarea').val();
                var idCliente_Tarea = $('#idCliente_Tarea').val();
                var concepto_Tarea = $('#concepto_Tarea').val();
                var fechaCreacion_Tarea = $('#fechaCreacion_Tarea').val();
                var fechaInicio_Tarea = $('#fechaInicio_Tarea').val();
                var fechaFin_Tarea = $('#fechaFin_Tarea').val();
                var tiempoExtra_Tarea = $('#tiempoExtra_Tarea').val();
                var observaciones_Tarea = $('#observaciones_Tarea').val();
                var materialTarea = $('#materialTarea').val();
                var materialTareaTipo =$ ('materialTareaTipo').val();
                var maquinaTarea = $('#maquinaTarea').val()
                
                console.log(idTrabajo_Tarea);
            
                //Enviar una solicitud AJAX para modificar la tarea
                $.post("../PHP/tareas_tools.php", {
                    accion: "modificar",
                    idTarea: idModificar,
                    idPadre_Tarea: idPadre_Tarea,
                    idTrabajo_Tarea: idTrabajo_Tarea,
                    idDepartamento_Tarea: idDepartamento_Tarea,
                    idCreador_Tarea: idCreador_Tarea,
                    nombre_Tarea: nombre_Tarea,
                    rutaArchivos_Tarea: rutaArchivos_Tarea,
                    unidadesArchivo_Tarea: unidadesArchivo_Tarea,
                    unidadesTotales_Tarea: unidadesTotales_Tarea,
                    cadena_Tarea: cadena_Tarea,
                    idCliente_Tarea: idCliente_Tarea,
                    concepto_Tarea: concepto_Tarea,
                    fechaCreacion_Tarea: fechaCreacion_Tarea,
                    fechaInicio_Tarea: fechaInicio_Tarea,
                    fechaFin_Tarea: fechaFin_Tarea,
                    tiempoExtra_Tarea: tiempoExtra_Tarea,
                    observaciones_Tarea: observaciones_Tarea,
                    materialTarea: materialTarea,
                    materialTareaTipo: materialTareaTipo,
                    maquinaTarea: maquinaTarea
                }).done(function(data) {
                    console.log(data);
                });
                $(this).dialog('close');
            },
            "Cancelar": function() {
                $(this).dialog('close');
            }
        },
        close: function() {
            $('#formulario-tarea').trigger('reset');
            location.reload();
        }
    });
}

$(document).ready(function(){
    var contador = 1; 
    mostrarTareas();
  
    

    
// Mostrar el popup al hacer clic en el botón "Agregar Tarea"
    $('#agregarTareaBtn').on("click",function() {
        //console.log("Entra");
        $('#popup-formulario').dialog({
            width: 700,
            buttons: {
                "Guardar" : {
                    text: "Guardar",
                    id: "guardar",
                    click: function(){
                        guardartarea()
                        $(this).dialog('close');
                    
                    }
                    
                },
                "Cancelar": function() {
                    $(this).dialog('close');
                }
            },
            close: function() {
                
                // Limpia el formulario cuando se cierra el popup
                $('#formulario-tarea').trigger('reset');
            }
        });
    });
    // Inicializar datepicker para las fechas
    $('#fechaInicio_Tarea, #fechaFin_Tarea, #fechaCreacion_Tarea').datepicker({
        timepicker: true,
        controlType: 'select',
        timeFormat: 'HH:mm',
        dateFormat: 'yy-mm-dd'
    });


    $(document).ready(function(){
        // Inicializar un arreglo para almacenar los datos
        var listadoDeMaquinas = [];
        
        $("#ValidarMaquina").on("click", function(){
            var maquina = $("#maquinaTarea").val();
            
            // Crear un objeto JSON con los valores
            var datos = {
                "maquinaTarea": maquina
            };
            listadoDeMaquinas.push(datos);
    
            var jsonListadoDeMaquinas = JSON.stringify(listadoDeMaquinas);
            
            console.log(jsonListadoDeMaquinas);
    
            
            $("#maquinaTarea").val("");
    
            mostrarListaDeMaquinas(listadoDeMaquinas);
        });
    
        function mostrarListaDeMaquinas(lista) {
            $("#listaDeMaquinas").empty();
    
            lista.forEach(function(item) {
                var listItem = $("<li>").text("Máquina: " + item.maquinaTarea);
                $("#listaDeMaquinas").append(listItem);
            });
        }
    });
    


    $(document).ready(function(){
        var listadoDeMaterial = [];
        
        $("#ValidarMaterial").on("click", function(){
            var material = $("#materialTarea").val();
            var tipoMaterial = $("#materialTareaTipo").val();
            
            var datos = {
                "materialTareaTipo": tipoMaterial,
                "materialTarea": material
            };
            listadoDeMaterial.push(datos);
    
            var jsonListadoDeMaterial = JSON.stringify(listadoDeMaterial);
            
            console.log(jsonListadoDeMaterial);
    
            $("#materialTarea").val("");
            $("#materialTareaTipo").val("");
    
            mostrarListaDeMateriales(listadoDeMaterial);
        });
    
        function mostrarListaDeMateriales(lista) {
            $("#listaDeMateriales").empty();
    
            lista.forEach(function(item) {
                var listItem = $("<li>").text("Material: " + item.materialTarea + ", Tipo: " + item.materialTareaTipo);
                $("#listaDeMateriales").append(listItem);
            });
        }
    });
    


});




