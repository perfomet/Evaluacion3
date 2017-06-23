<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comuna
 *
 * @author david
 */
class Comuna {
    private $id, $nombre, $provincia;
    
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
     * @return Provincia
     */
    function getProvincia() {
        return $this->provincia;
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
     * @param Provincia $provincia
     */
    function setProvincia($provincia) {
        /*@var $provincia Provincia */
        $this->provincia = $provincia;
    }
    
    public function getPrivate(){
        return get_object_vars($this);
    }

}
