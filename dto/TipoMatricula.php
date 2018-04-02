<?php
class TipoMatricula
{
    /** Atributos */
    private $id;
    private $nombre;
    private $tipoRegistro;
    private $descripcion;
    private $fecha_creacion;
    private $fecha_inicio;
    private $fecha_fin;

    /** Metodos Get */
    public function getId(){
        return $this->id;
    }
    
    public function getNombre(){
        return $this->nombre;
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
    public function setId($id){
        $this->id = $id;
    }    
    public function setNombre($nombre){
        $this->nombre = $nombre;
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