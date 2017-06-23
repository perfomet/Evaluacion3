<?php
include_once __DIR__."/../../backend/controller/CargaLegalController.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_GET["rut"])){
    echo CargaLegalController::getCargaLegalPorRutTitular($_GET["rut"]);
}else{
    echo CargaLegalController::listarCargasLegales();
}