<?php
require_once(dirname( __DIR__ ).DIRECTORY_SEPARATOR.'dao'.DIRECTORY_SEPARATOR.'TipoMatriculaDao.php');
class TipoMatriculaController{
        
    private static $instancia;
    private $tipoMatriculaDao;

    // Método para obtener la instancia de la clase.
    public static function getInstancia()
    {
        if(!self::$instancia) { // If no instance then make one
			self::$instancia = new self();
		}
		return self::$instancia;
    }    

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