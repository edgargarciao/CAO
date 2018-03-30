<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/CAO_ORD/CAO_DES/dao/TipoMatriculaDao.php');
class TipoMatriculaController{
        
    private static $instance;

    private $tipoMatriculaDao;

    // Constructor para instanciar el atributo tipoMatriculaDao
    public function __construct(){
        $this->tipoMatriculaDao = new TipoMatriculaDao();
    }

    // retornamos todos los tipos de matriculas
    function buscarTiposDeMatriculas(){        
        return $this->tipoMatriculaDao->buscarTiposDeMatriculas();
    }
}

?>