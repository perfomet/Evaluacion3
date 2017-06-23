<?php
include_once __DIR__."/../../backend/controller/ComunaController.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_GET["provincia"])){
    echo ComunaController::getComunaPorProvincia($_GET["provincia"]);
}else{
    echo ComunaController::listarComunas();
}