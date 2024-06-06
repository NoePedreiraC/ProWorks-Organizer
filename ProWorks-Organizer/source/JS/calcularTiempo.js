function iniciarContador(idTarea) {
    //Si no está creado el tiemnpo transcurrido se crea y se empieza a contar
    if (!$('#tiempoTranscurridoT'+idTarea).length) {
        $( '<p id="tiempoTranscurridoT'+idTarea+'">00:00:00</p>' ).insertBefore( ".ui-dialog-buttonset" );
        if (  $('#enPausaT'+idTarea).val()=="false") {
            horaInicio = new Date();
            intervalo = setInterval(function() {
                var ahora = new Date();
                tiempoTranscurridoT= new Date(ahora.getTime() - horaInicio.getTime() - (3600*1000));
                // Verificar si es las 15:00 para detener el temporizador
                if (ahora.getHours() === 15 && ahora.getMinutes() === 0) {
                    finalizarContador(idTarea);
                } else {
                    actualizarTiempo(idTarea, tiempoTranscurridoT);
                }
            }, 1000);
        } else {
            reanudarContador();
        }
    }
    
}

function actualizarTiempo(idTarea, tiempoTranscurridoT) {
    


    const tiempoTranscurrido = new Date(tiempoTranscurridoT);
    

    var horas = tiempoTranscurrido.getHours();
    var minutos = tiempoTranscurrido.getMinutes();
    var segundos = tiempoTranscurrido.getSeconds();

    $("#tiempoTranscurridoT"+idTarea).text(
        (horas < 10 ? "0" : "") + horas + ":" +
        (minutos < 10 ? "0" : "") + minutos + ":" +
        (segundos < 10 ? "0" : "") + segundos
    );
}


    function pausarContador(idTarea) {
        $('#enPausaT'+idTarea).val()=="true"
        var intervaloT = $("#intervaloT"+idTarea).val();
        clearInterval(intervalo);
        $("#pausar").text("Reanudar");
    }

    function reanudarContador(idTarea) {
        $('#enPausaT'+idTarea).val(false);
        var tiempoTranscurridoT = $("#tiempoTranscurridoT"+idTarea).text();
        var momentoApertura = new Date();
        var horaTexto = tiempoTranscurridoT.substring(0, tiempoTranscurridoT.indexOf(":"));
        var minuTexto = tiempoTranscurridoT.substring(tiempoTranscurridoT.indexOf(":")+1, tiempoTranscurridoT.lastIndexOf(":"));
        var seguTexto = tiempoTranscurridoT.substring(tiempoTranscurridoT.lastIndexOf(":")+1, tiempoTranscurridoT.length);
        
      
        var tiempoTranscurridoEnMilisegundos = (parseInt(horaTexto) * 60 * 60 * 1000) + (parseInt(minuTexto) * 60 * 1000) + (parseInt(seguTexto) * 1000);
        momentoApertura = momentoApertura.getTime() - tiempoTranscurridoEnMilisegundos;
        momentoApertura = new Date(momentoApertura);   
        intervalo = setInterval(function() {
            var ahora = new Date();
            var tiempoTranscurrido = new Date(ahora.getTime() - momentoApertura.getTime() - (3600*1000));
            tiempoTranscurrido = (`Europe/Madrid`, tiempoTranscurrido);
            // Verificar si es las 15:00 para detener el temporizador
            if(ahora.getHours() === 15 && ahora.getMinutes() === 0) {
                finalizarContador(idTarea);
            } else {
                actualizarTiempo(idTarea, tiempoTranscurrido);
            }
        }, 1000);
        $("#pausar").text("Pausar");
    }

  //________________________________________________________________________________________________________________________

  function registrarPausa(idTareaPausa) {
   var intervaloT = $("#intervaloT"+idTareaPausa).val();
    clearInterval(intervalo);
    $("#pausar").text("Reanudar");
    var idTrabajadorPausa = 1; 
    var inicioPausa = moment().format(); // Esto genera la fecha y hora actual en el formato deseado
    // Crear el objeto JSON para enviar al servidor
    var jsonToSend = {
        accion: "agregarPausa",
        idTareaPausa: idTareaPausa,
        idTrabajadorPausa: idTrabajadorPausa,
        inicioPausa: inicioPausa,
        finPausa: null
    };
    // Enviar la solicitud POST al servidor
    $.post("../PHP/pausas_tools.php", jsonToSend)
    .done(function(data) {
        var arraySplit = data.split('ENDOFALERTS');
        var json = arraySplit[1];
        if ((arraySplit[0].trim()) !== ""){
            if (arraySplit[0].match("error") < -1) {
                alert(""); // Puedes mostrar una alerta al usuario si hay un error
            }
            if ((arraySplit[0].trim())!==""){
                //if (arraySplit[0].match("error")<-1) {alert("");} //Aquí podemos lanzar un aviso si tiene error para que lo vea el usuario.
                console.log( arraySplit[0] ); //Si hay algun error veo su codigo por consola.
            }
        }
        var result = JSON.parse(json);
        var idPausa = result.idNuevaPausa; // Obtener el ID de la pausa
        
        $("#idPausaOcultaT"+idTareaPausa).val(idPausa); // Guardar el ID de la pausa en un campo oculto
    })
    .fail(function(xhr, status, error) {
        console.error("Error al registrar la pausa: " + error);
        console.log("Respuesta del servidor:", xhr.responseText);
    });
}



//________________________________________________________________________________________________________________________
   // Función para registrar el fin de la pausa 
      function registrarFinPausa(idTarea) {
        var idPausa =  $("#idPausaOcultaT"+idTarea).val();
        var finPausa = moment(); // obtiene la fecha actual
        var finPausa = finPausa.format(); // formatea la fecha en el formato deseado

        $.post("../PHP/pausas_tools.php", {
            accion: "actualizarFinPausa",
            idPausa: idPausa,
            finPausa: finPausa
            
        }).done(function(data) {
            // Verificar si la respuesta es un JSON válido
            // Si es válido, actualizar los campos del formulario con los datos de la tarea
            // Si hay un error al analizar la respuesta como JSON, mostrar un mensaje de error en la consola
        }).fail(function(xhr, status, error) {
            console.error("Error al analizar la respuesta del servidor: " + error);
            console.log("Respuesta del servidor:", xhr.responseText);
        });
    }
//________________________________________________________________________________________________________________

 
   // Función para registrar el inicio de la tarea
   function registrarFinTarea(idTarea) {

    var fechaFin = moment().format(); // obtiene la fecha actual y formatea la fecha en el formato deseado

    $.post("../PHP/tareas_tools.php", {
        accion: "actualizarFechaFinTarea",
        idTarea: idTarea,
        fechaFin: fechaFin
        
    }).done(function(data) {       
      
        // Si es válido, actualizar los campos del formulario con los datos de la tarea
        // Si hay un error al analizar la respuesta como JSON, mostrar un mensaje de error en la consola
    }).fail(function(xhr, status, error) {
        console.error("Error al analizar la respuesta del servidor: " + error);
        console.log("Respuesta del servidor:", xhr.responseText);
    });
}

function registrarInicioTarea(idTarea) {

    var fechaInicio = moment(); // obtiene la fecha actual
    var fechaInicio = fechaInicio.format(); // formatea la fecha en el formato deseado

    $.post("../PHP/tareas_tools.php", {
        accion: "actualizarFechaInicioTarea",
        idTarea: idTarea,
        fechaInicio: fechaInicio
    }).done(function(data) {
         // Verificar si la respuesta es un JSON válido
        // Si es válido, actualizar los campos del formulario con los datos de la tarea
        // Si hay un error al analizar la respuesta como JSON, mostrar un mensaje de error en la consola
    }).fail(function(xhr, status, error) {
        console.error("Error al analizar la respuesta del servidor: " + error);
        console.log("Respuesta del servidor:", xhr.responseText);
    });
}


function finalizarContador(idTarea) {
    
    var tiempoTranscurridoT = $("#tiempoTranscurridoT"+idTarea).val();

    var horas = Math.floor(tiempoTranscurridoT / 3600000);
    var minutos = Math.floor((tiempoTranscurridoT % 3600000) / 60000);
    clearInterval(intervalo);
    tiempoTranscurridoT = 0;
    actualizarTiempo();
}



//________________________________________________________________________________________________________________________
//                                  CALCULO DE LAS DURACIONES DE CADA TAREA

function calcularTiempoTotalTarea(idTarea, idTrabajadorPausa, inicioPausa, finPausa) {
    var idTarea = idTarea;
    var idTrabajadorPausa = 1;
   
    var inicioPausa = moment().format(); // Esto genera la fecha y hora actual en el formato deseado
    var finPausa = moment().format();
    var diferenciaEnMilisegundos = 0;

    
    $.post("../PHP/tareas_tools.php", {
        accion: "consulta",
        idTarea: idTarea
    }).done(function(data) {
        var tarea = JSON.parse(data);
        var fechaInicio_Tarea = new Date(tarea.fechaInicio_Tarea);
        var fechaFin_Tarea = (tarea.fechaFin_Tarea!="") ? new Date(tarea.fechaFin_Tarea) : new Date();
        var diasConsecutivosTarea = 0;

        // Calculamos la diferencia en días entre las fechas de inicio y fin de la tarea
        var diferenciaEnDias = Math.floor((fechaFin_Tarea - fechaInicio_Tarea) / (1000 * 60 * 60 * 24));
        
        // Sumar uno al contador por cada día de diferencia
        diasConsecutivosTarea += diferenciaEnDias;

        // Calculamos la diferencia entre las fechas en milisegundos
        diferenciaEnMilisegundos = fechaFin_Tarea - fechaInicio_Tarea;

        // Restar 16 horas multiplicadas por días consecutivos
        diferenciaEnMilisegundos -= (16 * 3600 * 1000 * diasConsecutivosTarea);

        // Agregar el valor al campo hidden en el HTML
         $("<input type='hidden' id='totalTiempoTareaT' name='totalTiempoTareaT' value='" + diferenciaEnMilisegundos + "'></input>").insertBefore( "#nombre_TareaV" );
        

        // Puedes realizar aquí la comparación o el procesamiento adicional necesario con tiempoTotal
    }).fail(function(xhr, status, error) {
        console.error("Error al obtener la tarea: " + error);
        console.log("Respuesta del servidor:", xhr.responseText);
    });

        //---------------------------------------------------------------------------------------------------------
        var jsonToSend = {
            accion: "obtenerTodasLasPausas",
            idTarea: idTarea,
            idTrabajadorPausa: idTrabajadorPausa,
            inicioPausa: inicioPausa,
            finPausa: finPausa
        };
        $.post("../PHP/pausas_tools.php", jsonToSend)
        .done(function(data) {
            var arraySplit = data.split('ENDOFALERTS');
            var json = arraySplit[1];
            
            if ((arraySplit[0].trim()) !== ""){
                if (arraySplit[0].match("error") < -1) {
                    alert(""); // Puedes mostrar una alerta al usuario si hay un error
                }
                if ((arraySplit[0].trim())!==""){
                    if (arraySplit[0].match("error")<-1) {alert("");} //Aquí podemos lanzar un aviso si tiene error para que lo vea el usuario.
                }
            }
            
            var result = JSON.parse(json);
            var totalTiempoPausas = result.totalTiempoPausas;

            TiempoTotalTarea= diferenciaEnMilisegundos-totalTiempoPausas;

            $("<input type='hidden' id='totalTiempoPausas' name='totalTiempoPausas' value='" + totalTiempoPausas + "'></input>").insertBefore( "#nombre_TareaV" );

        })
        .fail(function(xhr, status, error) {
            console.error("Error al registrar la pausa: " + error);
            console.log("Respuesta del servidor:", xhr.responseText);
        }); 

        waitFor("#totalTiempoPausas").then((elm) => {
            waitFor("#totalTiempoTareaT").then((elm) => {
                var tiempoTotalPausas = $("#totalTiempoPausas").val();
                var tiempoTotalTarea = $("#totalTiempoTareaT").val();
                var tiempoTareaSegundos = tiempoTotalTarea / 1000;
                TiempoFinalTarea=tiempoTareaSegundos-tiempoTotalPausas;
                var horas = Math.floor(TiempoFinalTarea / 3600);
                var minutos = Math.floor((TiempoFinalTarea % 3600) / 60);
            });
        });

       
    }
