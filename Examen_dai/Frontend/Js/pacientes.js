$(document).ready(function(){
   $("input[name='rut']").blur(function (){
        $.getJSON("/Examen_dai/Backend/BuscarPaciente.php",{id:this.value},
            function(registro){
                jQuery("input[name='nombre']").val(registro.pacienteNombreCompleto);
                jQuery("input[name='nombre']").attr("readonly", true);
                $("input[name='fecha']").val(registro.pacienteFechaNacimiento);
                $("input[name='fecha']").attr("readonly",true);
                $("input[name='direccion']").val(registro.pacienteDomicilio);
                $("input[name='direccion']").attr("readonly",true);
                $("input[name='telefono']").val(registro.pacienteTelefono);
                $("input[name='telefono']").attr("readonly",true);
            }) ;
    });
 
});
