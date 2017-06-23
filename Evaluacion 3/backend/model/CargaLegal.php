<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CargaLegal
 *
 * @author david
 */
class CargaLegal {
    /**
     *
     * @var Persona 
     */
    private $titular;
    
    /**
     *
     * @var Persona 
     */
    private $beneficiario;
    
    function __construct() {
        
    }
    
    
    function getTitular() {
        return $this->titular;
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
     * @param Persona $titular
     */
    function setTitular($titular) {
        $this->titular = $titular;
    }

    /**
     * 
     * @param Persona $beneficiario
     */
    function setBeneficiario($beneficiario) {
        $this->beneficiario = $beneficiario;
    }

    function getPrivate(){
        return get_object_vars($this);
    }

}
