<?php

require_once(dirname( __DIR__ ).DIRECTORY_SEPARATOR.'dao'.DIRECTORY_SEPARATOR.'TipoRegistroDao.php');
class TipoRegistroController{
        
    private $tipoRegistroDao;

    // Constructor para instanciar el atributo tipoRegistroDao
    public function __construct(){
        $this->tipoRegistroDao = new TipoRegistroDao();
    }

    // retornamos todos los tipos de registros
    function buscarTiposDeRegistro(){        
        return $this->tipoRegistroDao->buscarTiposDeRegistro();
    }
}

?>