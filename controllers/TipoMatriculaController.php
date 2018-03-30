<?php

require_once(dirname( __DIR__ ).DIRECTORY_SEPARATOR.'dao'.DIRECTORY_SEPARATOR.'TipoMatriculaDao.php');
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