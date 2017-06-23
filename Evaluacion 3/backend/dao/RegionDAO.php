<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once __DIR__."/GenericDAO.php";
include_once __DIR__."/../model/Region.php";
/**
 * Description of RegionDAO
 *
 * @author david
 */
class RegionDAO implements GenericDAO {
    /**
     *
     * @var PDO 
     */
    private $conexion;
    
    /**
     * 
     * @param PDO $conexion
     */
    function __construct(PDO $conexion) {
        $this->conexion = $conexion;
    }

    
    //put your code here
    public function actualizar($registro) {
        
    }

    public function agregar($registro) {
        
    }

    public function buscarPorId($idRegistro) {
        $region = new Region();
        
        $registros = $this->conexion->query("SELECT * FROM region WHERE REGION_ID=".$idRegistro);
        
        if($registros != null) {
            foreach($registros as $fila) {
                $region->setId($fila["REGION_ID"]);
                $region->setNombre($fila["REGION_NOMBRE"]);
                $region->setIso31662CL($fila["ISO_3166_2_CL"]);
            }
        }
        
        return $region->getPrivate();
    }

    public function eliminar($idRegistro) {
        
    }

    public function listarTodos() {
        $listado = array();
       
        $registros = $this->conexion->query("SELECT * FROM region");
        
        if($registros != null) {
            foreach($registros as $fila) {
                $region = new Region();
                $region->setId($fila["REGION_ID"]);
                $region->setNombre($fila["REGION_NOMBRE"]);
                $region->setIso31662CL($fila["ISO_3166_2_CL"]);
                array_push($listado, $region->getPrivate());
            }
        }
        
        return $listado;
    }

}
