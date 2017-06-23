<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Persona
 *
 * @author david
 */
class Persona {
    private $rut, $nombre, $apellido, $fechaNacimiento;
    
    function __construct() {
        
    }
    
    /**
     * 
     * @return int
     */
    function getRut() {
        return $this->rut;
    }

    /**
     * 
     * @return string
     */
    function getNombre() {
        return $this->nombre;
    }

    /**
     * 
     * @return string
     */
    function getApellido() {
        return $this->apellido;
    }

    /**
     * 
     * @return DateTime
     */
    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }
    
    /**
     * 
     * @param int $rut
     */
    function setRut($rut) {
        /*@var $rut int */
        $this->rut = $rut;
    }
    
    /**
     * 
     * @param string $nombre
     */
    function setNombre($nombre) {
        /*@var $nombre string */
        $this->nombre = $nombre;
    }

    /**
     * 
     * @param string $apellido
     */
    function setApellido($apellido) {
        /*@var $apellido string */
        $this->apellido = $apellido;
    }

    /**
     * 
     * @param DateTime $fechaNacimiento
     */
    function setFechaNacimiento($fechaNacimiento) {
        /*@var $fechaNacimiento DateTime */
        $this->fechaNacimiento = $fechaNacimiento;
    }
    
    public function getPrivate(){
        return get_object_vars($this);
    }

}
