<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once __DIR__."/../dao/DBConnection.php";
include_once __DIR__."/../dao/ProvinciaDAO.php";
/**
 * Description of ProvinciaController
 *
 * @author david
 */
class ProvinciaController {
    /**
     * 
     * @return array()
     */
    public static function listarProvincias(){
        $conexion = DBConnection::getConexion();
        $provinciaDAO = new ProvinciaDAO($conexion);
        
        return json_encode($provinciaDAO->listarTodos());
    }
    
    public static function getProvinciaPorRegion($region){
        /*@var $id int */
        $conexion = DBConnection::getConexion();
        $provinciaDAO = new ProvinciaDAO($conexion);
        
        return json_encode($provinciaDAO->buscarPorRegion($region));
    }
}
