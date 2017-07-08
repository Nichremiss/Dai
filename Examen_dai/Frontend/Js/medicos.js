
$(document).ready(function(){
   $.getJSON("/Examen_dai/Backend/ListarEspecialidades.php",function(especialidades){
      $.each(especialidades, function(indice, especialidad){
          
          jQuery("select[name='ddl_especialidad']").append("<option value=\"" + especialidad.especialidadID + "\">" + especialidad.especialidadDESC + "</option>");            
      }) ;
   });
});

   
