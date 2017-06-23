<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once __DIR__."/GenericDAO.php";
include_once __DIR__."/PersonaDAO.php";
include_once __DIR__."/../model/CargaLegal.php";
/**
 * Description of CargaLegalDAO
 *
 * @author david
 */
class CargaLegalDAO implements GenericDAO {
    /**
     *
     * @var PDO 
     */
    private $conexion;
    /**
     * 
     * @param PDO $conexion
     */
    function __construct($conexion){
        $this->conexion = $conexion;
    }
    
    //put your code here
    public function actualizar($registro) {
        
    }

    public function agregar($registro) {
        
    }

    public function buscarPorId($idRegistro) {
        $carga = new CargaLegal();
        
        $registros = $this->conexion->query("SELECT * FROM carga_legal WHERE BENEFICIARIO_ID=".$idRegistro);
        
        if($registros != null) {
            foreach($registros as $fila) {
                $personaDAO = new PersonaDAO($this->conexion);
                $carga->setBeneficiario($personaDAO->buscarPorId($fila["BENEFICIARIO_ID"]));
                $carga->setTitular($personaDAO->buscarPorId($fila["TITULAR_ID"]));
            }
        }
        
        return $carga->getPrivate();
    }

    public function eliminar($idRegistro) {
        
    }

    public function listarTodos() {
        $listado = array();
        
        $registros = $this->conexion->query("SELECT * FROM carga_legal");
        
        if($registros != null) {
            foreach($registros as $fila) {
                $carga = new CargaLegal();
                $personaDAO = new PersonaDAO($this->conexion);
                $carga->setBeneficiario($personaDAO->buscarPorId($fila["BENEFICIARIO_ID"]));
                $carga->setTitular($personaDAO->buscarPorId($fila["TITULAR_ID"]));

                array_push($listado, $carga->getPrivate());
            }
        }
        
        return $listado;
    }
    
    public function buscarPorRutTitular($rutTitular) {
        $listado = array();
        
        $registros = $this->conexion->query("SELECT * FROM carga_legal WHERE TITULAR_ID=".$rutTitular);
        
        if($registros != null) {
            foreach($registros as $fila) {
                $carga = new CargaLegal();
                $personaDAO = new PersonaDAO($this->conexion);
                $carga->setBeneficiario($personaDAO->buscarPorId($fila["BENEFICIARIO_ID"]));
                $carga->setTitular($personaDAO->buscarPorId($fila["TITULAR_ID"]));
                
                array_push($listado, $carga->getPrivate());
            }
        }
        
        return $listado;
    }

}
