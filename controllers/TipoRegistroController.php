<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/CAO_ORD/CAO_DES/dao/TipoRegistroDao.php');
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