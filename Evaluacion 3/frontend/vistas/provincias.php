<?php
include_once __DIR__."/../../backend/controller/ProvinciaController.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_GET["region"])){
    echo ProvinciaController::getProvinciaPorRegion($_GET["region"]);
}else{
    echo ProvinciaController::listarProvincias();
}
