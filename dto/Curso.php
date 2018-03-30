<?php
class Curso
{
    /** Atributos */
    private $idTipoMatricula;
    private $nombreTipoMatricula;
    private $tipoRegistro;
    private $descripcion;
    private $fecha_creacion;
    private $fecha_inicio;
    private $fecha_fin;

    /** Metodos Get */
    public function getIdTipoMatricula(){
        return $this->idTipoMatricula;
    }
    
    public function getNombreTipoMatricula(){
        return $this->nombreTipoMatricula;
    }
    public function getTipoRegistro(){
        return $this->tipoRegistro;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getFecha_creacion(){
        return $this->fecha_creacion;
    }
    public function getFecha_inicio(){
        return $this->fecha_inicio;
    }
    public function getFecha_fin(){
        return $this->fecha_fin;
    }

    /** Metodos Set */
    public function setIdTipoMatricula($idTipoMatricula){
        $this->idTipoMatricula = $idTipoMatricula;
    }    
    public function setNombreTipoMatricula($nombreTipoMatricula){
        $this->nombreTipoMatricula = $nombreTipoMatricula;
    }
    public function setTipoRegistro($tipoRegistro){
        $this->tipoRegistro = $tipoRegistro;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function setFecha_creacion($fecha_creacion){
        $this->fecha_creacion = $fecha_creacion;
    }
    public function setFecha_inicio($fecha_inicio){
        $this->fecha_inicio = $fecha_inicio;
    }
    public function setFecha_fin($fecha_fin){
        $this->fecha_fin = $fecha_fin;
    }
}

?>