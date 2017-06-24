/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function (){
   var parametros = window.location.search.substring(1).split("&");
   var rut = parametros[0].split("=")[1];
   var comuna = parametros[1].split("=")[1];
   var tmpFecha = parametros[2].split("=")[1].split("-");
   var fecha = tmpFecha[0]+"-";
   if(tmpFecha[1].length < 2){
       fecha += "0";
   }
   fecha += tmpFecha[1]+"-";
   if(tmpFecha[2].length < 2){
       fecha += "0";
   }
   fecha += tmpFecha[2];
   $("#reRut").html(rut);
   $("#reFecha").html(fecha.replace(/-/g, "/"));
   $.getJSON(
           "vistas/atenciones.php",
            function (atenciones){
                $.each(atenciones, function (i, a){
                    if((a.beneficiario.rut.trim() === rut.trim()) && (a.fechaAtencion.trim() === fecha.trim()) && (a.comuna.id.trim() === comuna.trim())){
                        $("#reNombre").html(a.beneficiario.nombre+" "+a.beneficiario.apellido);
                        $("#reComuna").html(a.comuna.nombre);
                    }
                });
            }
    );
});
