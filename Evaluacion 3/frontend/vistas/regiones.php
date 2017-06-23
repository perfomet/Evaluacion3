<?php
include_once __DIR__."/../../backend/controller/RegionController.php";

if(isset($_GET["id"])){
    echo RegionController::getRegonPorId($_GET["id"]);
}else{
    echo RegionController::listarRegiones();
}

