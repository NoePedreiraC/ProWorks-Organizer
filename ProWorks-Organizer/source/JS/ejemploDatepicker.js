$.datepicker.regional['es'] = {
  closeText: 'Cerrar',
  prevText: '< Ant',
  nextText: 'Sig >',
  currentText: 'Hoy',
  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
  dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
  weekHeader: 'Sm',
  dateFormat: 'dd/mm/yy',
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: false,
  yearSuffix: ''
};

$.datepicker.setDefaults($.datepicker.regional['es']);

$(function() {
  $('#div_datapicker').datepicker({
    beforeShow: function(input, inst) {
      setTimeout(function(){
        //$("#div_datapicker").val("");
        var buttonPane = $(input).datepicker("widget").find(".ui-datepicker-buttonpane");
        var html = '<div style="height:30px; padding-top:5px;"><input id="fechaReal" type="checkbox" style="vertical-align:middle; float:left;"><div style="vertical-align:middle; padding-top:3px; float:left;"> Fecha real </div></div>';
        buttonPane.html(html);
        if($("#deadLineRealTEI").val()=="true") $("#fechaReal").prop('checked', true);
        else $("#fechaReal").prop('checked', false);
      }, 0);
    },
    onChangeMonthYear: function( year, month, instance ) {
      setTimeout(function() {
        var buttonPane = $(instance).datepicker("widget").find(".ui-datepicker-buttonpane");
        var html = '<div style="height:30px; padding-top:5px;"><input id="fechaReal" type="checkbox" style="vertical-align:middle; float:left;"><div style="vertical-align:middle; padding-top:3px; float:left;"> Fecha real </div></div>';
        buttonPane.html(html);
        if($("#deadLineRealTEI").val()=="true") $("#fechaReal").prop('checked', true);
        else $("#fechaReal").prop('checked', false);
      }, 0);
    },
    onSelect: function(date, instance) {
      setTimeout(function() {
        var buttonPane = $(instance).datepicker("widget").find(".ui-datepicker-buttonpane");
        var html = '<div style="height:30px; padding-top:5px;"><input id="fechaReal" type="checkbox" style="vertical-align:middle; float:left;"><div style="vertical-align:middle; padding-top:3px; float:left;"> Fecha real </div></div>';
        buttonPane.html(html);
        if($("#deadLineRealTEI").val()=="true") $("#fechaReal").prop('checked', true);
        else $("#fechaReal").prop('checked', false);
      }, 0);
      $("#div_datapicker").val(date);
      $("#deadLineTrabajo").val(date);
      $(this).data('datepicker').inline = true;
    },
    onClose: function(date) {
      if (date=="" || date=="NO DEFINIDA") {
        $("#div_datapicker").val("NO DEFINIDA");
        $("#div_datapicker").css("background-color",'#e6e6e6');
        $("#div_datapicker").css("color",'#b4b4b4');
        $("#deadLineTrabajo").val('');
      }
      else {
        if ($('#deadLineRealTEI').val()=="true") $("#div_datapicker").css("background-color",'#26D701');
        else $("#div_datapicker").css("background-color",'#fffdaf');
        $("#div_datapicker").css("color",'black');
      }
      $(this).data('datepicker').inline = false;
    },
    selectWeek: true,
    inline: true,
    showButtonPanel: true,
    startDate: '01/01/2020',
    firstDay: 1,
    timepicker: true,
    controlType: 'select',
    timeFormat: 'HH:mm'
  });
});
