<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Region
 *
 * @author david
 */
class Region {
    private $id, $nombre, $iso31662CL;
    
    function __construct() {
        
    }
    
    /**
     * 
     * @return int
     */
    function getId() {
        return $this->id;
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
    function getIso31662CL() {
        return $this->iso31662CL;
    }

    /**
     * 
     * @param int $id
     */
    function setId($id) {
        /*@var $id int */
        $this->id = $id;
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
     * @param string $iso31662CL
     */
    function setIso31662CL($iso31662CL) {
        /*@var $iso31662CL string */
        $this->iso31662CL = $iso31662CL;
    }
    
    public function getPrivate(){
        return get_object_vars($this);
    }
}
