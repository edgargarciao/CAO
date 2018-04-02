<?php
class Categoria
{
    /** Atributos */
    private $id;
    private $nombre;

    /** Metodos Get */
    public function getId(){
        return $this->id;
    }    
    public function getNombre(){
        return $this->nombre;
    }

    /** Metodos Set */
    public function setId($id){
        $this->id = $id;
    }    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
}

?>