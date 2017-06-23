/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    cargarRegiones();
    $("#region").change(function () {
        $("#provincia").removeAttr("disabled");
        cargarProvincias($(this).val());
    });

    $("#provincia").change(function () {
        $("#comuna").removeAttr("disabled");
        cargarComunas($(this).val());
    });

    $("#rut").blur(function () {
        cargarPersona($(this).val());
    });

    $("#limpiar").click(function () {
        limpiar();
    });

    $("#agendar").click(function () {
        agendar();
    });
});

function cargarRegiones() {
    $.getJSON(
            "vistas/regiones.php",
            function (regiones) {
                $("#region").html("");
                $("#region").append("<option selected disabled value=''>- Región -</option>");
                $.each(regiones, function (i, r) {
                    $("#region").append("<option value='" + r.id + "'>" + r.nombre + "</option>");
                });
            }
    );
}

function cargarProvincias(region) {
    $.getJSON(
            "vistas/provincias.php",
            {region: region},
            function (provincias) {
                $("#provincia").html("");
                $("#provincia").append("<option selected disabled value=''>- Provincia -</option>");
                $.each(provincias, function (i, p) {
                    $("#provincia").append("<option value='" + p.id + "'>" + p.nombre + "</option>");
                });
            }
    );
}

function cargarComunas(provincia) {
    $.getJSON(
            "vistas/comunas.php",
            {provincia: provincia},
            function (comunas) {
                $("#comuna").html("");
                $("#comuna").append("<option selected disabled value=''>- Comuna -</option>");
                $.each(comunas, function (i, c) {
                    $("#comuna").append("<option value='" + c.id + "'>" + c.nombre + "</option>");
                });
            }
    );
}

function cargarBeneficiarios(rutTutor) {
    $.getJSON(
            "vistas/beneficiarios.php",
            {rut: rutTutor},
            function (beneficiarios) {
                $("#beneficiario").html("");
                $("#beneficiario").append("<option selected disabled value=''>- Beneficiario -</option>");
                $.each(beneficiarios, function (i, b) {
                    $("#beneficiario").append("<option value='" + b.beneficiario.rut + "'>" + b.beneficiario.nombre + " " + b.beneficiario.apellido + "</option>");
                });
            }
    );
}

function cargarPersona(rutPersona) {    
    $.getJSON(
            "vistas/personas.php",
            {rut: rutPersona},
            function (persona) {
                if(persona.rut !== null){
                    if(mayorDeEdad(persona.fechaNacimiento)){
                        $("#nombre").val(persona.nombre);
                        $("#apellido").val(persona.apellido);
                        $("#beneficiario").removeAttr("disabled");
                        cargarBeneficiarios($("#rut").val());
                    }else{
                      limpiar();
                        alert("El rut ingresado pertenece a una persona menor de 18 años.");  
                    }
                }else{
                    limpiar();
                    alert("El rut ingresado pertenece a una persona no registrada.");
                }
            }
    );
}

function limpiar() {
    $("#rut").val("");
    $("#nombre").val("");
    $("#apellido").val("");
    $("#fecha").val("");
    cargarRegiones();
    cargarProvincias("");
    $("#provincia").attr({"disabled": ""});
    cargarComunas("");
    $("#comuna").attr({"disabled": ""});
    cargarBeneficiarios("");
    $("#beneficiario").attr({"disabled": ""});
}

function comprobarFecha(fecha){
    if(fecha.length !== 10){
        return false;
    }
    
    var partes = fecha.split("-");
    if(partes.length !== 3){
        return false;
    }
    
    var actual = new Date();
    var fech = new Date(partes[2], partes[1]-1, partes[0]);
    
    if(fech < actual){
        return false;
    }
    
    return true;
}

function mayorDeEdad(fecha){
    var partes = fecha.split("-");
    var actual = new Date();
    var fech = new Date(partes[0], partes[1]-1, partes[2]);
    
    var dif = Math.round(Math.round(Math.round(Math.round(Math.round(Math.round(Math.round(Math.round(actual-fech)/1000)/60)/60)/24)/7)/4)/13);

    if(dif < 18){
        return false;
    }
    
    return true;
}

function agendar() {
    var exito = true;
    var rut = "";
    var comuna = "";
    var fecha = "";
    
    if($("#beneficiario").val() !== null){
        rut = $("#beneficiario").val();
    }else{
        exito = false;
        alert("No ha seleccionado un beneficiario válido.");
    }
    
    if($("#comuna").val() !== null){
        comuna = $("#comuna").val();
    }else{
        exito = false;
        alert("No ha seleccionado una comuna válida.");
    }
    
    if(comprobarFecha($("#fecha").val())){
        var partes = $("#fecha").val().split("-");
        fecha = partes[2]+"-"+(partes[1]-1)+"-"+partes[0];
    }else{
        exito = false;
        alert("No ha ingresado una fecha válida.");
    }
    

    if (exito) {
        $.getJSON(
                "vistas/atenciones.php",
                {
                    rut: rut,
                    comuna: comuna,
                    fecha: fecha
                },
                function (data) {
                    if(data.respuesta === "exito"){
                        alert("Consulta agendada exitosamente.");
                    }else{
                        alert("Error al agendar la consulta.");
                    }
                }
        );
    }
}