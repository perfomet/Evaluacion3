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
        $query = "UPDATE persona SET PERSONA_ID=:rut, PERSONA_NOMBRE=:nombre,PERSONA_APELLIDO=:apellido,PERSONA_FECHA_NACIMIENTO=:fecha_nacimiento";
        
        $sentencia = $this->conexion->prepare($query);
        
        $rut = $registro->getId();
        $nombre = $registro->getNombre();
        $apellido = $registro->getApellido();
        $fechaNacimiento = $registro->getFechaNacimiento();
        
        $sentencia->bindParam(':rut', $rut);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':apellido', $apellido);
        $sentencia->bindParam(':fecha_nacimiento', $fechaNacimiento);       
              
        return $sentencia->execute();
    }

    public function agregar($registro) {
        $query = "INSERT INTO persona (PERSONA_ID,PERSONA_NOMBRE,PERSONA_APELLIDO,PERSONA_FECHA_NACIMIENTO) VALUES (:rut, :nombre, :apellido, :fecha_nacimiento) ";
        
        $sentencia = $this->conexion->prepare($query);
        
        $rut = $registro->getId();
        $nombre = $registro->getNombre();
        $apellido = $registro->getApellido();
        $fechaNacimiento = $registro->getFechaNacimiento();
        
        $sentencia->bindParam(':rut', $rut);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':apellido', $apellido);
        $sentencia->bindParam(':fecha_nacimiento', $fechaNacimiento);       
              
        return $sentencia->execute();
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
        return $this->conexion->query("DELETE FROM persona WHERE PERSONA_ID=".$idRegistro);
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
