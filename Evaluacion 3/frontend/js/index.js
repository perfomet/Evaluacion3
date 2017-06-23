/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function (){
    cargarAtenciones();
});

function cargarAtenciones(){
    $.getJSON(
                "vistas/atenciones.php",
                function (atenciones) {
                    $.each(atenciones, function (i, a){
                        console.log(a.id);
                        var atencion = "<tr>";
                        atencion += "<td>"+a.id+"</td>";
                        atencion += "<td>"+a.beneficiario.rut+"</td>";
                        atencion += "<td>"+a.comuna.nombre+"</td>";
                        atencion += "<td>"+a.fechaAtencion+"</td>";
                        atencion += "</tr>"
                       $("#agendas").append(atencion); 
                    });
                }
        );
}