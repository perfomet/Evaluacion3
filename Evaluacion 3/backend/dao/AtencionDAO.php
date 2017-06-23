<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once __DIR__."/GenericDAO.php";
include_once __DIR__."/PersonaDAO.php";
include_once __DIR__."/ComunaDAO.php";
include_once __DIR__."/../model/Atencion.php";
/**
 * Description of AtencionDAO
 *
 * @author david
 */
class AtencionDAO implements GenericDAO {
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
        /*@var $conexion PDO */
        $this->conexion = $conexion;
    }
    
    //put your code here
    /**
     * 
     * @param Atencion $registro
     */
    public function actualizar($registro) {
        /*@var $registro Atencion */
    }
    
    /**
     * 
     * @param Atencion $registro
     * @return PDOStatement
     */
    public function agregar($registro) {
        /*@var $registro Atencion */
        $query = "INSERT INTO atencion (ATENCION_ID,BENEFICIARIO_ID,FECHA_ATENCION,COMUNA_ID) VALUES (:id, :beneficiario, :fecha_atencion, :comuna) ";
        
        $sentencia = $this->conexion->prepare($query);
        
        $id = $registro->getId();
        $beneficiario = $registro->getBeneficiario()->getRut();
        $fecha_atencion = $registro->getFechaAtencion();
        $comuna = $registro->getComuna()->getId();
        
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':beneficiario', $beneficiario);
        $sentencia->bindParam(':fecha_atencion', $fecha_atencion);
        $sentencia->bindParam(':comuna', $comuna);        
              
        return $sentencia->execute();
    }
    
    /**
     * 
     * @param int $idRegistro
     * @return Atencion
     */
    public function buscarPorId($idRegistro) {
        /*@var $idRegistro int */
    }
    
    /**
     * 
     * @param int $idRegistro
     */
    public function eliminar($idRegistro) {
        /*@var $idRegistro int */
    }
    
    /**
     * @return array()
     */
    public function listarTodos() {
        $listado = array();
        
        $registros = $this->conexion->query("SELECT * FROM atencion");
        
        if($registros != null) {
            foreach($registros as $fila) {
                $atencion = new Atencion();
                $personaDAO = new PersonaDAO($this->conexion);
                $atencion->setBeneficiario($personaDAO->buscarPorId($fila["BENEFICIARIO_ID"]));
                $comunaDAO = new ComunaDAO($this->conexion);
                $atencion->setComuna($comunaDAO->buscarPorId($fila["COMUNA_ID"]));
                $atencion->setFechaAtencion($fila["FECHA_ATENCION"]);
                $atencion->setId($fila["ATENCION_ID"]);
                
                array_push($listado, $atencion->getPrivate());
            }
        }
        
        return $listado;
    }

}
