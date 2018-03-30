<?php
class Tiporegistro
{
    /** Atributos */    
    private $idTipoRegistro;
    private $nombreTipoRegistro;    
    private $descripcion;

    /** Metodos Get */
    public function getIdTipoRegistro(){
        return $this->idTipoRegistro;
    }    
    public function getNombreTipoRegistro(){
        return $this->nombreTipoRegistro;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
  
    /** Metodos Set */
    public function setIdTipoRegistro($idTipoRegistro){
        $this->idTipoRegistro = $idTipoRegistro;
    }    
    public function setNombreTipoRegistro($nombreTipoRegistro){
        $this->nombreTipoRegistro = $nombreTipoRegistro;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
}

?>