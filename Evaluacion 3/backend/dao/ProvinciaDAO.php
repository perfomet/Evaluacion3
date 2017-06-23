<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once __DIR__."/GenericDAO.php";
include_once __DIR__."/RegionDAO.php";
include_once __DIR__."/../model/Provincia.php";
/**
 * Description of ProvinciaDAO
 *
 * @author david
 */
class ProvinciaDAO implements GenericDAO {
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
        $provincia = new Provincia();
        
        $registros = $this->conexion->query("SELECT * FROM provincia WHERE PROVINCIA_REGION_ID=".$idRegistro);
        
        if($registros != null) {
            foreach($registros as $fila) {
                $provincia->setId($fila["PROVINCIA_ID"]);
                $provincia->setNombre($fila["PROVINCIA_NOMBRE"]);
                $regionDAO = new RegionDAO($this->conexion);
                $provincia->setRegion($regionDAO->buscarPorId($fila["PROVINCIA_REGION_ID"]));
            }
        }
        
        return $provincia->getPrivate();
    }

    public function eliminar($idRegistro) {
        
    }

    public function listarTodos() {
        $listado = array();
        
        $registros = $this->conexion->query("SELECT * FROM provincia");
        
        if($registros != null) {
            foreach($registros as $fila) {
                $provincia = new Provincia();
                $provincia->setId($fila["PROVINCIA_ID"]);
                $provincia->setNombre($fila["PROVINCIA_NOMBRE"]);
                $regionDAO = new RegionDAO();
                $provincia->setRegion($regionDAO->buscarPorId($fila["PROVINCIA_REGION_ID"]));

                array_push($listado, $provincia->getPrivate());
            }
        }
        
        return $listado;
    }
    
    public function buscarPorRegion($idRegion){
        $listado = array();
        
        $registros = $this->conexion->query("SELECT * FROM provincia WHERE PROVINCIA_REGION_ID=".$idRegion);
        
        if($registros != null) {
            foreach($registros as $fila) {
                $provincia = new Provincia();
                $provincia->setId($fila["PROVINCIA_ID"]);
                $provincia->setNombre($fila["PROVINCIA_NOMBRE"]);
                $regionDAO = new RegionDAO($this->conexion);
                $provincia->setRegion($regionDAO->buscarPorId($fila["PROVINCIA_REGION_ID"]));
                
                array_push($listado, $provincia->getPrivate());
            }
        }
        
        return $listado;
    }

}
