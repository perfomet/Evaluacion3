<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Atencion
 *
 * @author david
 */
class Atencion {
    private $id, $beneficiario, $fechaAtencion, $comuna;
    
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
     * @return Persona
     */
    function getBeneficiario() {
        return $this->beneficiario;
    }
    
    /**
     * 
     * @return DateTime
     */
    function getFechaAtencion() {
        return $this->fechaAtencion;
    }
    
    /**
     * 
     * @return Comuna
     */
    function getComuna() {
        return $this->comuna;
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
     * @param Persona $beneficiario
     */
    function setBeneficiario($beneficiario) {
        /*@var $beneficiario Persona */
        $this->beneficiario = $beneficiario;
    }
    
    /**
     * 
     * @param DateTime $fechaAtencion
     */
    function setFechaAtencion($fechaAtencion) {
        /*@var $fechaAtencion DateTime */
        $this->fechaAtencion = $fechaAtencion;
    }

    /**
     * 
     * @param Comuna $comuna
     */
    function setComuna($comuna) {
        /*@var $comuna Comuna */
        $this->comuna = $comuna;
    }
    
    public function getPrivate(){
        return get_object_vars($this);
    }

}
