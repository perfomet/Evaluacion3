<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once __DIR__."/../dao/DBConnection.php";
include_once __DIR__."/../dao/CargaLegalDAO.php";
/**
 * Description of CargaLegalController
 *
 * @author david
 */
class CargaLegalController {
    /**
     * 
     * @return array()
     */
    public static function listarCargasLegales(){
        $conexion = DBConnection::getConexion();
        $cargaLegalDAO = new CargaLegalDAO($conexion);
        
        return json_encode($cargaLegalDAO->listarTodos());
    }
    
    public static function getCargaLegalPorRutTitular($rut){
        /*@var $id int */
        $conexion = DBConnection::getConexion();
        $cargaLegalDAO = new CargaLegalDAO($conexion);
        
        return json_encode($cargaLegalDAO->buscarPorRutTitular($rut));
    }
}
