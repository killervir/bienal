{{-- js --}}
<script
			  src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Vendor JQUERY -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
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
        $("#fechaNacimiento").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            yearRange: "1910:2021"
        });
    });
</script>
<script>
$(document).ready( function(){
     
    if( $(".home").length > 0){
        console.log("casa");
        seccion = $("#preguntas-frecuentes");
        $("#btn-pf").on( "click", function(e){
           e.preventDefault();
            
            $('html, body').animate({
          scrollTop: seccion.offset().top
        }, 1000);
        });
    }
});
</script>


{{-- Estos son para agregar o quitar participantes de la postulacion colectiva --}}
<script>
//when the Add Field button is clicked
$("#add").click(function (e) {
    //Append a new row of code to the "#items" div
    $("#items").append('<div><input class="form-control" id="integrantes[]" name="integrantes[]" type="text" /><button class="delete btn btn-outline-danger" ">Eliminar</button></div>');
});

    $("body").on("click", ".delete", function (e) {
        $(this).parent("div").remove();
    });

{{-- @if(old('tipoPostulacion'))

    @else --}}
    $("#tipoPostulacion").change(function () {
        var selectedTipoPostulacion = $(this).children("option:selected").val();
        if(selectedTipoPostulacion==1){
           $("#divIndividual").css("display", "block");
           $("#divColectivo").css("display", "none");
           $("#divRepresentante").css("display", "none");
           $("#divColectiva").css("display", "none");
           $("#divFormulario").css("display", "block");
           $("#divProyecto").css("display", "block");
           $("#divCondiciones").css("display", "block");

           }
        if(selectedTipoPostulacion==2){
            $("#divIndividual").css("display", "none");
            $("#divColectivo").css("display", "block");
            $("#divRepresentante").css("display", "block");
            $("#divColectiva").css("display", "block");
           $("#divFormulario").css("display", "block");
           $("#divProyecto").css("display", "block");
           $("#divCondiciones").css("display", "block");
        }
    });
$("#tipoPostulacion").bind("change", function(){}).change();
{{--@endif--}}

$('#documentosPersonales').on("change",function () {
    //var id=$(this).attr('id');

    id="#documentosPersonales";
    console.log(id);
    var archivo=$(id).val();

    var fileExtension = ['pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Solo se permiten archivos '.pdf'!");
        this.value = '';
        $(id).focus();
        return false;
        //$('#spanFileName').html("Solo se aceptan archivos '.pdf'!");
    }
    else {
        //$('#spanFileName').html(this.value);


        //do what ever you want
        if (this.files.length > 0) {
            $.each(this.files, function (index, value) {
                var tamanio=Math.round((value.size / 1024));
                if(tamanio>2048) {
                    alert("El archivo excede los 2Mb, por favor verifique.");
                    $(id).val('');
                    $(id).value = '';
                    $(id).focus();
                    return false;
                }
            })
        }
    }
});
$('#adjuntarProyecto').on("change",function () {
    //var id=$(this).attr('id');
   //valor
    id="#adjuntarProyecto";
    console.log(id);
    var archivo=$(id).val();

    var fileExtension = ['pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Solo se permiten archivos '.pdf'!");
        this.value = '';
        $(id).focus();
        return false;
        //$('#spanFileName').html("Solo se aceptan archivos '.pdf'!");
    }
    else {
        //$('#spanFileName').html(this.value);


        //do what ever you want
        if (this.files.length > 0) {
            $.each(this.files, function (index, value) {
                var tamanio=Math.round((value.size / 1024));
                if(tamanio>15360) {
                    alert("El archivo excede los 15Mb, por favor verifique.");
                    $(id).val('');
                    $(id).value = '';
                    $(id).focus();
                    return false;
                }
            })
        }
    }
});

@if(strpos(url()->current(),'registrarse')!==false || strpos(url()->current(),'editar')!==false)

$('#semblanza').keyup(function() {
  var maxLength = 500;
  var textlen = maxLength - $(this).val().length;
  if(textlen.length==0) $('#semblanza').attr('disabled','true');
  $('#rchars').text(textlen);
});


$('#descripcionProyecto').keyup(function() {
  var maxLength = 200;
  var textlen = maxLength - $(this).val().length;
  if(textlen.length==0) $('#descripcionProyecto').attr('disabled','true');
  $('#rcharsd').text(textlen);
});

$(document).ready(function(){
  $("#registroForm").on("submit", function(){
     
    $("#pageloader").css("display", "block");;
//$("#pageloader").addClass( "fade-in" );    
  });//submit
});//document ready
@endif  

function getConfirmation() {
               var retVal = confirm("Una vez enviada la postulación ya no se podrán realizar cambios.");               
               if( retVal == true ) {
                  //document.write ("User wants to continue!");
                  return true;
               } /*else {                  
                  return false;
               }*/
            }
</script>

