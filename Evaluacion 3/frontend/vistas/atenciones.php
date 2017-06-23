<?php

include_once __DIR__ . "/../../backend/controller/AtencionController.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET["rut"]) && isset($_GET["comuna"]) && isset($_GET["fecha"])) {
    AtencionController::agregarAtencion($_GET["rut"], $_GET["comuna"], $_GET["fecha"]);
    echo '{"respuesta":"exito"}';
} else {
    echo AtencionController::listarAtenciones();
}