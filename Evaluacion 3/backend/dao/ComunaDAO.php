<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once __DIR__."/GenericDAO.php";
include_once __DIR__."/ProvinciaDAO.php";
include_once __DIR__."/../model/Comuna.php";
/**
 * Description of ComunaDAO
 *
 * @author david
 */
class ComunaDAO implements GenericDAO {
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
        $comuna = new Comuna();
        
        $registros = $this->conexion->query("SELECT * FROM comuna WHERE COMUNA_ID=".$idRegistro);
        
        if($registros != null) {
            foreach($registros as $fila) {
                $comuna->setId($fila["COMUNA_ID"]);
                $comuna->setNombre($fila["COMUNA_NOMBRE"]);
                $provinciaDAO = new ProvinciaDAO($this->conexion);
                $comuna->setProvincia($provinciaDAO->buscarPorId($fila["COMUNA_PROVINCIA_ID"]));
            }
        }
        
        return $comuna->getPrivate();
    }

    public function eliminar($idRegistro) {
        
    }

    public function listarTodos() {
        $listado = array();
        
        $registros = $this->conexion->query("SELECT * FROM comuna");
        
        if($registros != null) {
            foreach($registros as $fila) {
                $comuna = new Comuna();
                $comuna->setId($fila["COMUNA_ID"]);
                $comuna->setNombre($fila["COMUNA_NOMBRE"]);
                $provinciaDAO = new ProvinciaDAO($this->conexion);
                $comuna->setProvincia($provinciaDAO->buscarPorId($fila["COMUNA_PROVINCIA_ID"]));

                array_push($listado, $comuna->getPrivate());
            }
        }
        
        return $listado;
    }
    
    public function buscarPorProvincia($idProvincia) {
        $listado = array();
        
        $registros = $this->conexion->query("SELECT * FROM comuna WHERE COMUNA_PROVINCIA_ID=".$idProvincia);
        
        if($registros != null) {
            foreach($registros as $fila) {
                $comuna = new Comuna();
                $comuna->setId($fila["COMUNA_ID"]);
                $comuna->setNombre($fila["COMUNA_NOMBRE"]);
                $provinciaDAO = new ProvinciaDAO($this->conexion);
                $comuna->setProvincia($provinciaDAO->buscarPorId($fila["COMUNA_PROVINCIA_ID"]));
                array_push($listado, $comuna->getPrivate());
            }
        }
        
        return $listado;
    }

}
