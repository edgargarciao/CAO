<?php
class Categoria
{
    /** Atributos */
    private $idCategoria;
    private $nombreCategoria;

    /** Metodos Get */
    public function getIdCategoria(){
        return $this->idCategoria;
    }    
    public function getNombreCategoria(){
        return $this->nombreCategoria;
    }

    /** Metodos Set */
    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria;
    }    
    public function setNombreCategoria($nombreCategoria){
        $this->nombreCategoria = $nombreCategoria;
    }
}

?>