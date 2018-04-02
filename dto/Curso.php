<?php
class Curso
{
    /** Atributos */
    private $id;
    private $nombreCorto;
    private $nombreCompleto;
    private $categoria;
    
    /** Metodos Get */
    public function getId(){
        return $this->id;
    }
    public function getNombreCorto(){
        return $this->nombreCorto;
    }
    public function getNombreCompleto(){
        return $this->nombreCompleto;
    }
    public function getCategoria(){
        return $this->categoria;
    }

    /** Metodos Set */
    public function setId($id){
        $this->id = $id;
    }    
    public function setNombreCorto($nombreCorto){
        $this->nombreCorto = $nombreCorto;
    }
    public function setNombreCompleto($nombreCompleto){
        $this->nombreCompleto = $nombreCompleto;
    }
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
}

?>