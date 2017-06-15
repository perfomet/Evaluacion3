<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once __DIR__."/GenericDAO.php";
include_once __DIR__."/../model/Persona.php";
/**
 * Description of PersonaDAO
 *
 * @author david
 */
class PersonaDAO implements GenericDAO {
    private $conexion;
    
    /**
     * 
     * @param type $conexion
     */
    public function _construct($conexion){
        $this->conexion = $conexion;
    }

    //put your code here
    public function actualizar($registro) {
    }

    public function agregar($registro) {
    }

    public function buscarPorId($idRegistro) {
        $persona = new Persona();
        
        $registros = $this->conexion->query("SELECT * FROM persona WHERE PERSONA_ID=".$idRegistro);
        
        if($registros != null) {
            foreach($registros as $fila) {
                $persona->setRut($fila["PERSONA_ID"]);
                $persona->setNombre($fila["PERSONA_NOMBRE"]);
                $persona->setApellido($fila["PERSONA_APELLIDO"]);
                $persona->setFechaNacimiento($fila["PERSONA_FECHA_NACIMIENTO"]);
            }
        }
        
        return $persona;
    }

    public function eliminar($idRegistro) {
    }

    public function listarTodos() {
        $listado = array();
        
        $registros = $this->conexion->query("SELECT * FROM persona");
        
        if($registros != null) {
            foreach($registros as $fila) {
                $persona = new Persona();
                $persona->setRut($fila["PERSONA_ID"]);
                $persona->setNombre($fila["PERSONA_NOMBRE"]);
                $persona->setApellido($fila["PERSONA_APELLIDO"]);
                $persona->setFechaNacimiento($fila["PERSONA_FECHA_NACIMIENTO"]);

                array_push($listado, $persona);
            }
        }
        
        return $listado;
    }

}
