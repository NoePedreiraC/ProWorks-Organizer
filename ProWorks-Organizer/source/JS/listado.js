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
        $.post("../PHP/tareas_tools.php", { accion:"nuevo", idTrabajo_Tarea:'3', idPadre_Tarea:'3', idDepartamento_Tarea:'3',idCreador_Tarea:'3',rutaArchivos_Tarea:'RutaArchivo3', nombre_Tarea: nombre_Tarea, unidadesArchivo_Tarea: unidadesArchivo_Tarea, unidadesTotales_Tarea: unidadesTotales_Tarea,cadena_Tarea: cadena_Tarea ,idCliente_Tarea: idCliente_Tarea, concepto_Tarea: concepto_Tarea, fechaCreacion_Tarea: fechaCreacion_Tarea, fechaInicio_Tarea: fechaInicio_Tarea, fechaFin_Tarea: fechaFin_Tarea, tiempoExtra_Tarea: tiempoExtra_Tarea, observaciones_Tarea: observaciones_Tarea, nombreMaterial: materialTarea ,tipoMaterial: materialTareaTipo ,nombreMaquina:maquinaTarea  }).done(function( data ) {
        
        });
    }
        // Cerrar el popup después de agregar la tarea (si es necesario)
        $('#popup-formulario').dialog('close');
    };


    function editRow(idTarea) {
         
        var idModificar = idTarea; 
        // Crear el objeto de datos a enviar
        var datos = {
            accion: "consulta",
            idTarea: idTarea
        };
    

        $.post("../PHP/tareas_tools.php", datos)
        .done(function(data) {
            try {
                // Verificar si la respuesta es un JSON válido
                var tarea = JSON.parse(data);
                // Si es válido, actualizar los campos del formulario con los datos de la tarea
                $('#idTareaM').val(tarea.idTarea);
                $('#idTrabajo_TareaM').val(tarea.idTrabajo_Tarea);
                $('#idPadre_TareaM').val(tarea.idPadre_Tarea);
                $('#idDepartamento_TareaM').val(tarea.idDepartamento_Tarea);
                $('#idCreador_TareaM').val(tarea.idCreador_Tarea);
                $('#nombre_TareaM').val(tarea.nombre_Tarea);
                $('#rutaArchivos_TareaM').val(tarea.rutaArchivos_Tarea);
                $('#unidadesArchivo_TareaM').val(tarea.unidadesArchivo_Tarea);
                $('#unidadesTotales_TareaM').val(tarea.unidadesTotales_Tarea);
                $('#cadena_TareaM').val(tarea.cadena_Tarea);
                $('#idCliente_TareaM').val(tarea.idCliente_Tarea);
                $('#concepto_TareaM').val(tarea.concepto_Tarea);
                $('#fechaCreacion_TareaM').val(tarea.fechaCreacion_Tarea);
                $('#fechaInicio_TareaM').val(tarea.fechaInicio_Tarea);
                $('#fechaFin_TareaM').val(tarea.fechaFin_Tarea);
                $('#tiempoExtra_TareaM').val(tarea.tiempoExtra_Tarea);
                $('#observaciones_TareaM').val(tarea.observaciones_Tarea);
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
        $('#popup-formularioM').dialog({
            width: 700,
            buttons: {
                "Eliminar": function() {
                    var idTareaAEliminar = idModificar;
                    var confirmarEliminar = confirm("¿Estás seguro de que quieres eliminar esta tarea?");
                    if (confirmarEliminar) {
                        $('[id^="botonEArchivoT"]').each(function () {
                        });
                        $.post("../PHP/tareas_tools.php", { accion: "obtenerTareas", idPadre: idTareaAEliminar })
                            .done(function(data) {
                                var retorno = jQuery.parseJSON(data);
                                if (jQuery.isEmptyObject(retorno)) {
                                    // Si la respuesta del post obtenerTareas es vacía, llama al post para eliminar
                                    $.post("../PHP/tareas_tools.php", { accion: "eliminar", Id: idTareaAEliminar }).done(function(response) {

                                    });
                                } else {

                                    if (retorno.error === "No se encontraron tareas.") {
                                        alert("Hubo un error al buscar subtareas ");
                                    }
                                    else {
                                        // Si la respuesta no es vacía, confirma la eliminación de la tarea y las subtareas
                                        var confirmarEliminarConSubtareas = confirm("Esta tarea tiene subtareas. ¿Estás seguro de que quieres eliminar la tarea y las subtareas?");
                                        if (confirmarEliminarConSubtareas) {
                                            $.post("../PHP/tareas_tools.php", { accion: "eliminar", Id: idTareaAEliminar }).done(function(response) {
                                            });
                                        }
                                    }
                                }
                            })
                            .fail(function() {
                                alert("Hubo un error al buscar Subtareas al eliminar la tarea");
                            });
                    }
                    $(this).dialog('close');
                    location.reload();
                },

                "Copiar URL": function() {
                    var rutaArchivos = $('#rutaArchivos_TareaV').val();
                    // Crear un elemento de texto temporal para copiar la ruta
                    var tempInput = document.createElement("input");
                    tempInput.setAttribute('value', rutaArchivos); // Asignar el valor de la ruta al elemento input
                    document.body.appendChild(tempInput);
                    tempInput.select();    
                    document.execCommand("copy"); // Ejecutar el comando de copiar
                    document.body.removeChild(tempInput);
                    alert("La URL se ha copiado al portapapeles.");
                    
                },
            

                "Guardar": function() {
                    var idModificar =($('[id^=botonEArchivoT]').attr('id').replace('botonEArchivoT', ''));
                    // Obtener los valores actualizados del formulario
                    var idModificar = $('#idTareaM').val();
                    var idPadre_Tarea = $('#idPadre_TareaM').val();
                    var idTrabajo_Tarea = $('#idTrabajo_TareaM').val();
                    var idDepartamento_Tarea = $('#idDepartamento_TareaM').val();
                    var idCreador_Tarea = $('#idCreador_TareaM').val();
                    var rutaArchivos_Tarea = $('#rutaArchivos_TareaM').val();
                    var nombre_Tarea = $('#nombre_TareaM').val();
                    var unidadesArchivo_Tarea = $('#unidadesArchivo_TareaM').val();
                    var unidadesTotales_Tarea = $('#unidadesTotales_TareaM').val(); 
                    var cadena_Tarea = $('#cadena_TareaM').val();
                    var idCliente_Tarea = $('#idCliente_TareaM').val();
                    var concepto_Tarea = $('#concepto_TareaM').val();
                    var fechaCreacion_Tarea = $('#fechaCreacion_TareaM').val();
                    var fechaInicio_Tarea = $('#fechaInicio_TareaM').val();
                    var fechaFin_Tarea = $('#fechaFin_TareaM').val();
                    var tiempoExtra_Tarea = $('#tiempoExtra_TareaM').val();
                    var observaciones_Tarea = $('#observaciones_TareaM').val();
                    var materialTarea = $('#materialTareaM').val();
                    var materialTareaTipo =$ ('materialTareaTipoM').val();
                    var maquinaTarea = $('#maquinaTareaM').val()
                    
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
                    });
                    $(this).dialog('close');
                },
                "Cancelar": function() {
                    $(this).dialog('close');
                }
            },
            close: function() {
                $('#formulario-tareaM').trigger('reset');
                location.reload();
            }
    });
}

$(document).ready(function(){
    var intervalo;
    var contador = 1; 
    mostrarTareas();
    autoCompletarTipoMaterial();
    autoCompletarMateriales();
    autoCompletarMaquinas();
    

    
// Mostrar el popup al hacer clic en el botón "Agregar Tarea"
    $('#agregarTareaBtn').on("click",function() {
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
    $('#fechaInicio_Tarea, #fechaFin_Tarea, #fechaCreacion_Tarea,#fechaInicio_TareaM, #fechaFin_TareaM, #fechaCreacion_TareaM').datepicker({
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
        
        $("#ValidarMaterial, #ValidarMaterialM").on("click", function(){
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

//____________________________________________________________________________________________________________________________________
function viewRow(boton) {
         
    var idModificar = boton.attr('id').replace('botonEArchivoT', ''); 
    var estaEnPausa = false;
    // Crear el objeto de datos a enviar
    var datos = {
        accion: "consulta",
        idTarea: idModificar
    }
        
    $.post("../PHP/tareas_tools.php", datos)
    .done(function(data) {
        try {
            // Verificar si la respuesta es un JSON válido
            var tarea = JSON.parse(data);
            // Si es válido, actualizar los campos del formulario con los datos de la tarea
            $('#idTrabajo_TareaV').val(tarea.idTrabajo_Tarea);
            $('#idPadre_TareaV').val(tarea.idPadre_Tarea);
            $('#idDepartamento_TareaV').val(tarea.idDepartamento_Tarea);
            $('#idCreador_TareaV').val(tarea.idCreador_Tarea);
            $('#nombre_TareaV').val(tarea.nombre_Tarea);
            $('#rutaArchivos_TareaV').val(tarea.rutaArchivos_Tarea);
            $('#unidadesArchivo_TareaV').val(tarea.unidadesArchivo_Tarea);
            $('#unidadesTotales_TareaV').val(tarea.unidadesTotales_Tarea);
            $('#cadena_TareaV').val(tarea.cadena_Tarea);
            $('#idCliente_TareaV').val(tarea.idCliente_Tarea);
            $('#concepto_TareaV').val(tarea.concepto_Tarea);
            $('#fechaCreacion_TareaV').val(tarea.fechaCreacion_Tarea);
            $('#fechaInicio_TareaV').val(tarea.fechaInicio_Tarea);
            $('#fechaFin_TareaV').val(tarea.fechaFin_Tarea);
            $('#tiempoExtra_TareaV').val(tarea.tiempoExtra_Tarea);
            $('#observaciones_TareaV').val(tarea.observaciones_Tarea);

            let sumaTiempo = 0; //En Milisegundos

            if (tarea.fechaInicio_Tarea != null ){
                var tiempoExtra = parseInt(tarea.tiempoExtra_Tarea * 60 * 1000)
                
                tarea.fechaFin_Tarea = (tarea.fechaFin_Tarea!=null) ? new Date(tarea.fechaFin_Tarea) : new Date();

                // sumaTiempoTarea = tarea.fechaFin_Tarea-tarea.fechaInicio_Tarea;
                sumaTiempoTarea = ((new Date(tarea.fechaFin_Tarea ) - new Date(tarea.fechaInicio_Tarea)));

                // Calcular si la tarea comienza y termina en días distintos
                //Segundos
                const diasConsecutivosSegTarea = ((new Date(tarea.fechaFin_Tarea ) - new Date(tarea.fechaInicio_Tarea)) );

                sumaTiempoTarea = parseInt(sumaTiempoTarea+tiempoExtra);
                
                //Dias
                var tiempoTranscurridoTarea = sumaTiempoTarea
                var diasConsecutivosTotalesTarea = Math.round(diasConsecutivosSegTarea / (1000 * 60 * 60 * 24));
                sumaTiempoTarea -= diasConsecutivosTotalesTarea * 24 * 60 * 60 * 1000;

                //resultado de el tiempo total de la tarea - 16 en milisegundos por los dias trabajados
                var tiempoReal = tiempoTranscurridoTarea-(57600000*diasConsecutivosTotalesTarea)
          
                // Iterar sobre las pausas
                tarea.pausas.forEach(pausa => {
                    const inicioPausa = new Date(pausa.inicioPausa);
                    const finPausa = pausa.finPausa ? new Date(pausa.finPausa) : new Date();
                    estaEnPausa = pausa.finPausa ? false : true;
                    

                    // Calcular si la pausa comienza y termina en días distintos
                   
                    //Segundos
                    const diasConsecutivosS = finPausa-inicioPausa;
                    //Dias
                    var diasConsecutivosTotales = Math.round(diasConsecutivosS / 1000 / 60 / 60 / 24);
                   
                //____________________________________________________________________________________________________________
                    // Calcular la duración de la pausa en milisegundos
                    const duracionPausa = finPausa - inicioPausa -(diasConsecutivosTotales*16*60*60*1000);
                    tiempoReal -= duracionPausa

                });

                const horas = Math.floor((tiempoReal) / (1000 * 60 * 60));
                tiempoReal -= horas * 1000 * 60 * 60;

                const minutos = Math.floor(tiempoReal / (1000 * 60));
                tiempoReal -= minutos * 1000 * 60;

                const segundos = Math.floor(tiempoReal / 1000);
         
                const tiempoTrabajado = `${String(horas).padStart(2, '0')}:${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
                
                if ($("[id^=tiempoTranscurridoT]").length) $("[id^=tiempoTranscurridoT]").remove();
                $( '<p id="tiempoTranscurridoT'+idModificar +'">'+ tiempoTrabajado + '</p>' ).insertBefore( ".ui-dialog-buttonset" ); 

               }


        } catch (error) {
            // Si hay un error al analizar la respuesta como JSON, mostrar un mensaje de error en la consola
            console.error("Error al analizar la respuesta del servidor: " + error);
            console.log("Respuesta del servidor:", data);
        }
    })
    .fail(function( status, error) {
        console.error("Error al realizar la solicitud POST: " + error);
    })
    

    $( '<input type="hidden" id="enPausaT'+idModificar +'" value="false" name="enPausaT'+idModificar+'"></input>' ).insertBefore( "#nombre_TareaV" );
    $( '<input type="hidden" id="idPausaOcultaT'+idModificar +'" value="" name="idPausaOcultaT'+idModificar+'"></input>' ).insertBefore( "#nombre_TareaV" );
    $( '<input type="hidden" id="intervaloT'+idModificar+'" value="" name="intervaloT'+idModificar+'"></input>' ).insertBefore( "#nombre_TareaV" );
    $( '<input type="hidden" id="horaInicioT'+idModificar+'" value="" name="horaInicio'+idModificar+'"></input>' ).insertBefore( "#nombre_TareaV" );

    if ($("[id^=tiempoTranscurridoT]").length) $("[id^=tiempoTranscurridoT]").remove();

    // Abrir el diálogo de edición
    $('#popup-formularioV').dialog({
        width: 700,
        buttons: {
            "Iniciar": function() {
                iniciarContador(idModificar);
                registrarInicioTarea(idModificar);
                $('.ui-dialog-buttonpane button:contains("Iniciar")').button().hide();
                $('.ui-dialog-buttonpane button:contains("Pausar")').button().show();
            },
            
            "Pausar": function() {
                pausarContador(idModificar);
                registrarPausa(idModificar);
                $('.ui-dialog-buttonpane button:contains("Pausar")').button().hide();
                $('.ui-dialog-buttonpane button:contains("Reanudar")').button().show();
            },
              
            "Reanudar": function() {
                reanudarContador (idModificar);
                registrarFinPausa(idModificar);
                $('.ui-dialog-buttonpane button:contains("Reanudar")').button().hide();
                $('.ui-dialog-buttonpane button:contains("Pausar")').button().show();
            },

            "Finalizar": function() {
                finalizarContador(idModificar);
                registrarFinTarea(idModificar); 
                $('.ui-dialog-buttonpane button:contains("Reanudar")').button().hide();
                $('.ui-dialog-buttonpane button:contains("Pausar")').button().hide();
            },

            "Modificar": function() {
                editRow(idModificar);
            },
            "Cancelar": function() {
                $(this).dialog('close');
            }
        },
        close: function() {
            $('#formulario-tareaV').trigger('reset');
            location.reload();
        }
        
    });

    $('.ui-dialog-buttonpane button:contains("Pausar")').button().hide();
    $('.ui-dialog-buttonpane button:contains("Reanudar")').button().hide();
    $('.ui-dialog-buttonpane button:contains("Calcular")').button().hide();

    waitFor("#tiempoTranscurridoT"+idModificar).then((elm) => {

            if ($('#fechaFin_TareaV').val() != null) {
            $('.ui-dialog-buttonpane button:contains("Iniciar")').button().hide();
            $('.ui-dialog-buttonpane button:contains("Finalizar")').button().show();
        }
        if ($('#fechaInicio_TareaV').val() !== ""){
            if ($('#fechaFin_TareaV').val() !== ""){
                calcularTiempoTotalTarea(idModificar);
                $('.ui-dialog-buttonpane button:contains("Finalizar")').button().hide();
            }
            else
                if (estaEnPausa){
                    $('.ui-dialog-buttonpane button:contains("Iniciar")').button().hide();
                    $('.ui-dialog-buttonpane button:contains("Reanudar")').button().show();
                    
                }
                else{
                    $('.ui-dialog-buttonpane button:contains("Iniciar")').button().hide();
                    $('.ui-dialog-buttonpane button:contains("Pausar")').button().show();
                    reanudarContador(idModificar);
                }                    
        }

    });
};


//____________________________________________________________________________________________________________________________________

function autoCompletarMateriales(tipoMaterial){
    var availableTags;
    $.post("../PHP/tareas_tools.php",{accion:"obtenerMaterialesPorTipo", tipoMaterial:tipoMaterial})
        .done(function (data){
            availableTags = jQuery.parseJSON(data);
 
            $('#materialTarea, #materialTareaM').autocomplete({                
                source: function(requestObj, responseFunc) {
                    var matchArry = availableTags.slice(); // Copia el array
                    var srchTerms = $.trim(requestObj.term).replace(/\(|\)|\[|\]|\?|\+|\*|\\/g, "").split(/\s+/);
                    // For each search term, remove non-matches.
                    $.each(srchTerms, function(J, term) {
                        var regX = new RegExp(term, "i");
                        matchArry = $.map(matchArry, function(item) {
                            return regX.test(item) ? item : null;
                        });
                    });
                    // devuelve los resultados.
                    responseFunc(matchArry);
                },
                open: function(event, ui) {
                    var resultsList = $("ul.ui-autocomplete > li.ui-menu-item > a");
                    var srchTerm = $.trim($("#tags").val()).split(/\s+/).join('|');
                    // Recorre la lista de resultados
                    resultsList.each(function() {
                        var jThis = $(this);
                        var regX = new RegExp('(' + srchTerm + ')', "ig");
                        var oldTxt = jThis.text();
                        jThis.html(oldTxt.replace(regX, '<span class="srchHilite">$1</span>'));
                    });
                },
                select: function(event, ui) {
                    autoCompletarMateriales(ui.item.value);
                    
                        
                },

            });
        });
   
}



function autoCompletarTipoMaterial(){
   
    var availableTags;
    $.post("../PHP/tareas_tools.php",{accion:"obtenerTipoMateriales"})
        .done(function (data){
            availableTags = jQuery.parseJSON(data);
      
            $('#materialTareaTipo,#materialTareaTipoM').autocomplete({                
                source: function(requestObj, responseFunc) {
                    var matchArry = availableTags.slice(); // Copia el array
                    var srchTerms = $.trim(requestObj.term).replace(/\(|\)|\[|\]|\?|\+|\*|\\/g, "").split(/\s+/);
                    // Busca los elementos y elimina los que no sean iguales
                    $.each(srchTerms, function(J, term) {
                        var regX = new RegExp(term, "i");
                        matchArry = $.map(matchArry, function(item) {
                            return regX.test(item) ? item : null;
                        });
                    });
                    // Devuelve los resultados.
                    responseFunc(matchArry);
                },
                open: function(event, ui) {
                    var resultsList = $("ul.ui-autocomplete > li.ui-menu-item > a");
                    var srchTerm = $.trim($("#tags").val()).split(/\s+/).join('|');
                    // Recorre la lista de resultados y devuelve los elementos.
                    resultsList.each(function() {
                        var jThis = $(this);
                        var regX = new RegExp('(' + srchTerm + ')', "ig");
                        var oldTxt = jThis.text();
                        jThis.html(oldTxt.replace(regX, '<span class="srchHilite">$1</span>'));
                    });
                },
                select: function(event, ui) {

                   
                    if ($.trim($("#materialTareaTipo, materialTareaTipoM").val()) === '') {
                        autoCompletarMateriales('');
                    }   
                    else{
                        autoCompletarMateriales(ui.item.value);

                    }
                },
            });
        });
   
}



//------------------------Autocomplear Maquinas----------------------------------//


function autoCompletarMaquinas(){
    var availableTags;
    $.post("../PHP/tareas_tools.php",{accion:"obtenerMaquinas"})
        .done(function (data){
            availableTags = jQuery.parseJSON(data);
            $('#maquinaTarea, #maquinaTareaM').autocomplete({                
                source: function(requestObj, responseFunc) {
                    var matchArry = availableTags.slice(); // Copia el array
                    var srchTerms = $.trim(requestObj.term).replace(/\(|\)|\[|\]|\?|\+|\*|\\/g, "").split(/\s+/);
                    // Busca los elementos y elimina los que no sean iguales
                    $.each(srchTerms, function(J, term) {
                        var regX = new RegExp(term, "i");
                        matchArry = $.map(matchArry, function(item) {
                            return regX.test(item) ? item : null;
                        });
                    });
                    // Devuelve los resultados.
                    responseFunc(matchArry);
                },
                open: function(event, ui) {
                    var resultsList = $("ul.ui-autocomplete > li.ui-menu-item > a");
                    var srchTerm = $.trim($("#tags").val()).split(/\s+/).join('|');
                    // Recorre la lista de resultados y devuelve los elementos.
                    resultsList.each(function() {
                        var jThis = $(this);
                        var regX = new RegExp('(' + srchTerm + ')', "ig");
                        var oldTxt = jThis.text();
                        jThis.html(oldTxt.replace(regX, '<span class="srchHilite">$1</span>'));
                    });
                },
                select: function(event, ui) {
                    autoCompletarMateriales(ui.item.value);
                },

            });
        });
   
    }

   
    