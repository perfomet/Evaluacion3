<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Provincia
 *
 * @author david
 */
class Provincia {
    private $id, $nombre, $region;
    
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
     * @return Region
     */
    function getRegion() {
        return $this->region;
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
     * @param Region $region
     */
    function setRegion($region) {
        /*@var $region Region */
        $this->region = $region;
    }
    
    public function getPrivate(){
        return get_object_vars($this);
    }

}
