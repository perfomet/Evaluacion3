<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once __DIR__."/../dao/DBConnection.php";
include_once __DIR__."/../dao/PersonaDAO.php";
/**
 * Description of personaController
 *
 * @author david
 */
class personaController {
    /**
     * 
     * @return array()
     */
    public static function listarPersonas(){
        $conexion = DBConnection::getConexion();
        $personaDAO = new PersonaDAO($conexion);
        
        return json_encode($personaDAO->listarTodos());
    }
    
    public static function getPersonaPorRut($rut){
        /*@var $id int */
        $conexion = DBConnection::getConexion();
        $personaDAO = new PersonaDAO($conexion);
        
        return json_encode($personaDAO->buscarPorId($rut));
    }
}
