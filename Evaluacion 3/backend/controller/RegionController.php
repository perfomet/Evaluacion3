<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once __DIR__."/../dao/DBConnection.php";
include_once __DIR__."/../dao/RegionDAO.php";
/**
 * Description of RegionController
 *
 * @author david
 */
class RegionController {
    /**
     * 
     * @return array()
     */
    public static function listarRegiones(){
        $conexion = DBConnection::getConexion();
        $regionDAO = new RegionDAO($conexion);
        return json_encode($regionDAO->listarTodos());
    }
    
    public static function getRegonPorId($id){
        /*@var $id int */
        $conexion = DBConnection::getConexion();
        $regionDAO = new RegionDAO($conexion);
        
        return json_encode($regionDAO->buscarPorId($id));
    }
}
