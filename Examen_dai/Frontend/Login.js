
jQuery(document).ready(function () {
    jQuery("#ocultarId").hide();
    /**
     * Manejo del campo RUT
     
     jQuery("input[name='rut']").Rut({format_on:'keyup'});
     */
    jQuery("#rut").blur(function () {
        if (this.value !== "") {

            if (!validarRut()) {
                jQuery(this).addClass("error");
                jQuery("#txtRutInvalido").html("Rut invalido");
                jQuery("#rut").css("border-color", "red");
                jQuery("#password").val("border-color", "red");
                jQuery("#btn").attr("disabled", true);


                return;
            } else {
                jQuery(this).removeClass("error");
                jQuery("#txtRutInvalido").html("");
                jQuery("#rut").css("border-color", "darkgrey");
                var dv = jQuery.Rut.getDigito(jQuery("#rut").val());
                var formato = jQuery.Rut.formatear(jQuery("#rut").val(), dv);
                jQuery("#rut").val(formato);
                jQuery("#btn").attr("disabled", false);
            }


        }
    });
});

function validarRut() {
    var ingreso = jQuery("#rut").val();
    var dv = jQuery.Rut.getDigito(ingreso);
    var rut = ingreso + dv;
    return jQuery.Rut.validar(ingreso);
}

  