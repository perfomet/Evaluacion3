<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once __DIR__."/../dao/DBConnection.php";
include_once __DIR__."/../dao/ComunaDAO.php";
/**
 * Description of ComunaController
 *
 * @author david
 */
class ComunaController {
    /**
     * 
     * @return array()
     */
    public static function listarComunas(){
        $conexion = DBConnection::getConexion();
        $comunaDAO = new ComunaDAO($conexion);
        
        return json_encode($comunaDAO->listarTodos());
    }
    
    public static function getComunaPorProvincia($provincia){
        /*@var $id int */
        $conexion = DBConnection::getConexion();
        $comunaDAO = new ComunaDAO($conexion);
        
        return json_encode($comunaDAO->buscarPorProvincia($provincia));
    }
}
