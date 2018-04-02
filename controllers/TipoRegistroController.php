<?php

require_once(dirname( __DIR__ ).DIRECTORY_SEPARATOR.'dao'.DIRECTORY_SEPARATOR.'TipoRegistroDao.php');
class TipoRegistroController{
     
    private static $instancia;
    private $tipoRegistroDao;

    // Método para obtener la instancia de la clase.
    public static function getInstancia()
    {
        if(!self::$instancia) { // If no instance then make one
			self::$instancia = new self();
		}
		return self::$instancia;
    }

    // Constructor para instanciar el atributo tipoRegistroDao
    private function __construct(){
        $this->tipoRegistroDao = new TipoRegistroDao();
    }

    // retornamos todos los tipos de registros
    function buscarTiposDeRegistro(){        
        return $this->tipoRegistroDao->buscarTiposDeRegistro();
    }
}

?>