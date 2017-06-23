<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once __DIR__."/../dao/DBConnection.php";
include_once __DIR__."/../dao/AtencionDAO.php";
include_once __DIR__."/../model/Persona.php";
include_once __DIR__."/../model/Comuna.php";
include_once __DIR__."/../model/Atencion.php";
/**
 * Description of AtencionController
 *
 * @author david
 */
class AtencionController {
    public static function agregarAtencion($rutBeneficiario, $idComuna, $fechaAtencion){
        $conexion = DBConnection::getConexion();
        $atencionDAO = new AtencionDAO($conexion);
        
        $atencion = new Atencion();
        $beneficiario = new Persona();
        $beneficiario->setRut($rutBeneficiario);
        $atencion->setBeneficiario($beneficiario);
        $comuna = new Comuna();
        $comuna->setId($idComuna);
        $atencion->setComuna($comuna);
        $atencion->setFechaAtencion($fechaAtencion);
        $atencion->setId(null);
        
        $atencionDAO->agregar($atencion);
    }
    
    public static function listarAtenciones(){
        $conexion = DBConnection::getConexion();
        $atencionDAO = new AtencionDAO($conexion);
        
        return json_encode($atencionDAO->listarTodos());
    }
}
