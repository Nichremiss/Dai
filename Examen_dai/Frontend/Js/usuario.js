$(document).ready(function(){
   $.getJSON("/Examen_dai/Backend/ListarTipoUsuarios.php",function(Tipos){
        jQuery.each(Tipos, function (indice, tipo) {
            jQuery("select[name='ddl_Tipo_user']").append("<option value=\"" + tipo.tipoID + "\">" + tipo.tipoDESC + "</option>");            
        });
   }) ;
   
   $("input[name='rut']").blur(function (){
        $.getJSON("/Examen_dai/Backend/BuscarUsuario.php",{id:this.value},
            function(registro){
                jQuery("input[name='nombre']").val(registro.usuarioNombre);
                jQuery("input[name='nombre']").attr("readonly", true);
                   $.getJSON("/Examen_dai/Backend/BuscarTipoUSer.php",{id:registro.usuarioTipo},
                    function(user){
                        alert(user.tipoID);
                        $("input[name='tipoUser']").val(user.tipoDESC);
                         $("input[name='tipoUSer']").attr("readonly",true);
                         alert(user.tipoDESC);
                    }); 
            }) ;
    });
});