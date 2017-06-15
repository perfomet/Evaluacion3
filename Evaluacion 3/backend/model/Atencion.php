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
    private $id, $beneficiarion, $fechaAtencion, $comuna;
    
    function __construct() {
        
    }
    
    function getId() {
        return $this->id;
    }

    function getBeneficiarion() {
        return $this->beneficiarion;
    }

    function getFechaAtencion() {
        return $this->fechaAtencion;
    }

    function getComuna() {
        return $this->comuna;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setBeneficiarion($beneficiarion) {
        $this->beneficiarion = $beneficiarion;
    }

    function setFechaAtencion($fechaAtencion) {
        $this->fechaAtencion = $fechaAtencion;
    }

    function setComuna($comuna) {
        $this->comuna = $comuna;
    }

}
